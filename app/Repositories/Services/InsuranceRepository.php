<?php
namespace App\Repositories\Services;

use App\Interfaces\Services\InsuranceRepositoryInterface;
use App\Models\Insurance;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    public function index()
    {
        $Insurances = Insurance::all();
        return view('Dashboard.Services.Insurance.index', compact('Insurances'));
    }

    public function create()
    {
        return view('Dashboard.Services.Insurance.create');
    }

    public function store($request)
    {
        try {
            $insurances = new Insurance();
            $insurances->insurance_code = $request->insurance_code;
            $insurances->discount_percentage = $request->discount_percentage;
            $insurances->company_rate = $request->company_rate;
            $insurances->status = 1;
            $insurances->save();

            // insert trans
            $insurances->name = $request->name;
            $insurances->note = $request->note;
            $insurances->save();
            session()->flash('add');
            return redirect('Insurance');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $insurances = Insurance::findorfail($id);
        return view('Dashboard.Services.Insurance.edit', compact('insurances'));
    }

    public function update($request)
    {
        if (!$request->has('status'))
            $request->request->add(['status' => 0]);
        else
            $request->request->add(['status' => 1]);

        $insurances = Insurance::findOrFail($request->id);

        $insurances->update($request->all());

        // insert trans
        $insurances->name = $request->name;
        $insurances->note = $request->note;
        $insurances->save();

        session()->flash('edit');
        return redirect('Insurance');
    }

    public function destroy($request)
    {
        Insurance::destroy($request->id);
        session()->flash('delete');
        return redirect('Insurance');
    }



}
