<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class CustomerAddress extends Model
{
    use HasFactory;
    protected $table = 'customer_address';
    public function state(){
        
        return $this->hasMany(State::class,'id','customer_state');
     }
     public function district(){
        
        return $this->hasMany(District::class,'id','customer_dist');
     }
}
