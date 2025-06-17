<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class BrandProductController extends Controller
{
    //
    
    
public function brand_products(Request $request,$id){

try {
$cat_id = $id;
 $sort = $request->get('sort', 'newest');
 $data['cat']=Brands::where('url_word','=',$id)->first(); 

$query=Item::query();
      $query->join('brands','brands.id','=','items.brand_id')
                ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
                ->where('brands.url_word','=',$cat_id)
                
                // ->orderby('items.id','desc')
                ->distinct();
              
          if ($sort == 'price_low_high') {
        $query->orderBy('items.product_price_offer', 'asc');
    } elseif ($sort == 'price_high_low') {
        $query->orderBy('items.product_price_offer', 'desc');
    } else {
        $query->orderBy('items.created_at', 'desc');
    }  
     $data['product']=$query->paginate(80);
$data['category']=Category::get();
$data['brands']=Brands::get();


        return view('front-end.products-brand',$data);
} catch (\Exception $e) {
    
    return $e->getMessage();
  }


}   

public function brand_products_api(Request $request){

try {
     $cat_id = $request->brand_id;
     $data['brand']=Brands::where('id','=',$cat_id)->first(); 

      $query=Item::query();
      $query->join('brands','brands.id','=','items.brand_id')
                ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
                ->where('brands.id','=',$cat_id)
                ->distinct();
              
 
     $data['product']=$query->paginate(80);

 return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
} catch (\Exception $e) {
    
    return $e->getMessage();
  }


}  
    
}
