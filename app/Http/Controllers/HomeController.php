<?php

namespace App\Http\Controllers;
use App\Models\Item;


use App\Models\VideoGallary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use App\Models\StatesModel;
use App\Models\Testmonial;
use App\Models\Visitors;
use App\Models\Adds;
use App\Models\HomeImages;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Blog;
use Darryldecode\Cart\Facades\CartFacade as Cart;
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


        $cartItems = Cart::getContent();
         $data['videoInstagram']=VideoGallary::where('channel','Instagram')->get();
         $data['testimonial']=Testmonial::get();
         $data['videoYoutube']=VideoGallary::where('channel','Youtube')->get();

return view('front-end.index',$data);  
        
    } catch (\Exception $e) {

return $e->getMessage();
}

   
}
public function search(Request $request){


    $key=$request->input('key');
    
     $data['pagename']=$key; 
    
                    $a=$data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','product_slug')
                    ->join('brands','brands.id','=','items.brand_id')
                    ->where('items.status','=',1)
                    ->where('items.name','like','%'.$key.'%')
                    ->orwhere('items.sub_name','like','%'.$key.'%')
                    ->orwhere('items.measurement_name','like','%'.$key.'%')
                    ->orwhere('items.tag_name','like','%'.$key.'%')
                    ->orwhere('brands.name','like','%'.$key.'%') 
                    
                    ->paginate(20)->appends($request->except('page'));
                    $count=$a->count();
                    $data['cat_name']='Result for:'.$key.'('.$count.')'; 
    
           
                    $data['category']=  Category::with('subcategories:id,name,parent_id,slug')->get();
                    $data['brands']=Brands::get();
       return view('front-end.product-categories',$data);
    
    
    }
public function getStates($countryId)
{
    try {

    // Fetch states where the country_id matches the selected country
    $states = StatesModel::where('country_id', $countryId)->get();

    return response()->json([
        'states' => $states
    ]);
} catch (\Exception $e) {
    return $e->getMessage();
  }
}
public function about_us(Request $request)
    {
        try {
            if (Session::has('activecountry')) {
                $countryCod = Session::get('activecountry');
            } else {
                $position = Location::get();
                $countryCod = $position->countryCode ?? 'IN'; // Default to 'IN'
                Session::put('activecountry', $countryCod);
            }
    
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $store = Stores::where('countryCode', $countryCod)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';
            $countries=Countries::get();
            $cartItems = Cart::getContent();

            return view('front-end.about-us',compact('storeId','currency','countries','language','cartItems'));
        } catch (\Exception $e) {
            return $e->getMessage();
          }
}
public function blog(Request $request)
    {
        try {
            if (Session::has('activecountry')) {
                $countryCod = Session::get('activecountry');
            } else {
                $position = Location::get();
                $countryCod = $position->countryCode ?? 'IN'; // Default to 'IN'
                Session::put('activecountry', $countryCod);
            }
    
            $language = app()->getLocale() == 'ar' ? 'ar' : 'en';
            $store = Stores::where('countryCode', $countryCod)->first();
            $storeId = $store->id ?? 1;
            $currency = $store->currency ?? 'INR';
            $countries=Countries::get();
            $cartItems = Cart::getContent();
            $videoInstagram=VideoGallary::where('channel','Instagram')->get();
            $videoYoutube=VideoGallary::where('channel','Youtube')->get();
            return view('front-end.blog',compact('storeId','currency','countries','language','cartItems','videoInstagram','videoYoutube'));
     
        } catch (\Exception $e) {
            return $e->getMessage();
          }
}

public function getProductPrice(Request $request)
    {
        try {

        $productPrice = ProductPrices::where('product_size_id', $request->product_size_id)
                                     ->where('store_id', $request->store_id)
                                     ->first();

        if ($productPrice) {
            $offer=$productPrice->original_price-$productPrice->offer_price;
            return response()->json(['price' => $productPrice->offer_price,'currency'=>$productPrice->currency,'original_price'=>$productPrice->original_price,'offer'=>$offer]);
        } else {
            return response()->json(['price' => 'N/A'], 404); // return error if not found
        }
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
  
}
