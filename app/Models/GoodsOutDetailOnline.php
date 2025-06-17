<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GoodsOutDetailOnline extends Model
{
	use SoftDeletes; 
    protected $table = 'goods_out_details_online';
    use HasFactory;
      public static function getcurrentstock($id){
    	return self::where('item_id', $id)->where('paid',1)->sum('quantity');
    }
}
