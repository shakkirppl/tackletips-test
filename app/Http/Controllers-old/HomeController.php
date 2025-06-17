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
use DB;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class HomeController extends Controller
{
    //
    public function index(Request $request)
    {
  
        try {
            $data['seasonal_product']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('items.status','=','1')
                ->where('items.sessonal','=','1')
                  ->orderBy('items.total_stock_count','DESC')
                ->limit('16') 
               ->get();


$data['offer']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('items.status','=','1')
                 ->orderBy('views','asc')
                 ->orderBy('items.total_stock_count','DESC')
                ->limit('16') 
               ->get();


$data['new']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('10') 
               ->get();
            //   new reel
 $data['new_real']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','1')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new rod
$data['new_rod']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','2')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new line
$data['new_line']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','3')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new lure
$data['new_lure']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','4')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new accesories
$data['new_accesories']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','5')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new terminal tackle
$data['new_terminal']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','6')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new apparel
$data['new_apparel']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','7')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new spare
$data['new_spare']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','8')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();

$data['featured']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')
                ->where('featured','=','1')   
                ->orderBy('items.total_stock_count','DESC')
                ->inRandomOrder()
                ->limit('12') 
                ->get();
                
 $data['ads']=Adds::where('page','=','home-top-eng')
               ->limit('3')
                ->get(); 



$data['slider']=HomeImages::where('img_for','web') ->orderBy('img_id','desc')->get();
$data['feat_brands']=Brands::where('featured','=','1')->get();
$data['brands']=Brands::get();
$data['category']=Category::orderBy('id','asc')->get();
$data['blog']=Blog::Orderby('id','DESC')->limit('3')->get();
$data['testimonial']=Testmonial::limit('3')->get();


$cookies=request()->cookie('laravel_session');
Visitors::insert([
    
    'ip'=>$cookies
    ]);

return view('front-end.index',$data);  
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
  
    
    public function index_api(Request $request)
    {
  
        try {
            $data['seasonal_product']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('items.status','=','1')
                ->where('items.sessonal','=','1')
                  ->orderBy('items.total_stock_count','DESC')
                ->limit('16') 
               ->get();


$data['offer']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('items.status','=','1')
                 ->orderBy('views','asc')
                 ->orderBy('items.total_stock_count','DESC')
                ->limit('16') 
               ->get();


$data['new']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('10') 
               ->get();
            //   new reel
 $data['new_real']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','1')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new rod
$data['new_rod']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','2')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new line
$data['new_line']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','3')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new lure
$data['new_lure']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','4')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new accesories
$data['new_accesories']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','5')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                //   new terminal tackle
$data['new_terminal']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','6')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new apparel
$data['new_apparel']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','7')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();
                 //   new spare
$data['new_spare']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')->where('category_id','=','8')  
                ->distinct()
                ->orderby('id','desc')
                ->limit('12') 
               ->get();

$data['featured']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
                ->where('status','=','1')
                ->where('featured','=','1')   
                ->orderBy('items.total_stock_count','DESC')
                ->inRandomOrder()
                ->limit('12') 
                ->get();
                
 $data['ads']=Adds::where('page','=','home-top-eng')
               ->limit('3')
                ->get(); 



$data['slider']=HomeImages::where('img_for','web') ->orderBy('img_id','desc')->get();
$data['feat_brands']=Brands::where('featured','=','1')->get();
$data['brands']=Brands::select('id','name','brand_image','url_word')->get();
$data['category']=Category::orderBy('id','asc')->get();
$data['blog']=Blog::select('id','blog_title','blog_image','blog_posted_by')->Orderby('id','DESC')->limit('3')->get();
$data['testimonial']=Testmonial::limit('3')->get();

 return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
  
    


    
}
