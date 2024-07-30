<?php
namespace App\Interfaces\Services;



interface AmbulanceRepositoryInterface

{

public function index();

public function create($request);

public function store($request);

public function edit($request);

public function update($request);

public function destroy($request);



}
