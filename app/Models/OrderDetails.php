<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $table = 'order_details';
    protected $fillable = [
        'orders_id',
        'quantity',
        'product_id',
        'customer_id',
        'price',
        'total_amount',

    ];



    public function product()
    {
        return $this->belongsTo(Item::class, 'product_id', 'id');
    }

    public function order()
    {
        return $this->belongsTo(Orders::class, 'orders_id');
    }

    public function customer()
    {
        return $this->hasMany(Customer::class,'user_id','customer_id')->select('id','first_name','last_name'); 
    }

    public function products()
    {
        return $this->hasMany(Product::class,'id','product_id');
    }
   
}
