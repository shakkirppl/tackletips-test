<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class HomeImages extends Model
{
    protected $table = 'home_images';
    use HasFactory;
    protected $primaryKey = 'img_id';
   
      protected $fillable = [
        'img_name',
        'img_for',
        'url',
       

    ];
}
