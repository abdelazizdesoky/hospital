<?php

namespace App\Repositories\Finance;


use App\Interfaces\Finance\PaymentRepositoryInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\PaymentAccount;
use App\Models\FundAccounts;
use App\Models\PatientAccount;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class PaymentRepository implements PaymentRepositoryInterface
{
   public function index()
   {

      $payments = PaymentAccount::all();

       return view('Dashboard.Finance.Payment.index',compact('payments'));
   }

    public function Show($id)
    {
        $payment_account = PaymentAccount::findorfail($id);
        $Patients = Patient::all();
        return view('Dashboard.Finance.Payment.print',compact('payment_account','Patients'));
    }


    public function create()
   {
    $Patients = Patient::all();
       return view('Dashboard.Finance.Payment.add',compact('Patients'));
   }


   public function store($request)
   {

    DB::beginTransaction();

       try {
           // store Payment
           $Payment = new PaymentAccount();
           $Payment->date = date('y-m-d');
           $Payment->patient_id = $request->patient_id;
           $Payment->amount = $request->amount;
           $Payment->description = $request->description;
           $Payment->save();
          // store fund_accounts
           $FundAccounts = new FundAccounts();
           $FundAccounts->date = date('y-m-d');
           $FundAccounts->Payment_id =$Payment->id;
           $FundAccounts->credit = $request->amount;
           $FundAccounts->Debit=0.00;
           $FundAccounts->save();
           // store patient_accounts
           $PatientAccounts = new PatientAccount();
           $PatientAccounts->date = date('y-m-d');
           $PatientAccounts->patient_id = $request->patient_id;
           $PatientAccounts->Payment_id = $Payment->id;
           $PatientAccounts->credit = 0.00;
           $PatientAccounts->Debit=$request->amount;
           $PatientAccounts->save();




       DB::commit();
       session()->flash('add');
       return redirect()->route('Payment.index');

      }

    catch (\Exception $e) {
        DB::rollback();
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
     }

   }

   public function edit($id)
   {

       $payment_accounts = PaymentAccount::findorfail($id);
       $Patients = Patient::all();
       return view('Dashboard.Finance.Payment.edit',compact('payment_accounts','Patients'));
   }




   public function update($request)
   {


    DB::beginTransaction();

    try {
        // store receipt_accounts
        $Payment = PaymentAccount::findorfail($request->id);
        $Payment->date = date('y-m-d');
        $Payment->patient_id = $request->patient_id;
        $Payment->amount = $request->amount;
        $receipt_accounts->description = $request->description;
        $receipt_accounts->save();
       // store fund_accounts
        $FundAccounts = FundAccounts::where('receipt_id',$request->id)->first();
        $FundAccounts->date = date('y-m-d');
        $FundAccounts->receipt_id =$Payment->id;
        $FundAccounts->credit = $request->amount;
        $FundAccounts->Debit =0.00;
        $FundAccounts->save();
        // store patient_accounts
        $PatientAccounts =  PatientAccount::where('receipt_id',$request->id)->first();
        $PatientAccounts->date = date('y-m-d');
        $PatientAccounts->patient_id = $request->patient_id;
        $PatientAccounts->receipt_id = $Payment->id;
        $PatientAccounts->credit = 0.00;
        $PatientAccounts->Debit =$request->amount;
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
        PaymentAccount::destroy($request->id);
        session()->flash('delete');
        return redirect()->back();
    }
    catch (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
   }
}
