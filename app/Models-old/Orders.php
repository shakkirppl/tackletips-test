<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Orders extends Model
{
		protected $table = 'orders';
    public function customer()
    {  
    return $this->hasMany('App\Models\CustomerRegistration','id','customer_id')->select(['id','shipping_name','shipping_address','shipping_city','shipping_state','shipping_pin','shipping_phone']);
    }
}
