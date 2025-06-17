<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class GoodsOutDetailOnlineErp extends Model
{
	use SoftDeletes; 
    protected $table = 'goods_out_details_online_erp';
    use HasFactory;
      public static function getcurrentstock($id){
    	return self::where('item_id', $id)->sum('quantity');
    }
}
