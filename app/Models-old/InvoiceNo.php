<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceNo extends Model
{
    protected $table = 'invoice_numbers';
      public $timestamps = false;
    use HasFactory;
     public static function ReturnInvoice($id)
    {
    	$invoice_no =  self::where('bill_mode',$id)->first();
    	return $invoice_no->bill_prefix.$invoice_no->bill_no+1;
    }
}
