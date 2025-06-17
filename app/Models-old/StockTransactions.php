<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\GoodsInDetail;
use App\Models\GoodsInDetailIGst;
use App\Models\GoodsInNonTaxDetail;
use App\Models\MaterialReturnDetail;
use App\Models\MaterialReturnIGstDetail;

use App\Models\GoodsOutDetail;
use App\Models\GoodsOutIGstDetail;
use App\Models\GoodsOutNonTaxDetail;
use App\Models\GoodsOutWholeSaleDetail;
use App\Models\PurchaseMaterialReturnDetail;
use App\Models\GoodsStockAdjustment;

use App\Models\GoodsOutDetailOnline;
use App\Models\GoodsOutDetailOnlineErp;

use App\Models\OpeningStock;
class StockTransactions extends Model
{
    protected $table = 'stock_transations';
    use HasFactory;
    
          public static function getcurrentstock($pro){
               $GoodsInDetail=GoodsInDetail::getcurrentstock($pro);
        $GoodsInDetailIGst=GoodsInDetailIGst::getcurrentstock($pro);
        $OpeningStock=OpeningStock::where('item_id',$pro)->sum('stock');
        $GoodsStockAdjustment_in=GoodsStockAdjustment::where('item_id',$pro)->where('operation','=','+')->sum('count');
        $GoodsInNonTaxDetail=GoodsInNonTaxDetail::getcurrentstock($pro);
        $MaterialReturnDetail=MaterialReturnDetail::getcurrentstock($pro);
        $MaterialReturnIGstDetail=MaterialReturnIGstDetail::getcurrentstock($pro);
        
        
        $GoodsStockAdjustment_out=GoodsStockAdjustment::where('item_id',$pro)->where('operation','=','-')->sum('count');
        $GoodsOutDetail=GoodsOutDetail::getcurrentstock($pro);
        $GoodsOutIGstDetail=GoodsOutIGstDetail::getcurrentstock($pro);
        $GoodsOutWholeSaleDetail=GoodsOutWholeSaleDetail::getcurrentstock($pro);
        $GoodsOutNonTaxDetail=GoodsOutNonTaxDetail::getcurrentstock($pro);
        // $GoodsOutDetailOnline=self::where('item_id', $pro)->where('transaction_type','SalesOnline')->sum('out_qty');
          $GoodsOutDetailOnline=GoodsOutDetailOnlineErp::getcurrentstock($pro);
        $PurchaseMaterialReturnDetail=PurchaseMaterialReturnDetail::getcurrentstock($pro);
     
        $stock_in=$GoodsInDetail+$GoodsInDetailIGst+$GoodsStockAdjustment_in+$GoodsInNonTaxDetail+$MaterialReturnDetail+$MaterialReturnIGstDetail;
        $stock_out=$GoodsOutDetail+$GoodsOutIGstDetail+$GoodsOutWholeSaleDetail+$GoodsStockAdjustment_out+$GoodsOutNonTaxDetail+$PurchaseMaterialReturnDetail+$GoodsOutDetailOnline;
        
        if($OpeningStock)
        {$stock_in=$stock_in+$OpeningStock;}
        $stoc_k=$stock_in-$stock_out;
        
    	return $stoc_k;
    }
            public static function getstocktest($pro){
               $GoodsInDetail=GoodsInDetail::getcurrentstock($pro);
        $GoodsInDetailIGst=GoodsInDetailIGst::getcurrentstock($pro);
        $OpeningStock=OpeningStock::where('item_id',$pro)->sum('stock');
        $GoodsStockAdjustment_in=GoodsStockAdjustment::where('item_id',$pro)->where('operation','=','+')->sum('count');
        $GoodsInNonTaxDetail=GoodsInNonTaxDetail::getcurrentstock($pro);
        $MaterialReturnDetail=MaterialReturnDetail::getcurrentstock($pro);
        $MaterialReturnIGstDetail=MaterialReturnIGstDetail::getcurrentstock($pro);
        
        
        $GoodsStockAdjustment_out=GoodsStockAdjustment::where('item_id',$pro)->where('operation','=','-')->sum('count');
        $GoodsOutDetail=GoodsOutDetail::getcurrentstock($pro);
        $GoodsOutIGstDetail=GoodsOutIGstDetail::getcurrentstock($pro);
        $GoodsOutWholeSaleDetail=GoodsOutWholeSaleDetail::getcurrentstock($pro);
        $GoodsOutNonTaxDetail=GoodsOutNonTaxDetail::getcurrentstock($pro);
        return $GoodsOutDetailOnline=GoodsOutDetailOnlineErp::getcurrentstock($pro);
        $PurchaseMaterialReturnDetail=PurchaseMaterialReturnDetail::getcurrentstock($pro);
     
        $stock_in=$GoodsInDetail+$GoodsInDetailIGst+$GoodsStockAdjustment_in+$GoodsInNonTaxDetail+$MaterialReturnDetail+$MaterialReturnIGstDetail;
        $stock_out=$GoodsOutDetail+$GoodsOutIGstDetail+$GoodsOutWholeSaleDetail+$GoodsStockAdjustment_out+$GoodsOutNonTaxDetail+$PurchaseMaterialReturnDetail+$GoodsOutDetailOnline;
        
        if($OpeningStock)
        {$stock_in=$stock_in+$OpeningStock;}
        $stoc_k=$stock_in-$stock_out;
        
    	return $stock_out;
    }
}
