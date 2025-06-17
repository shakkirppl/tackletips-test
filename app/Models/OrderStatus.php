<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class OrderStatus extends Model
{
    protected $table = 'order_status';
    use HasFactory;
}
