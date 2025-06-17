<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Purchase extends Model
{
		protected $table = 'purchase';
    public function customer()
    {  
    return $this->hasMany('App\Models\CustomerRegistration','customer_id','customer_id')->select(['customer_id','shipping_name','shipping_address','shipping_city','shipping_state','shipping_pin','shipping_phone']);
    }
}
