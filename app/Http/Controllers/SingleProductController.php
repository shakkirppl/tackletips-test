<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ProductImages;
use App\Models\Review;
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
            $product=Item::where('product_id','=',$product_id)->first();
            $data['prometa']=$product;
        }
        $product_id=$product->product_id;
        $sub_cate_id=$data['prometa']->sub_category;
         $url = "https://tackletips.in/product-view/$id";
        
        
        $pro_id=$data['prometa']->group_id;
        $pro_prime_id=$data['prometa']->id;
        $stock=1;
        $data['stock']=$stock;
        $image=$product->product_image;
        $img = "https://www.tackletips.in/uploads/product/thumb_images/$image";
            
                
        $data['product_images']=ProductImages::where('product_id','=',$product_id)
                       ->limit('4')
                       ->get();
        
        $data['group']=Item::where('status','=','1')
                        ->where('product_id','!=',$product_id)
                        ->where('group_id','=',$pro_id)
                        ->where('group_id','!=',0) 
                        ->orderBy('name', 'ASC')
                        ->orderBy('sub_name', 'ASC')         
                       ->get();
        
        $data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','product_slug')
                        ->where('status','=','1')
                        ->where('product_id','!=',$product_id)
                        ->where('group_id','!=',$pro_id)  
                        ->where('sub_category','=',$sub_cate_id)   
                        ->where('items.prime_id','=','0')
                        ->orderBy('name', 'ASC')
                        ->orderBy('sub_name', 'ASC')     
                        ->limit('9')
                       ->get();

        $data['brand']=Brands::find($product->brand_id);
        $data['review']=Review::where('product_id','=',$product_id)->where('status','Active')->get();
        $data['review_count']=Review::where('product_id','=',$product_id)->where('status','Active')->count();
        
        
        
        return view('front-end.product-detail',$data,compact('url','img'));
        } catch (\Exception $e) {
            
            return $e->getMessage();
          }
        
        
        }
}
