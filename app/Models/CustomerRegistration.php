<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class CustomerRegistration extends Model
{
    //
		protected $table = 'customer_registration';

    public function shippingState()
		{
			return $this->belongsTo(State::class, 'shipping_state');
		}
		
		public function billingState()
		{
			return $this->belongsTo(State::class, 'customer_state'); 
		}
  
}
