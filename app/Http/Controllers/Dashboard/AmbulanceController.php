<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Services\AmbulanceRepositoryInterface;
use App\Http\Requests\StoreAmbulanceRequest;

class AmbulanceController extends Controller
{

       private $Ambulances;
       public function __construct(AmbulanceRepositoryInterface $Ambulances){
       $this->Ambulances = $Ambulances;
    }


    public function index()
    {
     return  $this->Ambulances->index();
    }

        public function create(Request $request)
    {
        return  $this->Ambulances->create($request);
    }

    public function store(StoreAmbulanceRequest $request)
    {
        return  $this->Ambulances->store($request);
    }

    public function edit($id)
    {
        return  $this->Ambulances->edit($id);
    }

    public function update(Request $request)
    {
        return  $this->Ambulances->update($request);
    }


    public function destroy(Request $request)
    {
        return  $this->Ambulances->destroy($request);
    }


}
