<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImages;
use App\Models\Review;
use App\Models\StockTransactions;
use DB;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class SingleProductController extends Controller
{
    //
    
    public function product_view($id){

try {
$product_id = $id;
$product= Item::where('product_slug','=',$product_id)->first();
if($product){
$data['prometa']=$product; 
}
else
{
    $data['prometa']=
    $product=Item::where('product_id','=',$product_id)->first();
    $data['prometa']=$product;
}
$product_id=$product->product_id;
$sub_cate_id=$data['prometa']->sub_category;
 $url = "https://tackletips.in/product-view/$id";


$pro_id=$data['prometa']->group_id;

$pro_prime_id=$data['prometa']->id;

    // $in=StockTransactions::where('item_id',$pro_prime_id)->sum('in_qty');
    // $out=StockTransactions::where('item_id',$pro_prime_id)->sum('out_qty');
    $stock=StockTransactions::getcurrentstock($pro_prime_id);
$data['stock']=$stock;

$data['pr_detail']=$pr=Item::where('product_id','=',$product_id)        
        ->get();
        
        foreach($pr as $prs){
            
            $br=$prs->brand_id;
            $title = $prs->name;
            $ct_id=$prs->category_id;
            $image = $prs->product_image;
        }
    
    $img = "https://www.itcityonlinestore.com/uploads/product/thumb_images/$image";
    $metatitle = $title;
    
        
$data['product_images']=ProductImages::where('product_id','=',$product_id)
                 ->limit('4')
               ->get();

$data['group']=Item::where('status','=','1')
                ->where('product_id','!=',$product_id)
                ->where('group_id','=',$pro_id)               
                
               ->get();

$data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product')
                ->where('status','=','1')
                ->where('product_id','!=',$product_id)
                ->where('group_id','!=',$pro_id)  
                ->where('sub_category','=',$sub_cate_id)   
                ->where('items.prime_id','=','0')
                ->limit('9')
               ->get();
$data['brand']=Brands::find($product->brand_id);
$data['review']=Review::where('product_id','=',$product_id)->get();
$data['review_count']=Review::where('product_id','=',$product_id)->count();



return view('front-end.view-details',$data,compact('url','img','metatitle'));
} catch (\Exception $e) {
    
    return $e->getMessage();
  }


}

  public function product_view_api(Request $request){

try {
$pro_id = $request->id;
$product= Item::where('id','=',$pro_id)->first();

$product_id=$product->product_id;
 $data['prometa']=$product;
 $sub_cate_id=$data['prometa']->sub_category;
    $stock=StockTransactions::getcurrentstock($pro_id);
$data['stock']=$stock;

$data['pr_detail']=$pr=Item::where('product_id','=',$product_id)        
        ->get();
        
      
$data['product_images']=ProductImages::where('product_id','=',$product_id)
                 ->limit('4')
               ->get();

$data['group']=Item::where('status','=','1')
                ->where('product_id','!=',$product_id)
                ->where('group_id','=',$pro_id)               
                
               ->get();

$data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product')
                ->where('status','=','1')
                ->where('product_id','!=',$product_id)
                ->where('group_id','!=',$pro_id)  
                ->where('sub_category','=',$sub_cate_id)   
                ->where('items.prime_id','=','0')
                ->limit('9')
               ->get();
$data['brand']=Brands::find($product->brand_id);
$data['review']=Review::where('product_id','=',$product_id)->get();
$data['review_count']=Review::where('product_id','=',$product_id)->count();

 return response()->json(['data' => $data, 'success' => true, 'messages' => []]);

} catch (\Exception $e) {
    
    return $e->getMessage();
  }


}

    
}
