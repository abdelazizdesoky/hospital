<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Services\InsuranceRepositoryInterface;
use App\Http\Requests\StoreInsuranceRequest;

class InsuranceController extends Controller
{

       private $Insurances;
       public function __construct(InsuranceRepositoryInterface $Insurances){
       $this->Insurances = $Insurances;
    }


    public function index()
    {
     return  $this->Insurances->index();
    }


    public function store(StoreInsuranceRequest $request)
    {
        return  $this->Insurances->store($request);
    }

    public function update(Request $request)
    {
        return  $this->Insurances->update($request);
    }


    public function destroy(Request $request)
    {
        return  $this->Insurances->destroy($request);
    }


}
