<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Category extends Model
{
    protected $table = 'categories';
    use HasFactory;
    public function subcategories()
    {
        return $this->hasMany(SubCategory::class, 'parent_id');
    }
}
