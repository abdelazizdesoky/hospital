<?php
namespace App\Repositories\Services;

use App\Interfaces\Services\AmbulanceRepositoryInterface;
use App\Models\Ambulance;

class AmbulanceRepository implements AmbulanceRepositoryInterface
{
    //index ---------------------------------------
    public function index()
    {
         $ambulances = Ambulance::all();
         return view('Dashboard.Services.Ambulances.index',compact('ambulances'));
    }

    public function create($request)
 {

    return view('Dashboard.Services.Ambulances.create');

 }


  //store------------------------------------------

    public function store($request)
    {

        Ambulance::create([


            'car_number' => $request->input('car_number'),
            'car_model' => $request->input('car_model'),
            'car_year_made' => $request->input('car_year_made'),
            'car_type' => $request->input('car_type'),
            'driver_name' => $request->input('driver_name'),
            'driver_license_number' => $request->input('driver_license_number'),
            'driver_phone' => $request->input('driver_phone'),
            'notes' => $request->input('notes'),

         ]);

         session()->flash('add');

         return redirect()->route('Ambulance.index');
    }

    public function edit($id)
    {
        $ambulance = Ambulance::findorfail($id);

        return view('Dashboard.Services.Ambulances.edit',compact('ambulance'));

    }

    //update-----------------------------------

    public function update($request)
    {

        if (!$request->has('is_available'))
        $request->request->add(['is_available' => 2]);
    else
        $request->request->add(['is_available' => 1]);

    $ambulance = Ambulance::findOrFail($request->id);

    $ambulance->update($request->all());

    // insert trans
    $ambulance->driver_name = $request->driver_name;
    $ambulance->notes = $request->notes;
    $ambulance->save();

         session()->flash('edit');

         return redirect()->route('Ambulance.index');

    }

    //delete=--------------------------------
    public function destroy($request)
    {

     Ambulance::findOrfail($request->id)->delete();


          session()->flash('delete');

         return redirect()->route('Ambulance.index');

    }




}
