<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Review extends Model
{
    protected $table = 'review';
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Item::class)->select('id','hsncode','name','sub_name');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    
}
