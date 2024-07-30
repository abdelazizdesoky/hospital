<?php

namespace App\Repositories\Finance;


use App\Interfaces\Finance\ReceiptRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\ReceiptAccount;
use App\Models\FundAccounts;
use App\Models\PatientAccount;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class ReceiptRepository implements ReceiptRepositoryInterface
{
   public function index()
   {

      $receipts = ReceiptAccount::all();

       return view('Dashboard.Finance.Receipt.index',compact('receipts'));
   }

    public function Show($id)
    {
        $receipt = ReceiptAccount::findorfail($id);
       $Patients = Patient::all();
       return view('Dashboard.Finance.Receipt.print',compact('receipt','Patients'));
    }

    public function create()
   {
    $Patients = Patient::all();
       return view('Dashboard.Finance.Receipt.add',compact('Patients'));
   }

   public function store($request)
   {

    DB::beginTransaction();

       try {
           // store receipt_accounts
           $Receipt = new ReceiptAccount();
           $Receipt->date = date('y-m-d');
           $Receipt->patient_id = $request->patient_id;
           $Receipt->amount = $request->amount;
           $Receipt->description = $request->description;
           $Receipt->save();
          // store fund_accounts
           $FundAccounts = new FundAccounts();
           $FundAccounts->date = date('y-m-d');
           $FundAccounts->receipt_id =$Receipt->id;
           $FundAccounts->Debit = $request->amount;
           $FundAccounts->credit =0.00;
           $FundAccounts->save();
           // store patient_accounts
           $PatientAccounts = new PatientAccount();
           $PatientAccounts->date = date('y-m-d');
           $PatientAccounts->patient_id = $request->patient_id;
           $PatientAccounts->receipt_id = $Receipt->id;
           $PatientAccounts->Debit = 0.00;
           $PatientAccounts->credit =$request->amount;
           $PatientAccounts->save();




       DB::commit();
       session()->flash('add');
       return redirect()->route('Receipt.index');

      }

    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

   }

   public function edit($id)
   {

       $receipt_accounts = ReceiptAccount::findorfail($id);
       $Patients = Patient::all();
       return view('Dashboard.Finance.Receipt.edit',compact('receipt_accounts','Patients'));
   }




   public function update($request)
   {


    DB::beginTransaction();

    try {
        // store receipt_accounts
        $receipt_accounts = ReceiptAccount::findorfail($request->id);
        $receipt_accounts->date = date('y-m-d');
        $receipt_accounts->patient_id = $request->patient_id;
        $receipt_accounts->amount = $request->amount;
        $receipt_accounts->description = $request->description;
        $receipt_accounts->save();
       // store fund_accounts
        $FundAccounts = FundAccounts::where('receipt_id',$request->id)->first();
        $FundAccounts->date = date('y-m-d');
        $FundAccounts->receipt_id =$receipt_accounts->id;
        $FundAccounts->Debit = $request->amount;
        $FundAccounts->credit =0.00;
        $FundAccounts->save();
        // store patient_accounts
        $PatientAccounts =  PatientAccount::where('receipt_id',$request->id)->first();
        $PatientAccounts->date = date('y-m-d');
        $PatientAccounts->patient_id = $request->patient_id;
        $PatientAccounts->receipt_id = $receipt_accounts->id;
        $PatientAccounts->Debit = 0.00;
        $PatientAccounts->credit =$request->amount;
        $PatientAccounts->save();




    DB::commit();
    session()->flash('edit');
    return redirect()->route('Receipt.index');

   }

 catch (\Exception $e) {
     DB::rollback();
     return redirect()->back()->withErrors(['error' => $e->getMessage()]);
  }

   }



   public function destroy($request)
   {
    try {
        ReceiptAccount ::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
   }
}
