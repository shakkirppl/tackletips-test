<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class WishList extends Model
{
    protected $table = 'wishlist';
    use HasFactory;
    public function product()
    {
        return $this->belongsTo(Item::class)->select('id','hsncode','name','sub_name','product_image','category_id','product_slug','product_price_offer');
    }
}
