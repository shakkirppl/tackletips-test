<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Orders extends Model
{
		protected $table = 'orders';
  
        protected $fillable = ['order_status_id'] ;
  
    public function OrderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }
    // public function customer()
    // {
    //     return $this->belongsTo(CustomerRegistration::class, 'customer_id');
    // }
    public function detail(){
      return $this->hasMany('App\Models\OrderDetails','orders_id')
        ->join('items','items.id','=','order_details.product_id')
         ->join('taxes','taxes.id','=','items.tax_id')->select('order_details.*','items.id','items.name','taxes.percentage');
       
   }
    public function customer()
    {
        return $this->belongsTo(CustomerRegistration::class);
    }

    // Relationship with Order Status
    public function status()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status_id');
    }

    public function product()
    {
        return $this->belongsTo(Item::class, 'product_id');
    }

    public function customerState()
    {
        return $this->belongsTo(State::class, 'customer_state');
    }
    
    public function shippingState()
    {
        return $this->belongsTo(State::class, 'shipping_state');
    }
    

    public function customerRegistration()
    {
        return $this->belongsTo(CustomerRegistration::class, 'customer_id', 'id');
    }
    public function orderDetails()
{
    return $this->hasMany(OrderDetails::class, 'orders_id');
}

    public function details()
{
    return $this->hasMany(OrderDetails::class, 'orders_id')->with('product');
}

  
   
}

    
   

