<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PurchaseMaterialReturnDetail extends Model
{
	use SoftDeletes; 
    protected $table = 'purchase_material_return_details';
    use HasFactory;
      public static function getcurrentstock($id){
    	return self::where('item_id', $id)->sum('quantity');
    }
     public static function getcurrenttransaction($id,$date_from,$date_to){
    	return self::where('item_id', $id)->sum('quantity');
    }
}
