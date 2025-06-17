<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GoodsOutOnline extends Model
{
    use SoftDeletes; 
    protected $table = 'goods_out_online';
    protected $dateFormat = 'Y-m-d';
      public function detail(){
           return $this->hasMany('App\Models\GoodsOutDetailOnline','goods_out_id')
             ->join('items','items.id','=','goods_out_details_online.item_id')
              ->join('taxes','taxes.id','=','items.tax_id')->select('goods_out_details_online.*','items.*','taxes.percentage');
            
        }
      public function accounts(){ 
        
           return $this->hasMany('App\Models\Account','id','customer_id')->select(['name as customer_name','id']);
        }
        public function customer(){
        
           return $this->hasMany('App\Models\CustomerRegistration','customer_id','customer_id');
        }
        public function scopeActive($query)
    {
         return $query->where('goods_out.status', 'active')
                         ->groupBy('goods_out.id')
                        ->orderBy('in_date', 'desc');
    }

            public function scopeIntwodate($query,$from_date,$to_date)
    {
         return $query->where(function($query)use ($from_date,$to_date) {
                            if ($from_date && $to_date) {
                                $query->whereBetween('goods_out.in_date', [$from_date, $to_date]);
                            }
                             });
    } 
       public function scopeDeleteIntwodate($query,$from_date,$to_date)
    {
         return $query->where(function($query)use ($from_date,$to_date) {
                            if ($from_date && $to_date) {
                                $query->whereBetween('goods_out.deleted_at', [$from_date, $to_date]);
                            }
                             });
    }    
     public function scopeCustomer($query,$customer)
    {
         return $query->where(function($query)use ($customer) {
                            if ($customer) {
                                $query->where('customer_id', $customer);
                            }
                             });
    }
         public function scopeTransactionmode($query,$transaction_mode)
    {
         return $query->where(function($query)use ($transaction_mode) {
                            if ($transaction_mode) {
                                $query->where('transaction_mode', $transaction_mode);
                            }
                             });
    }
     public function scopeBill($query,$bill)
    {
         return $query->where(function($query)use ($bill) {
                            if ($bill) {
                                $query->where('invoice_no', $bill);
                            }
                             });
    }
        public function scopeDiscount($query)
    {
         return $query->where(function($query) {
                   
                            $query->where('goods_out.discount','!=', 0);
                       
                             });
    }
 
    use HasFactory;
}
