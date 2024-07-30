<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
    use HasFactory;
    public $guarded=[];


    public function invoice()
    {
        return $this->belongsTo(single_invoice::class,'invoice_id');
    }

    public function ReceiptAccount()
    {
        return $this->belongsTo(ReceiptAccount::class,'receipt_id');
    }


    public function PaymentAccount()
    {
        return $this->belongsTo(PaymentAccount::class,'Payment_id');
    }

}
