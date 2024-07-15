<?php
namespace App\Repositories\Doctors;

use App\Interfaces\Doctors\DoctorRepositoryInterface;
use App\Models\Doctor;
use App\Models\Section;
use Illuminate\Support\Facades\Hash;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\DB;


class DoctorRepository implements DoctorRepositoryInterface
{

    use UploadTrait;


    //index ---------------------------------------
    public function index()
    {
         $Doctors = Doctor::all();
         return view('Dashboard.Doctor.index',compact('Doctors'));
    }

 //create------------------------------------------

 public function create($request)
 {

    $Sections = Section::all();
    return view('Dashboard.Doctor.create' ,compact('Sections'));

 }


    //store------------------------------------------
 public function store( $request)
 {

    DB::beginTransaction();

    try {
        $doctors = new Doctor();
        $doctors -> name = $request-> name;
        $doctors ->password = Hash::make($request->password);
        $doctors -> email = $request->email;
        $doctors ->phone= $request->phone;
        $doctors -> status = $request->status;
        $doctors -> section_id= $request->section_id;

        $doctors->save();

        //upload image-----
       // --> uploadimg(Request $request,$inputname,$foldername,$disk,$imageable_id,$imageable_type)
        $this->uploadimg($request, 'photo', 'Doctors', 'upload_image', $doctors->id, 'App\Models\Doctor');

        DB::commit();
        session()->flash('add');
        return redirect()->route('doctors.create');

    } catch (\Exception $e) {
        // Handle the exception
        DB::rollback();
        return redirect()->back()->withError (['Error' =>$e->getMessage()]);

    }
}
    public function update( $request)
    {

        $Doctor = Doctor::findOrfail($request->id);
        $Doctor->update([

         'name'=>$request->input('name'),

          ]);

         session()->flash('edit');
         return redirect()->route('doctors.index');

    }

    //delete=--------------------------------
    public function destroy($request)
    {

     Doctor::findOrfail($request->id)->delete();


          session()->flash('delete');

         return redirect()->route('Doctors.index');

    }



}
