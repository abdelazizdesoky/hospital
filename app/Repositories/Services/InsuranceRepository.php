<?php
namespace App\Repositories\Services;

use App\Interfaces\Services\InsuranceRepositoryInterface;
use App\Models\Insurance;

class InsuranceRepository implements InsuranceRepositoryInterface
{
    //index ---------------------------------------
    public function index()
    {
         $Insurances = Insurance::all();
         return view('Dashboard.Services.Insurance.index',compact('Insurances'));
    }

  //store------------------------------------------

    public function store($request)
    {

         Insurance::create([



            'insurance_code' => $request->input('insurance_code'),
            'discount_percentage' => $request->input('discount_percentage'),
            'company_rate' => $request->input('company_rate'),
            'status'=> 1,

            'name' => $request->input('name'),
            'note' => $request->input('note'),

         ]);

         session()->flash('add');

         return redirect()->route('Insurance.index');
    }

    //update-----------------------------------

    public function update($request)
    {

         $Insurance = Insurance::findOrfail($request->id);
         $Insurance->update([

            'name' => $request->input('name'),
            'insurance_code' => $request->input('insurance_code'),
            'discount_percentage' => $request->input('discount_percentage'),
            'company_rate' => $request->input('company_rate'),
            'status'=>$request->input('status') ,
            'note' => $request->input('note'),
         ]);

         session()->flash('edit');

         return redirect()->route('Insurance.index');

    }

    //delete=--------------------------------
    public function destroy($request)
    {

     Insurance::findOrfail($request->id)->delete();


          session()->flash('delete');

         return redirect()->route('Insurance.index');

    }




}
