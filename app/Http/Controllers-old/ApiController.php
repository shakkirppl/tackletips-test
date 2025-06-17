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
use App\Models\StockTransactions;
use App\Models\ProductImages;
use App\Models\Review;
use App\Models\VideoGallary;
use App\Models\CustomerAddress;
use App\Models\CustomerRegistration;
use App\Models\User;
use App\Models\State;
use App\Models\Purchase;
use App\Models\District;
use App\Models\GoodsOutOnline;
use App\Models\GoodsOutDetailOnline;
use App\Models\Tax;
use App\Models\WishList;
use App\Models\FishReports;
use DB;
use Carbon\Carbon;
use Image;
use Illuminate\Support\Facades\Validator;
class ApiController extends Controller
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
$data['brands']=Brands::select('id','name','brand_image','url_word')->get();
$data['category']=Category::orderBy('id','asc')->get();
$data['blog']=Blog::select('id','blog_title','blog_image','blog_posted_by')->Orderby('id','DESC')->limit('3')->get();
$data['testimonial']=Testmonial::limit('3')->get();
$data['youtube_video']=VideoGallary::where('channel','Youtube')->limit('3')->get();
$data['Instagram_video']=VideoGallary::where('channel','Instagram')->limit('3')->get();

 return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    public function category_products(Request $request){
        
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

        public function brand_products(Request $request){

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

            public function product_view(Request $request){

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
              $userId=$request->user_id;
              if ($userId > 0) {
                $data['wishList']=WishList::where('user_id',$userId)->where('product_id',$pro_id)->first();
              }
             else{
              $data['wishList']=[];
             }
              $data['product_images']=ProductImages::where('product_id','=',$product_id)
                               ->limit('4')
                             ->get();
              
              $data['group']=Item::where('status','=','1')->select('id','name','sub_name','product_slug','product_id','product_image','product_price','product_price_offer')
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
              $data['review']=Review::where('product_id','=',$product_id)->get();
              $data['review_count']=Review::where('product_id','=',$product_id)->count();
              
               return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
              
              } catch (\Exception $e) {
                  
                  return $e->getMessage();
                }
              
              
              
                
                
                }
                public function search(Request $request){


                                    $key=$request->input('key');
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
                    
                     
                    return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                    
                    
                    }
                    public function category_search(Request $request){


                      $key=$request->input('key');
                      $a=$data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','product_slug')
                      ->join('brands','brands.id','=','items.brand_id')
                      ->where('items.status','=',1)
                      ->where('items.category_id','=',$request->category_id)
                      ->where('items.name','like','%'.$key.'%')
                      ->orwhere('items.sub_name','like','%'.$key.'%')
                      ->orwhere('items.measurement_name','like','%'.$key.'%')
                      ->orwhere('items.tag_name','like','%'.$key.'%')
                      ->orwhere('brands.name','like','%'.$key.'%') 
                      
                      ->paginate(20)->appends($request->except('page'));
                      $count=$a->count();
                      $data['cat_name']='Result for:'.$key.'('.$count.')'; 
      
       
      return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
      
      
      }
      public function brand_search(Request $request){


        $key=$request->input('key');
        $a=$data['product']=Item::select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','product_slug')
        ->join('brands','brands.id','=','items.brand_id')
        ->where('items.status','=',1)
        ->where('items.brand_id','=',$request->brand_id)
        ->where('items.name','like','%'.$key.'%')
        ->orwhere('items.sub_name','like','%'.$key.'%')
        ->orwhere('items.measurement_name','like','%'.$key.'%')
        ->orwhere('items.tag_name','like','%'.$key.'%')
        ->orwhere('brands.name','like','%'.$key.'%') 
        
        ->paginate(20)->appends($request->except('page'));
        $count=$a->count();
        $data['cat_name']='Result for:'.$key.'('.$count.')'; 


return response()->json(['data' => $data, 'success' => true, 'messages' => []]);


}
                    public function new_arrivals(){
                        try {
                        $data['product']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                          ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','1')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                       
                                
                        $data['rod']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','1')
                                       ->where('items.status','=','2')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                        $data['line']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','3')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                        $data['lure']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','4')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                        $data['accessories']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','5')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                                       
                        $data['terminal']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','6')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();
                                       
                        $data['apparels']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                           ->where('items.category_id','=','7')
                                       ->where('items.status','=','1')
                                       ->where('items.prime_id','=','0')
                                      
                                       ->orderby('items.id','desc')
                                       ->distinct() 
                                       ->limit('16') 
                                       ->get();

                                       return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                       
                               } catch (\Exception $e) {
                              
                               return $e->getMessage();
                             } 
                         }
                         public function new_arrivals_category(Request $request){
                            try {
                            
                           //   $id = $id;  
                        $data['category']=Category::where('id',$request->category_id)->first();
                           $data['product']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                     ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                       ->where('items.category_id','=',$request->category_id)
                                   ->where('items.status','=','1')
                                   ->where('items.prime_id','=','0')
                                  
                                   ->orderby('items.id','desc')
                                   ->distinct() 
                                   ->paginate(20);
                                   return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                       } catch (\Exception $e) {
                          
                           return $e->getMessage();
                         } 
                       }
                       public function blogs(Request $request){
                        try {
                        $data['blog']=Blog::where('id','!=',$request->id)->first();
    
                        return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                    } catch (\Exception $e) {
                          
                        return $e->getMessage();
                      } 
                    }
                    public function all_blogs(Request $request){
                      try {
                      $data['all_blog']=Blog::select('id','blog_title','blog_short','blog_image')->get();
  
                      return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                  } catch (\Exception $e) {
                        
                      return $e->getMessage();
                    } 
                  }
                  public function all_youtube_video(Request $request){
                    try {
                      $data['youtube_video']=VideoGallary::where('channel','Youtube')->get();
                    return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
                } catch (\Exception $e) {
                      
                    return $e->getMessage();
                  } 
                }
                public function all_instagram_video(Request $request){
                  try {
                    $data['Instagram_video']=VideoGallary::where('channel','Instagram')->get();

                  return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
              } catch (\Exception $e) {
                    
                  return $e->getMessage();
                } 
              }
              public function category(Request $request){
                try {
                  $data['category'] = Category::get();

                return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
            } catch (\Exception $e) {
                  
                return $e->getMessage();
              } 
            }
              public function getDistrict(Request $request){
                try {
                  $data['district'] = District::where("state_id",$request->state_id)->get(["id","name"]);

                return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
            } catch (\Exception $e) {
                  
                return $e->getMessage();
              } 
            } 
              
            public function getState(Request $request){
              try {
                $data['state'] = State::get(["id","name"]);

              return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
          } catch (\Exception $e) {
                
              return $e->getMessage();
            } 
          }
          public function getDeliveryCharge(Request $request){
            try {
              $state = State::find($request->state_id);
              $data['deliveryCharge'] = $state->delivery_charge;
            return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
        } catch (\Exception $e) {
              
            return $e->getMessage();
          } 
        }
        
     public function checkout(Request $request){

      // return $request->all();
       DB::transaction(function () use ($request,&$orders) {
      $rod_packing_charge = $request->input('rod_packing_charge');
      $delivery_charge = $request->input('delivery_charge');
      $delivery_partner = $request->input('courier_service');
      $addressId = $request->input('address_id');
      $subtotal = $request->input('subtotal');
      $mode = 'App';
      $totalAmount=$request->input('total_amount');
       $userId=$request->user()->id;
      $customerAddress=CustomerAddress::find($addressId);
      $User=User::find($userId);
      $customerRegistration=CustomerRegistration::find($User->customer_id);
      $customerRegistration->shipping_name=$customerAddress->customer_name;
      $customerRegistration->shipping_address=$customerAddress->customer_address;
      $customerRegistration->shipping_city=$customerAddress->customer_dist;
      $customerRegistration->shipping_state=$customerAddress->customer_state;
      $customerRegistration->shipping_pin=$customerAddress->customer_pincode;
      $customerRegistration->shipping_phone=$customerAddress->customer_mobile;
      $customerRegistration->save();

      $purchase=new Purchase;
      $purchase->customer_id=$User->customer_id;
      $purchase->customer_type=1;
      $purchase->products='';
      $purchase->product_sub_total=$subtotal;
      $purchase->rod_packing_charge=$rod_packing_charge;
      $purchase->shipping_charge=$delivery_charge;
      $purchase->save();

      $district='';
      $state='';
      $pin=$customerAddress->customer_pincode;
      $pay_address=$customerAddress->customer_address.",".$district.",".$state.",".$pin;

      $orders=new Orders;
      $orders->customer_id=$User->customer_id;
      $orders->customer_group_id=1;
      $orders->purchase_id=$purchase->id;
      $orders->customer_name=$customerAddress->customer_name;
      $orders->customer_email=$User->email;
      $orders->customer_mob=$customerAddress->customer_mobile;
      $orders->payment_name=$customerRegistration->customer_name;
      $orders->payment_address=$customerRegistration->customer_address;
      $orders->payment_region_id='';
      $orders->payment_method='Online';
      $orders->shipping_name=$customerAddress->customer_name;
      $orders->shipping_address=$customerAddress->customer_address;
      $orders->shipping_region_id=$customerAddress->customer_pincode;
      $orders->shipping_zone_id=$customerAddress->customer_pincode;
      $orders->remarks='';
      $orders->mode=$mode;
      $orders->total_amnt=$totalAmount;
      $orders->rod_packing_charge=$rod_packing_charge;
      $orders->shipping_charge=$delivery_charge;
      $orders->delivery_partner=$delivery_partner;
      $orders->order_status_id=1;
      $orders->created_at=Carbon::now('Asia/Qatar');
      $orders->save();
        
      $ord_id='TACKLE'.$orders->id;
      $orders= Orders::find($orders->id);
      $orders->order_number=$ord_id;
      $orders->save();
           
      $goods_out = new GoodsOutOnline;
      $goods_out->in_date = Carbon::now();
      $goods_out->in_time = date('H:i:s');
      $goods_out->invoice_no ='';
      $goods_out->delivery_no = '';
      $goods_out->ref_no='';
      $goods_out->gstno = '';
      $goods_out->transaction_mode = 'BANK';
      $goods_out->customer_id = $User->customer_id;
      $goods_out->other_charge = $delivery_charge+$rod_packing_charge;
      $goods_out->discount =0;
      $goods_out->receipt = $totalAmount;
      $goods_out->balance = 0;
      $goods_out->total = $totalAmount;
      $goods_out->sub_total=$subtotal;
      $goods_out->total_tax=0;
      $goods_out->order_id =$ord_id;
      $goods_out->order_prime_id=$orders->id;
      $goods_out->user_id =$userId;
      $goods_out->save();

      foreach($request->input('item_id') as $key=>$val)
       {
                          
        $product= Item::find($val);
        $tax=Tax::find($product->tax_id);

        $qty=$request->input('quantity')[$key];
        $mrp=$request->input('mrp')[$key];                  
        $percentage=$tax->percentage+100;
        $tax_rate=$mrp/$percentage*100;
          
        $rate=$mrp/$percentage*100;
        $taxable_rate=$tax_rate;
        $mrp_rate=$rate;
        $tax_rate=$mrp-$tax_rate;
                              
        $detail = new GoodsOutDetailOnline;
        $detail->goods_out_id=$goods_out->id;
        $detail->item_id=$product->id;
        $detail->quantity = $qty;
        $detail->mrp = $mrp;
        $detail->rate = $mrp_rate;
        $detail->prodiscount = 0; 
        $detail->taxable = $qty*$taxable_rate;
        $detail->tax_amt = $qty*$tax_rate;
        $detail->amount =$qty*$mrp;
        $detail->order_id =$ord_id;
        $detail->order_prime_id=$orders->id;
        $detail->save();
                       }
         });
        if($orders){ 
        return response()->json(['data'=>$orders,'success'=>true,'messages'=>['Data Inserted']]);
          }
          else{
          return response()->json(['data'=>[],'success'=>false,'messages'=>['No data Inserted']]);
                } 

      }

      public function add_fishing_report(Request $request){
        // return $request->all();
        try {
          $validator = Validator::make($request->all(), [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);
        if ($validator->fails()) {
          return response()->json([
              'success' => false,
              'errors' => $validator->errors()
          ], 422); // HTTP 422 Unprocessable Entity
      }
        // return $request->all();
        if($request->hasFile('image')) {

            $image = Image::make($request->file('image'));
            $imageName = time().'-'.$request->file('image')->getClientOriginalName();
            $destinationPathThumbnail = public_path('uploads/fishreports');
            $image->resize(100,100);
            $image->save($destinationPathThumbnail.$imageName);
        }

       
          $fishReports = new FishReports;
          // $fishReports->user_id=$request->user()->id;
          $fishReports->user_id=$request->user()->id;
          $fishReports->name=$request->name;
          $fishReports->place = $request->place;
          $fishReports->tacke_used = $request->tacke_used;
          $fishReports->image = $imageName;
          $fishReports->in_date = Carbon::now();
          $fishReports->in_time = date('H:i:s');
          $fishReports->status = 0;
          $fishReports->save();

          if($fishReports){ 
            return response()->json(['data'=>$fishReports,'success'=>true,'messages'=>['Data Inserted']]);
              }
              else{
              return response()->json(['data'=>[],'success'=>false,'messages'=>['No data Inserted']]);
                    } 
    } catch (\Exception $e) {
          
        return $e->getMessage();
      } 
    }
    public function getFishing_report(Request $request){
      try {
        $data['fishing'] = FishReports::where('status',1)->orderBy('id','DESC')->limit('10')->get();
      return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
  } catch (\Exception $e) {
        
      return $e->getMessage();
    } 
  }
  public function getFishing_report_full(Request $request){
    try {
      $data['fishing'] = FishReports::where('status',1)->orderBy('id','DESC')->get();
    return response()->json(['data' => $data, 'success' => true, 'messages' => []]);
} catch (\Exception $e) {
      
    return $e->getMessage();
  } 
}
        // public function shop_complete(Request $request){
        //   // return $request->all();
        //   $pay_method=$request->payment;
          
        //   $rod_packing_charge = $request->input('rod_packing_charge');
        //   $delivery_charge = $request->input('delivery_charge');
        //   $delivery_partner = $request->input('courier_service');
        //   $products=Cart::content();
        //   $subtotal=Cart::subtotal();
        //   if(Cart::count()<=0){ return back();}
        //   if($subtotal<=0) {
        //       return back();
              
        //   }else {
        //   $b = str_replace( ',', '', Cart::subtotal() );
          
        //   $tot_shipping=$b+$delivery_charge+$rod_packing_charge;
          
        //   // $mode = $request->input('mod');
          
        //   $usercs=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->first();
        //   $ussid = $usercs->customer_id; 
          
          
        //    DB::table('customer_registration')
        //                       ->where('id', '=', $ussid)
        //                       ->update([
        //                           'shipping_name' => $request->input('shipping_name'), 
        //                           'shipping_address' => $request->input('shipping_address'),
        //                           'shipping_city' => $request->input('shipping_city'), 
        //                           'shipping_state' => $request->input('shipping_state'), 
        //                           'shipping_pin' => $request->input('shipping_pin'),
        //                           'shipping_phone' => $request->input('shipping_phone')
                             
        //                               ]); 
        //   if(session('username')){
          
        //     $uid = $ussid;
          
        //   }
        //   else{    return back();}
          
          
          
        //   $user=DB::table('customer_registration')->where('id','=',$uid)->get();
          
          
          
        //   foreach ($user as $users) {
        //    $cust_id=$users->customer_id;
        //    $customer_type=$users->customer_type;
        //    $shipping_address=$users->shipping_address;
        //    $state=$users->shipping_state;
        //    $dist=$users->shipping_city;
        //    $pin=$users->shipping_pin;
        //   }
          
          
          
        //   $purchase_id=DB::table('purchase')->insertGetId([
          
        //   'customer_id'=>$cust_id,
        //   'customer_type'=>$customer_type,
        //   'products'=>$products,
        //   'product_sub_total'=>$tot_shipping,
        //   'rod_packing_charge'=>$rod_packing_charge,
        //   'shipping_charge'=>$delivery_charge,
          
        //   ]);
          
        //   $pay_address=$shipping_address.",".$dist.",".$state.",".$pin;
        //   $or_id=DB::table('orders')->insertGetId([
          
        //   'customer_id'=>$cust_id,
        //   'customer_group_id'=>$customer_type,
        //   'purchase_id'=>$purchase_id,
        //   'customer_name'=>$users->customer_name,
        //   'customer_email'=>$users->customer_email,
        //   'customer_mob'=>$users->shipping_phone,
        //   'payment_name'=>$users->customer_name,
        //   'payment_address'=>$pay_address,
        //   'payment_region_id'=>$users->customer_pincode,
        //   'payment_method'=>$pay_method,
        //   'shipping_name'=>$users->shipping_name,
        //   'shipping_address'=>$shipping_address,
        //   'shipping_region_id'=>$users->shipping_pin,
        //   'shipping_zone_id'=>$users->shipping_pin,
        //   'remarks'=>$users->remarks,
        //   'total_amnt'=>$tot_shipping,
        //   'rod_packing_charge'=>$rod_packing_charge,
        //   'shipping_charge'=>$delivery_charge,
        //   'delivery_partner'=>$delivery_partner,
        //   'order_status_id'=>1,
        //   'created_at'=>Carbon::now('Asia/Qatar')
        //   ]);
          
        //   $ord_id='TACKLE'.$or_id;
        //   DB::table('orders')->where('order_id','=',$or_id)->update([
          
        //   'order_number'=>$ord_id
        //   ]);
                  
        //               $goods_out = new GoodsOutOnline;
        //               $goods_out->in_date = Carbon::now();
        //               $goods_out->in_time = date('H:i:s');
        //               $goods_out->invoice_no ='';
        //               $goods_out->delivery_no = '';
        //               $goods_out->ref_no='';
        //               $goods_out->gstno = '';
        //               $goods_out->transaction_mode = 'BANK';
        //               $goods_out->customer_id = $cust_id;
        //               $goods_out->other_charge = $delivery_charge+$rod_packing_charge;
        //               $goods_out->discount =0;
        //               $goods_out->receipt = $tot_shipping;
        //               $goods_out->balance = 0;
        //               $goods_out->total = $tot_shipping;
        //               $goods_out->sub_total=$b;
        //               $goods_out->total_tax=0;
        //               $goods_out->order_id =$ord_id;
        //               $goods_out->order_prime_id=$or_id;
        //               $goods_out->user_id =1;
        //               $goods_out->save();
                      
        //               foreach ($products as $stock) {
                          
        //                   $product= Item::where('product_id','=',$stock->id)->first();
        //                   $tax=Tax::find($product->tax_id);
                          
        //             $percentage=$tax->percentage+100;
        //             $tax_rate=$stock->price/$percentage*100;
          
        //             $rate=$stock->price/$percentage*100;
        //             $taxable_rate=$tax_rate;
        //             $mrp_rate=$rate;
        //             $tax_rate=$stock->price-$tax_rate;
                   
                  
                          
        //                   $detail = new GoodsOutDetailOnline;
        //                   $detail->goods_out_id=$goods_out->id;
        //                   $detail->item_id=$product->id;
        //                   $detail->quantity = $stock->qty;
        //                   $detail->mrp = $stock->price;
        //                   $detail->rate = $mrp_rate;
        //                   $detail->prodiscount = 0; 
        //                   $detail->taxable = $stock->qty*$taxable_rate;
        //                   $detail->tax_amt = $stock->qty*$tax_rate;
        //                   $detail->amount =$stock->qty*$stock->price;
        //                   $detail->order_id =$ord_id;
        //                   $detail->order_prime_id=$or_id;
        //                   $detail->save();
        //               }
               
        //   foreach ($products as $stock) {
              
          
          
          
        //     $remain=Item::where('product_id','=',$stock->id)->get();
          
        //     foreach ($remain as $remains) {
        //      $remainingqty=$remains->total_stock_count;
        //     }
          
        //     $rqty=$remainingqty-$stock->qty;
            
          
          
          
        //   }
          
        //   $request->session()->flash('shopping_succ','succ');
        //     Cart::destroy();
        //     $data['net_total']=$tot_shipping;
        //     $data['order_id']=$or_id;
        //     $data['customer']=DB::table('customer_registration')->where('id','=',$uid)->first();
        //     return view('front-end.payment_method',$data);
        //   // return redirect('/');
        //    // return redirect('thanks');
          
          
        //   //   $data = array('name'=>"Itcity",'to_mail'=>$users->customer_email,'user_name'=>$users->customer_name,'order_id'=>$ord_id,'address'=>$pay_address,'mobile'=>$users->customer_mobile,'purchase_id'=>$purchase_id,'pay_method'=>$pay_method);
           
        //       //   Mail::send('mail-templates/invoice', $data, function($message) use ($data){
          
        //       //       $message->to($data['to_mail'],'itcity')->subject
        //       //          ('Invoice');
        //       //       $message->from('info@itcityonlinestore.com','IT City Online Store');
          
        //       //   });
          
          
          
          
          
          
        //   }
        //   }
}
