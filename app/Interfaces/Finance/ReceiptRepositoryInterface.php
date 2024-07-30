<?php


namespace App\Interfaces\Finance;


interface ReceiptRepositoryInterface
{
    // Get All Receipt
    public function index();
    // Create New Receipt
    public function create();
    // Store new Receipt
    public function store($request);
    // edit Receipt
    public function edit($id);
    // show Receipt
    public function show($id);
    // update Receipt
    public function update($request);
    // Deleted Receipt
    public function destroy($request);
}
