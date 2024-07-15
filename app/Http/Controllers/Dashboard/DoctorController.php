<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Doctors\DoctorRepositoryInterface;

class DoctorController extends Controller
{
    private $Doctors;
    public function __construct(DoctorRepositoryInterface $Doctors){
    $this->Doctors = $Doctors;
 }


 public function index()
 {
        return  $this->Doctors->index();
 }


 public function create(Request $request)
 {
     return  $this->Doctors->create($request);
 }


 public function store(Request $request)
 {
     return  $this->Doctors->store($request);
 }

 public function update(Request $request)
 {
     return  $this->Doctors->update($request);
 }


 public function destroy(Request $request)
 {
     return  $this->Doctors->destroy($request);
 }
}
