<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Adds;
use App\Models\Blog;
use App\Models\Brands;
use App\Models\Category;
use App\Models\HomeImages;
use App\Models\Orders;
use App\Models\Visitors;
use App\Models\Testmonial;
use App\Models\SubCategory;
use DB;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class CategoryController extends Controller
{
    //
    public function index(Request $request)
    {
  
        try {
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    
public function main_category_products(Request $request,$id){

 try {
     $sort = $request->get('sort', 'newest');
 $cat_id = $id;

 $data['cat']=Category::where('id','=',$cat_id)->first(); 

$query =Item::query();
                // ->paginate(80);
                 $query->join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                ->where('items.status','=','1')
                ->where('items.category_id','=',$cat_id)
                // ->orderBy('items.total_stock_count','DESC')
                ->distinct(); 
    if ($sort == 'price_low_high') {
        $query->orderBy('items.product_price_offer', 'asc');
    } elseif ($sort == 'price_high_low') {
        $query->orderBy('items.product_price_offer', 'desc');
    } else {
        $query->orderBy('items.created_at', 'desc');
    }  
    
     $data['product']= $query->paginate(80);
$data['category']=Category::get();
$data['brands']=Brands::get();


        return view('front-end.products-category',$data);
 } catch (\Exception $e) {
    
    return $e->getMessage();
  }
  

}
  
    public function category_products(Request $request,$id){
        
try {
 $cat_id = $id;
   $sort = $request->get('sort', 'newest');

 $data['cat']=SubCategory::where('id','=',$cat_id)->first(); 

 $query=Item::query();
 $query->join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                ->where('items.status','=','1')
                ->where('items.sub_category','=',$cat_id)
                // ->orderBy('items.total_stock_count','DESC')
                ->distinct() 
                ->paginate(80);
     if ($sort == 'price_low_high') {
        $query->orderBy('items.product_price_offer', 'asc');
    } elseif ($sort == 'price_high_low') {
        $query->orderBy('items.product_price_offer', 'desc');
    } else {
        $query->orderBy('items.created_at', 'desc');
    }  
       $data['product']  =$query->paginate(80);      
$data['category']=Category::get();
$data['brands']=Brands::get();


        return view('front-end.products-sub-category',$data);
    } catch (\Exception $e) {
    
    return $e->getMessage();
  }


}
    
       public function category_products_api(Request $request){
        
try {
 $cat_id = $request->category_id;
 

 $data['cat']=SubCategory::where('id','=',$cat_id)->first(); 

 $query=Item::query();
 $query->join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                ->where('items.status','=','1')
                ->where('items.sub_category','=',$cat_id)
                ->distinct() 
                ->paginate(80);
 
$data['product']  =$query->paginate(80);      
 return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
    } catch (\Exception $e) {
    
    return $e->getMessage();
  }


} 


    
}
