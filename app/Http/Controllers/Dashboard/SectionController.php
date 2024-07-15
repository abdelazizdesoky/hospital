<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\Sections\SectionRepositoryInterface;

class SectionController extends Controller
{

       private $Sections;
       public function __construct(SectionRepositoryInterface $Sections){
       $this->sections = $Sections;
    }


    public function index()
    {
     return  $this->sections->index();
    }


    public function store(Request $request)
    {
        return  $this->sections->store($request);
    }

    public function update(Request $request)
    {
        return  $this->sections->update($request);
    }


    public function destroy(Request $request)
    {
        return  $this->sections->destroy($request);
    }
}
