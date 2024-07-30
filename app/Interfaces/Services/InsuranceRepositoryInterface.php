<?php
namespace App\Interfaces\Services;



interface InsuranceRepositoryInterface
{

public function index();

public function store($request);

public function update($request);

public function destroy($request);



}
