<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AppError;
class Item extends Model
{
    protected $table = 'items';
    use HasFactory;
 public static function getitemslug($id){
      $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$id);
                $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
                $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
                $prod_slug = trim($prod_slug, '-');  
                $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
      return $prod_slug = strtolower($prod_slug);
    }
 public static function getcurrentstock($id){
    	return self::where('id', $id)->value('total_stock_count');
    }
 public static function getcurrentwebstock($id){
    	return self::where('id', $id)->value('web_stock');
    }
  public static function getcurrenterpstock($id){
    	return self::where('id', $id)->value('erp_stock');
    }
  public static function updateplusstock($id,$count){
  	  try {
		$current_stock = Self::getcurrentstock($id);
        $update_stock = $current_stock + $count;
        // web update_stock
        $current_webstock = Self::getcurrentwebstock($id);
        $update_webstock = $current_webstock + $count;
        // erp update_stock
        $current_erp_stock = Self::getcurrenterpstock($id);
        $update_erpstock = $current_erp_stock + $count;

	self::whereId($id)->update(['total_stock_count' => $update_stock]);
	self::whereId($id)->update(['web_stock' => $update_webstock]);
	self::whereId($id)->update(['erp_stock' => $update_erpstock]);
	} catch (\Exception $e) {
      AppError::add('Ledger','store',$e->getMessage());
    return $e->getMessage();
  }
  }
  public static function updateminusstock($id,$count){
  	  try {
  		$current_stock = Self::getcurrentstock($id);
        $update_stock = $current_stock - $count;
         // web update_stock
        $current_webstock = Self::getcurrentwebstock($id);
        $update_webstock = $current_webstock + $count;
        // erp update_stock
        $current_erp_stock = Self::getcurrenterpstock($id);
        $update_erpstock = $current_erp_stock + $count;

	self::whereId($id)->update(['total_stock_count' => $update_stock]);
	self::whereId($id)->update(['web_stock' => $update_webstock]);
	self::whereId($id)->update(['erp_stock' => $update_erpstock]);
	} catch (\Exception $e) {
      AppError::add('Ledger','store',$e->getMessage());
    return $e->getMessage();
  }
  }
}
