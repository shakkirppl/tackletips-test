<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requests;
use DB;
use Hash;
use Image;
use File;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Encryption\Encrypter;
use Illuminate\Support\Facades\Log;
use Session;
use Redirect;
use Carbon\Carbon;
use Cart;
use Razorpay\Api\Api;
use Exception;
use App\Models\GoodsOutOnline;
use App\Models\GoodsOutDetailOnline;
use App\Models\InvoiceNo;
use App\Models\Item;
use App\Models\Tax;
use App\Models\Adds;
use App\Models\Blog;
use App\Models\Brands;
use App\Models\Category;
use App\Models\HomeImages;
use App\Models\Orders;
use App\Models\Visitors;
use App\Models\Testmonial;
use App\Models\StockTransactions;
use App\Models\CustomerRegistration;

class FrontController extends Controller
{
    
  
  public function index(Request $request){

 try {
//  Cart::destroy();

    
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
$data['blog']=Blog::limit('3')->get();
$data['testimonial']=Testmonial::limit('3')->get();


$cookies=request()->cookie('laravel_session');
DB::table('visitors')->insert([
    
    'ip'=>$cookies
    ]);

return view('front-end.index',$data);  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }


  
    public function new_arrivals_category($id){
         try {
           $id = $id;  
        //   $id = $id;  
     $data['category']=Category::where('id',$id)->first();
        $data['product']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=',$id)
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
                  return view('front-end.new-arrivals-category',$data);
    } catch (\Exception $e) {
       
        return $e->getMessage();
      } 
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
                ->get();

         
 $data['rod']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','1')
                ->where('items.status','=','2')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
 $data['line']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','3')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
 $data['lure']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','4')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
 $data['accessories']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','5')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
                
 $data['terminal']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','6')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
                
 $data['apparels']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                  ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                    ->where('items.category_id','=','7')
                ->where('items.status','=','1')
                ->where('items.prime_id','=','0')
               
                ->orderby('items.id','desc')
                ->distinct() 
                ->get();
    
$data['category']=Category::get();
$data['brands']=Brands::get();


        return view('front-end.new-arrivals',$data);

        } catch (\Exception $e) {
       
        return $e->getMessage();
      } 
  }

public function add_to_cart(Request $request){

return back();

  }

  



  public function addcart_total(){
 try {
$sub=Cart::subtotal();
$html="";

  
$html.=' <div class="summary">
                                                <div class="subtotal">Sub Total</div>
                                                <div class="price-s">$210.5</div>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="#" class="btn btn-border-2">View Cart</a>
                                                <a href="#" class="btn btn-common">Checkout</a>
                                                <div class="clear"></div>
                                            </div>
                                            
';

        
        
echo $html;
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }

  public function addcart_count(){
 try {
$count=Cart::content()->groupBy('id')->count();
echo $count;
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }

  public function my_cart(){
 try {
   $data['cart']=Cart::content();
   
    return view('front-end.cart',$data);
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }

  public function remove_cart($id,Request $request){

 try {
   Cart::remove($id);
    $request->session()->flash('succ_title','Successfully Removed from cart.');
   return redirect('/');
    } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }
    public function remove_all_cart(Request $request){

 try {
   Cart::destroy();
    $request->session()->flash('succ_title','Successfully Remove cart');
   return redirect('/');
    } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }


  public function update_cart(Request $request){
 try {

$qty=$request->input('quantity');
$rid=$request->input('rid');
$pid=$request->input('pid');

$pro=Item::where('product_id',$pid)->first();

 $max_limit=$pro->min_pur_qty;
if($max_limit=='1'){

Cart::update($rid,'1');
$request->session()->flash('succ_title','Cart Successfully Updated');
    return back();
}else{

          Cart::update($rid,$qty);
$request->session()->flash('succ_title','Cart Successfully Updated');
    return back();
    
}
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
 
  }
  

    

  public function fish_report(Request $request)
    {
       try {
          $fish_reports= DB::table('fish_reports')->where('status','active')->orderby('id','desc')->get();
         return view('front-end.fishreport',['fish_reports'=>$fish_reports]);
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }

   public function getdistrict(Request $request)
    {
       try {
        $data['states'] = DB::table('district')->where("state_id",$request->country_id)->get(["name","id"]);
        return response()->json($data);
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }

  public function checkout(){
 try {
  if(session('username')){
  $data['user']=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->first();
   $data['cart']=Cart::content();
 
$data['state']=DB::table('state')->where('status','=','Active')->get();
$data['district']=DB::table('district')->where('status','=','Active')->first();
$rd=0;
foreach ($data['cart'] as $cart){ 
    $rod=Item::where('product_id','=',$cart->id)->first();
    $in=StockTransactions::where('item_id',$rod->id)->sum('in_qty');
    $out=StockTransactions::where('item_id',$rod->id)->sum('out_qty');
    // $stock=$in-$out;
    $stock = floor($in - $out);
          


if($cart->qty>$stock)
{
     Cart::update($cart->rowId,$stock);
    
}
if($rod->category_id==2){
$rd=$rd+150;
}
}
 $data['rod']=$rd;
$data['cart']=Cart::content();
$subtotal=Cart::subtotal();
 $sub = str_replace( ',', '', Cart::subtotal() );
if($sub>0){
 $data['total']=$sub+$rd;
}
else{
   $data['total']=0;  
}

  return view('front-end.checkout',$data);
}
else{
  $data['type']='checkout';
    return view('front-end.register',$data);

  
}
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }

  public function customer_registration(Request $request){
      
   
 try {
$pass=$request->input('password');
$password = Crypt::encryptString($pass);
 
$from=$request->input('from');



$emcheck=DB::table('customer_registration')->where('customer_email',$request->input('email'))->orWhere('customer_mobile','=',$request->input('customer_mobile'))->get();

if($emcheck->isEmpty()){
    
   
    
DB::table('customer_registration')->insert([

'customer_name'=>$request->input('name'),
'customer_email'=>$request->input('email'),
'customer_mobile'=>$request->input('customer_mobile'),
'customer_type'=>'1',
'password'=>$password,
'status'=>'1'

]);




if($from=='checkout'){
$request->session()->put('user',$request->input('name'));
  $request->session()->put('username',$request->input('email'));

  $request->session()->flash('succ_title','Congratulations.Your Account has been Created Successfully.');
return redirect('checkout');
}else{
  $request->session()->put('user',$request->input('name'));
  $request->session()->put('username',$request->input('email'));
   $request->session()->flash('succ_title','Congratulations.Your Account has been Created Successfully.');
return redirect('/');

}
}else{
    
   $request->session()->flash('emailexist','Sorry.This Email already used by another user.');
   return back()->withInput();;
    
    
}
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }

  public function payment(){
 try {
// if(session('username')){
$data['user']=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->get();
   $data['cart']=Cart::content();
    return view('payment',$data);
// }else{


//   return redirect('checkout');
// }

    } catch (\Exception $e) {
       
        return $e->getMessage();
      }

  }

  public function check_email(Request $request){
 try {
$email=$request->email;
$emailcheck = DB::table("customer_registration")
->where("customer_email",'=',$email)
->get();
return response()->json($emailcheck);

 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}


  public function check_email_2(Request $request){
 try {
$email=$request->email;
$emailcheck = DB::table("customer_registration")
->where("customer_email",'=',$email)
->where('customer_type','=','1')
->get();
return response()->json($emailcheck);
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

}

  public function check_subscription(Request $request)
    {
       try {
      $email        =   $request->email;
      $emailcheck   =   DB::table("whatsapp_mobile")->where("mobile",'=',$email)->get();
      return response()->json($emailcheck);
       } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }

public function check_mobile(Request $request){

$mobile=$request->mobile;
$mobcheck = DB::table("customer_registration")
->where("customer_mobile",'=',$mobile)
->get();
return response()->json($mobcheck);


}
public function getdeliverycharge(Request $request,$id){

$delevery=DB::table('state')->where("id",$id)->first();
     return $delevery->delivery_charge;
 return response()->json(500);
 

}
  public function check_size(Request $request){
 try {
$size=$request->size;
$sizecheck = DB::table("products_attributes")
->join('products','products.product_id','=','products_attributes.product_id')
->where('products.status','=','1')
->where('products_attributes.attribute_value','=',$size)
->get();
$html="";


if(!$sizecheck->isEmpty()){


  foreach ($sizecheck as $products) {
    //  $pro_id = Crypt::encryptString($products->product_id);
       $pro_id =$products->product_id;



$price=$products->product_price;
$offer=$products->product_price_offer;

$offer_price=($price/100)*$offer;
$off=$price-$offer_price; 


$html.='    
<div class="col-sm-4 col-xs-6">
<div class="products_item">
<div class="product_image">
<div class="img_div_view">
<a href="product-details.php">
<img class="img-responsive" src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'"> 
</a>
</div>
<div class="second_image">
<a href="'.url('product-view/'.$pro_id).'">
<img src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'">
</a>
</div>
<!-- /Notify Me-->
</div><!-- /Product Image-->
<div class="list_title">
<h3>'.$products->product_name.'</h3>

<i class="fa fa-inr small" aria-hidden="true"></i> '.$off.'</span>

</div>
</div>
</div>';


}



}else{

$html.='<center><p>No results Fount.</center></p>';

}
echo $html;
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}


public function check_color(Request $request){

$color=$request->color;
$colorcheck = DB::table("products_attributes")
->join('products','products.product_id','=','products_attributes.product_id')
->where('products.status','=','1')
->where('products_attributes.attribute_value','=',$color)
->get();
$html="";


if(!$colorcheck->isEmpty()){


  foreach ($colorcheck as $products) {
     $pro_id = Crypt::encryptString($products->product_id);
      $pro_id = $products->product_id;




$price=$products->product_price;
$offer=$products->product_price_offer;

$offer_price=($price/100)*$offer;
$off=$price-$offer_price; 


$html.='    
<div class="col-sm-4 col-xs-6">
<div class="products_item">
<div class="product_image">
<div class="img_div_view">
<a href="product-details.php">
<img class="img-responsive" src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'"> 
</a>
</div>
<div class="second_image">
<a href="'.url('product-view/'.$pro_id).'">
<img src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'">
</a>
</div>
<!-- /Notify Me-->
</div><!-- /Product Image-->
<div class="list_title">
<h3>'.$products->product_name.'</h3>

<i class="fa fa-inr small" aria-hidden="true"></i> '.$off.'</span>

</div>
</div>
</div>';


}



}else{

$html.='<center><p>No results Fount.</center></p>';

}
echo $html;
}



public function check_category(Request $request){

$cat=$request->cat;
$catcheck = DB::table("products")

->where('status','=','1')
->where('products.category_id','=',$cat)
->get();
$html="";


if(!$catcheck->isEmpty()){


  foreach ($catcheck as $products) {
    //  $pro_id = Crypt::encryptString($products->product_id);
       $pro_id = $products->product_id;



$price=$products->product_price;
$offer=$products->product_price_offer;

$offer_price=($price/100)*$offer;
$off=$price-$offer_price; 


$html.='    
<div class="col-sm-4 col-xs-6">
<div class="products_item">
<div class="product_image">
<div class="img_div_view">
<a href="product-details.php">
<img class="img-responsive" src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'"> 
</a>
</div>
<div class="second_image">
<a href="'.url('product-view/'.$pro_id).'">
<img src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'">
</a>
</div>
<!-- /Notify Me-->
</div><!-- /Product Image-->
<div class="list_title">
<h3>'.$products->product_name.'</h3>

<i class="fa fa-inr small" aria-hidden="true"></i> '.$off.'</span>

</div>
</div>
</div>';


}



}else{

$html.='<center><p>No results Fount.</center></p>';

}
echo $html;
}

public function price_range(Request $request){

$min_price=$request->min_price;
$max_price=$request->max_price;
$catcheck = DB::table("products")
->where('status','=','1')
->whereBetween('product_price', [$min_price, $max_price])
->get();
$html="";


if(!$catcheck->isEmpty()){


  foreach ($catcheck as $products) {
    //  $pro_id = Crypt::encryptString($products->product_id);
       $pro_id = $products->product_id;



$price=$products->product_price;
$offer=$products->product_price_offer;

$offer_price=($price/100)*$offer;
$off=$price-$offer_price; 


$html.='    
<div class="col-sm-4 col-xs-6">
<div class="products_item">
<div class="product_image">
<div class="img_div_view">
<a href="product-details.php">
<img class="img-responsive" src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'"> 
</a>
</div>
<div class="second_image">
<a href="'.url('product-view/'.$pro_id).'">
<img src="'.url('uploads/product/thumb_images/'.$products->product_image).'" alt="'.$products->product_name.'">
</a>
</div>
<!-- /Notify Me-->
</div><!-- /Product Image-->
<div class="list_title">
<h3>'.$products->product_name.'</h3>

<i class="fa fa-inr small" aria-hidden="true"></i> '.$off.'</span>

</div>
</div>
</div>';


}



}else{

$html.='<center><p>No results Fount.</center></p>';

}
echo $html;
}




public function pass_decrypt(Request $request){
    $pswd="eyJpdiI6InRHMnExamJkZGY0TmszV0hxSXEwVVE9PSIsInZhbHVlIjoiWjcxUXJCamg3endrTy9qNSs5cC9vQT09IiwibWFjIjoiMjljMzY2OGY1OTA1YmExZjM0NWNmOGMxNTJiMjZkZTYyMWQwNWZmMjgzNWRjMmQ4NzZjNGFmMjA1YjRkZjkzNSIsInRhZyI6IiJ9";
   return  $pass = Crypt::decryptString($pswd);
}


public function pass_updation(Request $request)
{
    // Step 1: Define both keys


    // Step 3: Process customer passwords
    $customers = CustomerRegistration::whereBetween('id', [2219, 2231])->get();

    foreach ($customers as $customer) {
      try {
          $decrypted = Crypt::encryptString($customer->de_pas);
          CustomerRegistration::where('id', $customer->id)
          ->update(['en_new' => $decrypted]);
     
      } catch (\Exception $e) {
          Log::error("Decryption failed for ID {$customer->id}: " . $e->getMessage());
      }
  }

    return 'Complete f';
}


public function login(Request $request){

$username=$request->input('emmail_login');
$password=$request->input('password_login');

$from=$request->input('from');

$log=DB::table('customer_registration')->where('customer_email','=',$username)->orWhere('customer_mobile', '=', $username)->get();

if(!$log->isEmpty()){




foreach ($log as $logs) {
 $pswd=$logs->password;
 $user=$logs->customer_name;
 $cu_type='1';
}

$pass = Crypt::decryptString($pswd);

if($password==$pass){

  if($logs->status=='1'){



if($from=='checkout'){
$request->session()->put('user',$user);
$request->session()->put('username',$username);
$request->session()->put('user_type',$cu_type);
return redirect('checkout');
}else{
$request->session()->put('user',$user);
$request->session()->put('username',$username);
$request->session()->put('user_type',$cu_type);
  return redirect('/');
}


}else{

 $request->session()->flash('error_login','Your Account has been Temporarly Blocked');
return back();

}
}else{

  $request->session()->flash('error_login','Invalid username/ Password');
return back();

} 




}else{

$request->session()->flash('error_login','Invalid username/ Password');
return back();


}

}


public function my_login(){


      $data['type']='normal';
    return view('front-end.register',$data);
}

public function complete_shopping(Request $request){

$products=Cart::content();
$sub=Cart::subtotal();
dd($sub);
$subtotal=Cart::subtotal();
$b = str_replace( ',', '', Cart::subtotal() );
if($b>='30.000') {
$tot_shipping=$b+1;
}else{
    $tot_shipping=$b;
}

$user=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->get();

foreach ($user as $users) {
 $cust_id=$users->id;
 $customer_type=$users->customer_type;
 $shipping_address=$users->customer_address;
 $state=$users->customer_state;
 $dist=$users->customer_dist;
 $pin=$users->customer_pincode;
}

$purchase_id=DB::table('purchase')->insertGetId([

'customer_id'=>$cust_id,
'customer_type'=>$customer_type,
'products'=>$products,
'product_sub_total'=>$tot_shipping

]);

$pay_address=$shipping_address.",".$dist.",".$state.",".$pin;
$or_id=DB::table('orders')->insertGetId([

'customer_id'=>$cust_id,
'customer_group_id'=>$customer_type,
'purchase_id'=>$purchase_id,
'customer_name'=>$users->customer_name,
'customer_email'=>$users->customer_email,
'customer_mob'=>$users->customer_mobile,
'payment_name'=>$users->customer_name,
'payment_address'=>$pay_address,
'payment_region_id'=>$users->customer_pincode,
'payment_method'=>'COD',
'shipping_name'=>$users->customer_name,
'shipping_address'=>$shipping_address,
'shipping_region_id'=>$users->customer_pincode,
'shipping_zone_id'=>$users->customer_pincode,
'total_amnt'=>$tot_shipping,
'created_at'=>Carbon::now('Asia/Qatar')
]);

$ord_id='ITCORDER'.$or_id;
DB::table('orders')->where('order_id','=',$or_id)->update([

'order_number'=>$ord_id
]);

foreach ($products as $stock) {



  $remain=DB::table('products')->where('product_id','=',$stock->id)->get();

  foreach ($remain as $remains) {
   $remainingqty=$remains->product_qty;
  }

  $rqty=$remainingqty-$stock->qty;
  
// DB::table('products')->where('product_id','=',$stock->id)->update([

// 'product_qty'=>$rqty

// ]);


}


$request->session()->flash('shopping_succ','succ');
 Cart::destroy();
return redirect('/');


}

public function success_shopping(){

if(session('username')){
  Cart::destroy();
  return view('success-shopping');

}else{

  return redirect('my-login');
}

}

public function buy_now(Request $request){


$product_id=$request->input('pid');
$qty=$request->input('qty');
$name=$request->input('name');
$addon=$request->input('addon');
$price=$request->input('price');


Cart::destroy();

Cart::add($product_id, $name, $qty, $price,['addon' => $addon]);

return redirect('checkout');


}





public function product_view_share($id){
    
 
    
$data['prometa'] = DB::table('products')->where('product_slug','=',$id)->first();


$url = "https://www.itcityonlinestore.com/product-view-share/$id";


$data['pr_detail']=$pr=DB::table('products')        
        ->where('product_slug','=',$id)        
        ->get();

        foreach($pr as $prs){
            
            $br=$prs->product_brand;
            $title = $prs->product_name;
            $ct_id=$prs->category_id;
            $prdidd = $prs->product_id;
            $image = $prs->product_image;
        }
    
    $img = "https://www.itcityonlinestore.com/uploads/product/thumb_images/$image";
    $metatitle = $title;
    
    
        


 $data['product']=DB::table('products')          
                ->where('status','=','1')
                ->where('product_slug','!=',$id)
                ->where('category_id','=',$ct_id)               
                ->limit('9')
               ->get();


$pp = $data['review']=DB::table('review')->where('product_id','=',$prdidd)->get();

return view('view-details',$data,compact('url','img','metatitle'));


}


public function shipment_tracking($id){
      $id= Crypt::decryptString($id);
      $Orders=Orders::where('order_id',$id)->first();
  return view('front-end.order-track',['orders'=>$Orders]);
}
public function my_account(){

  if(session('username')){

$data['user']=$user=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->get();


foreach ($user as $users) {
 $customer_id=$users->id;
}


$data['history']=DB::table('purchase')->where('customer_id','=',$customer_id)->orderBy('purchase_date','desc')->get();


// $data['order_status']=DB::table('orders')->where('customer_id','=',$customer_id)->get();

  return view('front-end.my-account',$data);
}else{


  return redirect('/');
}

}

public function logout(Request $request){

if(session('username')){

  $request->session()->forget('username');
  Cart::destroy();

  return redirect('/');
}


}






public function all_products(){


$data['product']=DB::table('products') 
                ->join('category','category.cat_id','=','products.category_id')
                ->where('products.status','=','1')                
                ->distinct() 
                ->paginate('9');
$data['category']=DB::table('category')->where('parent_id','0')->get();
$data['brands']=Brands::get();


        return view('products',$data);

}


public function color_products($id){

$data['product']=$ff=DB::table('products')
        ->join('products_attributes','products_attributes.product_id','=','products.product_id')
        ->where('products_attributes.attribute_value','=',$id)
        ->where('products.status','=','1')
        ->get();
        
        if(!$ff->isEmpty()){
    foreach($ff as $ffs) {
        
        $band_id=$ffs->product_brand;
    }
   $br=Brands::where('brands_id','=',$band_id)->get();
   
   foreach($br as $brs){
       
    $brimg=$brs->banner_image;   
   }
   $data['banner_image']=$brimg;
        }else{
            
         $data['banner_image']='cat-default.jpg';   
        }
   
       
return view('products-category',$data);

}



public function contact_us(){


return view('front-end.contact-us');

}
public function thanks(){


return view('front-end.tankyou');

}


public function delivery_info(){


return view('delivery-policy');

}



// public function privacy_policy(){


// return view('privacy-policy');

// }


public function terms_condition(){


return view('terms');

}




public function contact(){


return view('front-end.contact');

}
public function return_policies(){


return view('product-return');

}

public function update_shipp_address(Request $request){


DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->update([

'customer_address'=>$request->input('address'),
'customer_state'=>$request->input('state'),
'customer_dist'=>$request->input('district'),
'customer_mobile'=>$request->input('mobile'),
'customer_pincode'=>$request->input('pincode'),
'remarks'=>$request->input('remarks')


]);

return back();

}

public function quick_purchase(Request $request){


$mobile=$request->input('mobile');



$string = '1234567890';
$string_shuffled = str_shuffle($string);
$otp = substr($string_shuffled, 1, 5);

$products=Cart::content();
$subtotal=Cart::subtotal();

DB::table('guest')->insert([

'mobile'=>$mobile,
'otp'=>$otp,
'status'=>'0',
'products'=>$products,
'total'=>$subtotal,
'created_at'=>Carbon::now('Asia/Qatar')

]);


  $authKey = "208194AMXstzNRHya5ac8ae7a";
       //Multiple mobiles numbers separated by comma
        $mobileNumber ='91'.$mobile;
       //Sender ID,While using route4 sender id should be 6 characters long.
       $senderId = "BLGAMO";

       //Your message to send, Add URL encoding here.
       //$message = urlencode("OTP : $otp");
$message = urlencode("OTP : $otp.  Dear Customer, kindly use this One Time Password (OTP).");

       //Define route 
       $route = "default";
       //Prepare you post parameters
       $postData = array(
           'authkey' => $authKey,
           'mobiles' => $mobileNumber,
           'message' => $message,
           'sender' => $senderId,
           'route' => 4
       );

       //API URL
       $url = "http://api.msg91.com/api/sendhttp.php";
       // init the resource
       $ch = curl_init();
       curl_setopt_array($ch, array(
           CURLOPT_URL => $url,
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_POST => true,
           CURLOPT_POSTFIELDS => $postData
               //,CURLOPT_FOLLOWLOCATION => true
       ));

       //Ignore SSL certificate verification
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


       //get response
       $output = curl_exec($ch);



return view('otp-verify');



}

public function quick_purchase2(Request $request){

$mobile=$request->input('mobile');
$string = '1234567890';
$string_shuffled = str_shuffle($string);
$otp = substr($string_shuffled, 1, 5);

$products=Cart::content();
$subtotal=Cart::subtotal();

$id=DB::table('guest')->insertGetId([

'mobile'=>$mobile,
'otp'=>$otp,
'status'=>'0',
'products'=>$products,
'total'=>$subtotal,
'created_at'=>Carbon::now('Asia/Qatar')

]);

$or_id='AFOGUEST'.$id;

DB::table('guest')->where('guest_id','=',$id)->update([

'status'=>'1',
'order_id'=>$or_id

]); 


return view('guest-success');

}




public function otp_verify(Request $request){

$otp=$request->input('otp');

$check=DB::table('guest')->where('otp','=',$otp)->where('status','=','0')->get();
if(!$check->isEmpty()){

foreach ($check as $checks) {
  $mobile=$checks->mobile;
  $id=$checks->guest_id;
}

$or_id='AFOGUEST'.$id;

DB::table('guest')->where('otp','=',$otp)->update([

'status'=>'1',
'order_id'=>$or_id
]);



$authKey = "208194AMXstzNRHya5ac8ae7a";
       //Multiple mobiles numbers separated by comma
        $mobileNumber ='974'.$mobile;
       //Sender ID,While using route4 sender id should be 6 characters long.
       $senderId = "BLGAMO";

       //Your message to send, Add URL encoding here.
       //$message = urlencode("OTP : $otp");
$message = urlencode("Thank You for purchasing from arabianfreshonline.com.");

       //Define route 
       $route = "default";
       //Prepare you post parameters
       $postData = array(
           'authkey' => $authKey,
           'mobiles' => $mobileNumber,
           'message' => $message,
           'sender' => $senderId,
           'route' => 4
       );

       //API URL
       $url = "http://api.msg91.com/api/sendhttp.php";
       // init the resource
       $ch = curl_init();
       curl_setopt_array($ch, array(
           CURLOPT_URL => $url,
           CURLOPT_RETURNTRANSFER => true,
           CURLOPT_POST => true,
           CURLOPT_POSTFIELDS => $postData
               //,CURLOPT_FOLLOWLOCATION => true
       ));

       //Ignore SSL certificate verification
       curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);


       //get response
       $output = curl_exec($ch);

 return view('guest-success');

}else{

$request->session()->put('otp_error','Sorry.Invalid OTP');
 return view('sorry');
}


}

public function add_wish_list(Request $request){

if(session('username')){
$product_id=$request->product_id;
$qty=$request->qty;
$price=$request->price;

$pro=Item::where('product_id','=',$product_id)->get();

foreach ($pro as $product) {
  
  $name=$product->name;
  
}







Cart::instance('wishlist')->add($product_id, $name, $qty, $price);
$wishlist=Cart::instance('wishlist')->content();
$username=session('username');

$check=DB::table('wishlist')->where('username','=',$username)->where('wishlist','=',$product_id)->get();

if($check->isEmpty()){

DB::table('wishlist')->insert([

'username'=>$username,
'wishlist'=>$product_id

]);

}

$count=DB::table('wishlist')->where('username','=',$username)->count();

echo $count;
}

}

public function wish_list(){
if(session('username')){
$data['wishlist']=DB::table('wishlist')
->join('items','items.product_id','=','wishlist.wishlist')

->where('items.status','=','1')
->where('wishlist.username','=',session('username'))
->orderBy('wishlist.created_at','desc')
->get();

return view('front-end.wishlist',$data);
}else{
  return back();
}

}

public function wish_list_delete($id){


DB::table('wishlist')->where('whishlist_id','=',$id)->delete();
return back();

}

public function wish_to_cart(Request $request){

$product_id=$request->input('product_id');
$qty=$request->input('qty');
$price=$request->input('price');
$name=$request->input('name');

$pro=DB::table('products')->where('product_id',$product_id)->get();
foreach($pro as $pros){

$maxlimit=$pros->min_pur_qty;
}
if($maxlimit=='1'){
Cart::add($product_id, $name, $qty, $price,['addon' => '1']);
 $request->session()->flash('succ_title','Product Added to cart Successfully.');
 return back();
}else{

Cart::add($product_id, $name, $qty, $price,['addon' => '1']);
 $request->session()->flash('succ_title','Product Added to cart Successfully.');
 return back();
}




}

public function clear_wishlist(){


DB::table('wishlist')->where('username','=',session('username'))->delete();
 $request->session()->flash('succ_title','Whishlist cleared successfully');
return redirect('/');

}

public function update_profile(Request $request){

DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->update([

'customer_name'=>$request->input('name'),
'customer_mobile'=>$request->input('mobile'),
'customer_address'=>$request->input('address'),
'customer_state'=>$request->input('state'),
'customer_dist'=>$request->input('district'),
'customer_pincode'=>$request->input('pincode')

]);
 $request->session()->flash('succ_title','Profile Data Updated Successfully.');
return back();



}


public function response_handler(Request $request){
    return 'ok';
}
public function send_contact(Request $request){

  $data['name']=$request->input('name');
  $data['mobile']=$request->input('mobile');
  $data['email']=$request->input('email');
  $data['msg']=$request->input('message');

 Mail::send('mail-templates.contact-us', $data, function ($message) use ($data) {
     $message->from($data['email'], 'orlenegroup.com');
     $message->sender($data['email'], $name = 'orlenegroup.com');
     $message->subject('orlenegroup.com- contact-us');

    $message->to('info@orlenegroup.com', $name = 'orlenegroup.com');
 });
 $request->session()->flash('succ_title','Successfully Sent Message.');
return back();

}

public function deals(Request $request){

$data['product']=DB::table('products')
        ->join('products_price_list','products_price_list.product_id','=','products.product_id')
        ->join('deals','deals.product_id','=','products.product_id')
        ->where('products.status','=','1')
        ->get();
return view('deals',$data);

}
public function forgot_password1(Request $request){

$email=$request->email;
$user=DB::table('customer_registration')->where('customer_email','=',$email)->get();

if($user->isEmpty()){

        $request->session()->flash('false_title','Sorry!');
        $request->session()->flash('false','This email address is not available for use as an ItCity Id.  Please try again or sign in using your existing Itcity Id');
        return back();

}else{

   foreach ($user as $users) {
    $pass=$users->password;
   $name= Crypt::decryptString($pass);

  }
 
 

 $data = array('name'=>"ItCity",'to_mail'=>$email,'user_name'=>$name);
 
      Mail::send('mail-templates/password-request', $data, function($message) use ($data){

         $message->to($data['to_mail'], 'It City Online Store')->subject
            ('It City - Password reset');
         $message->from('info@itcityonlinestore.com','It City Online Store');

      });




$request->session()->flash('done_title','Password Sent to your registered Email');
$request->session()->flash('done','ITCITY has sent an  Password Reset Link to your Email, Thank you.');
return back();



}


    }

public function sub_whatsapp(Request $request){

$email=$request->input('email');
$ip=$request->ip();


DB::table('whatsapp_mobile')->insert([

'mobile'=>$email,
'ip'=>$ip

]);

$request->session()->flash('subscribe','subscribe');
return back();


}

public function search(Request $request){


$key=$request->input('key');

 $data['cat']=DB::table('sub_category')->where('id','=',0)->first(); 

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

       
$data['category']=Category::get();
$data['brands']=Brands::get();


 
   return view('front-end.products-search',$data);


}


public function add_review(Request $request){

DB::table('review')->insert([

'text'=>$request->input('text'),
'author_name'=>$request->input('author'),
'product_id'=>$request->input('product_id')

]);


return back();

}

public function get_price(Request $request){

$product_id=$request->product_id;
$color=$request->color;
$price = DB::table("products_attributes")
->where("product_id",'=',$product_id)
->where("attribute_value",'=',$color)
->get();
foreach ($price as $prices) {
  $pricea=$prices->attribute_price;
                            }
return response()->json($pricea);


}

public function pin_check(Request $request){

$pin=$request->pin;

$pin = DB::table("zone_pincode")
->where("zone_pincode",'=',$pin)
->get();


return response()->json($pin);


}

public function blogs(){

$data['blog']=DB::table('blog')->get();
$data['first']=DB::table('blog')->first();
return view('blog',$data);


}
public function blogss($id){

$data['blog']=DB::table('blog')->where('id','!=',$id)->get();
$data['first']=DB::table('blog')->where('id',$id)->first();
return view('front-end.blog',$data);


}

public function select_lang($id,Request $request){


$request->session()->put('lang',$id);

return redirect('/');


}
public function getChecksum(Request $request)
{
    $str = 'BDUATV2KTK|123498|NA|100.00|NA|NA|NA|INR|NA|R|securityId|NA|NA|F|john@doe1.com|919633740021|NA|NA|NA|NA|NA|NA';
    $checksum = hash_hmac('sha256', $str, 'checksum_key', false);
    $checksum = strtoupper($checksum);
    return $checksum;
}
public function payment_response(Request $request){
    return $request->all();
}
public function shop_complete(Request $request){
// return $request->all();
$pay_method=$request->payment;

$rod_packing_charge = $request->input('rod_packing_charge');
$delivery_charge = $request->input('delivery_charge');
$delivery_partner = $request->input('courier_service');
$products=Cart::content();
$subtotal=Cart::subtotal();
if(Cart::count()<=0){ return back();}
if($subtotal<=0) {
    return back();
    
}else {
$b = str_replace( ',', '', Cart::subtotal() );

$tot_shipping=$b+$delivery_charge+$rod_packing_charge;

// $mode = $request->input('mod');

$usercs=DB::table('customer_registration')->where('customer_email','=',session('username'))->orWhere('customer_mobile','=',session('username'))->first();
$ussid = $usercs->id; 


 DB::table('customer_registration')
                    ->where('id', '=', $ussid)
                    ->update([
                        'shipping_name' => $request->input('shipping_name'), 
                        'shipping_address' => $request->input('shipping_address'),
                        'shipping_city' => $request->input('shipping_city'), 
                        'shipping_state' => $request->input('shipping_state'), 
                        'shipping_pin' => $request->input('shipping_pin'),
                        'shipping_phone' => $request->input('shipping_phone')
                   
                            ]); 
if(session('username')){

  $uid = $ussid;

}
else{    return back();}



$user=DB::table('customer_registration')->where('id','=',$uid)->get();



foreach ($user as $users) {
 $cust_id=$users->id;
 $customer_type=$users->customer_type;
 $shipping_address=$users->shipping_address;
 $state=$users->shipping_state;
 $dist=$users->shipping_city;
 $pin=$users->shipping_pin;
}



$purchase_id=DB::table('purchase')->insertGetId([

'customer_id'=>$cust_id,
'customer_type'=>$customer_type,
'products'=>$products,
'product_sub_total'=>$tot_shipping,
'rod_packing_charge'=>$rod_packing_charge,
'shipping_charge'=>$delivery_charge,

]);

$pay_address=$shipping_address.",".$dist.",".$state.",".$pin;
$or_id=DB::table('orders')->insertGetId([

'customer_id'=>$cust_id,
'customer_group_id'=>$customer_type,
'purchase_id'=>$purchase_id,
'customer_name'=>$users->customer_name,
'customer_email'=>$users->customer_email,
'customer_mob'=>$users->shipping_phone,
'payment_name'=>$users->customer_name,
'payment_address'=>$pay_address,
'payment_region_id'=>$users->customer_pincode,
'payment_method'=>$pay_method,
'shipping_name'=>$users->shipping_name,
'shipping_address'=>$shipping_address,
'shipping_region_id'=>$users->shipping_pin,
'shipping_zone_id'=>$users->shipping_pin,
'remarks'=>$users->remarks,
'total_amnt'=>$tot_shipping,
'rod_packing_charge'=>$rod_packing_charge,
'shipping_charge'=>$delivery_charge,
'delivery_partner'=>$delivery_partner,
'order_status_id'=>1,
'created_at'=>Carbon::now('Asia/Qatar')
]);

$ord_id='TACKLE'.$or_id;
DB::table('orders')->where('order_id','=',$or_id)->update([

'order_number'=>$ord_id
]);
        
            $goods_out = new GoodsOutOnline;
            $goods_out->in_date = Carbon::now();
            $goods_out->in_time = date('H:i:s');
            $goods_out->invoice_no ='';
            $goods_out->delivery_no = '';
            $goods_out->ref_no='';
            $goods_out->gstno = '';
            $goods_out->transaction_mode = 'BANK';
            $goods_out->customer_id = $cust_id;
            $goods_out->other_charge = $delivery_charge+$rod_packing_charge;
            $goods_out->discount =0;
            $goods_out->receipt = $tot_shipping;
            $goods_out->balance = 0;
            $goods_out->total = $tot_shipping;
            $goods_out->sub_total=$b;
            $goods_out->total_tax=0;
            $goods_out->order_id =$ord_id;
            $goods_out->order_prime_id=$or_id;
            $goods_out->user_id =1;
            $goods_out->save();
            
            foreach ($products as $stock) {
                
                $product= Item::where('product_id','=',$stock->id)->first();
                $tax=Tax::find($product->tax_id);
                
          $percentage=$tax->percentage+100;
          $tax_rate=$stock->price/$percentage*100;

          $rate=$stock->price/$percentage*100;
          $taxable_rate=$tax_rate;
          $mrp_rate=$rate;
          $tax_rate=$stock->price-$tax_rate;
         
        
                
                $detail = new GoodsOutDetailOnline;
                $detail->goods_out_id=$goods_out->id;
                $detail->item_id=$product->id;
                $detail->quantity = $stock->qty;
                $detail->mrp = $stock->price;
                $detail->rate = $mrp_rate;
                $detail->prodiscount = 0; 
                $detail->taxable = $stock->qty*$taxable_rate;
                $detail->tax_amt = $stock->qty*$tax_rate;
                $detail->amount =$stock->qty*$stock->price;
                $detail->order_id =$ord_id;
                $detail->order_prime_id=$or_id;
                $detail->save();
            }
     
foreach ($products as $stock) {
    



  $remain=Item::where('product_id','=',$stock->id)->get();

  foreach ($remain as $remains) {
   $remainingqty=$remains->total_stock_count;
  }

  $rqty=$remainingqty-$stock->qty;
  



}

$request->session()->flash('shopping_succ','succ');
  Cart::destroy();
  $data['net_total']=$tot_shipping;
  $data['order_id']=$or_id;
  $data['customer']=DB::table('customer_registration')->where('id','=',$uid)->first();
  return view('front-end.payment_method',$data);
// return redirect('/');
 // return redirect('thanks');


//   $data = array('name'=>"Itcity",'to_mail'=>$users->customer_email,'user_name'=>$users->customer_name,'order_id'=>$ord_id,'address'=>$pay_address,'mobile'=>$users->customer_mobile,'purchase_id'=>$purchase_id,'pay_method'=>$pay_method);
 
    //   Mail::send('mail-templates/invoice', $data, function($message) use ($data){

    //       $message->to($data['to_mail'],'itcity')->subject
    //          ('Invoice');
    //       $message->from('info@itcityonlinestore.com','IT City Online Store');

    //   });






}
}
  public function razore_payment(Request $request){
     try {
    $input = $request->all();
  
        // $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
  
        // $payment = $api->payment->fetch($input['razorpay_payment_id']);
  
        // if(count($input)  && !empty($input['razorpay_payment_id'])) {
        //     try {
        //         $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount'=>$payment['amount'])); 
  
        //     } catch (Exception $e) {
        //         return  $e->getMessage();
        //         Session::put('error',$e->getMessage());
        //         return redirect()->back();
        //     }
        // }
//           $products=Cart::content();

//           foreach ($products as $stock) {

//   $remain=Item::where('product_id','=',$stock->id)->get();

//   foreach ($remain as $remains) {
//    $remainingqty=$remains->web_stock;
//   }

//   $rqty=$remainingqty-$stock->qty;
  
// Item::where('product_id','=',$stock->id)->update([
    
// 'web_stock'=>$rqty

// ]);

// }
// $or_id=$input['order_id'];
// DB::table('orders')->where('order_id','=',$or_id)->update([

// 'order_status_id'=>1,
// 'razorpay_payment_id'=>$input['razorpay_payment_id']
// ]);
        Session::put('success', 'Payment successful');
        Cart::destroy();
       return  view('front-end.tankyou');
        } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
public function sell_on_itcity(){


  return  view('sell-on-itcity');
}

public function sell(Request $request){
    
    $this->validate($request,[

'name'=>'required',
'comp_name'=>'required',
'email'=>'required',
'mobile' => 'required',
'products' => 'required'
]);

  DB::table('sell_on_itcity')->insert([

      'sell_name'=>$request->name,
      'sell_mobile'=>$request->mobile,
      'sell_product'=>$request->products,
      'sell_email'=>$request->email,
      'sell_company_name'=>$request->comp_name

  ]);
  
  
   $data = array('name'=>"Itcity",'to_mail'=>$request->input('email'),'user_name'=>$request->input('name'));
 
      Mail::send('mail-templates/comapny-reply', $data, function($message) use ($data){

         $message->to($data['to_mail'],$data['name'])->subject
            ('itcityonlinestore.com');
         $message->from('info@itcityonlinestore.com','IT City Online Store');

      });

 $request->session()->flash('sell_succ','succ');
 return back(); 


}
public function forgot_password(Request $request)
        {
              return  view('front-end.forgot-password');
        }
public function forgot_password_post(Request $request)
        {
          try {
             $email=$request->name;
            $user=DB::table('customer_registration')->where('customer_email','=',$email)->get();

if($user->isEmpty()){

        $request->session()->flash('false_title','Sorry!');
        $request->session()->flash('false','This email address is not available for use as an tackletips Id.  Please try again or sign in using your existing tackletips Id');
        return back();

}else{

   foreach ($user as $users) {
    $pass=$users->password;
    $name= Crypt::decryptString($pass);
   

  }
 
  $data = array('name'=>"Tackletips",'to_mail'=>$email,'user_name'=>$name);
 

      Mail::send('mail-templates/password-request', $data, function($message) use ($data){

         $message->to('support@tackletips.in', 'Tackletips')->subject
            ('Tackletips - Password ');
         $message->from('support@tackletips.in','Tackletips');

      });
       return  view('front-end.forgot-password-send');
  
}
 return back();
          
        } catch (\Exception $e) {
       
        return $e->getMessage();
      }
             
        }
        
public function contact_us_mail(Request $request)
        {
            $data['name']       =   $request->input('name');
            $data['email']      =   $request->input('email');
            $data['mobile']     =   $request->input('mobile');
            $data['msg']        =   $request->input('message');

            Mail::send('mail-templates.contact-us', $data, function ($message) use ($data) {
             $message->from($data['email'], 'Itcityonlinestore.com');
             $message->sender($data['email'], $name = 'itcityonlinestore.com');
             $message->subject('ITCITY - User Contact Mail');
             $message->to('info@itcityonlinestore.com', $name = 'It City Online Store');
         });
             $request->session()->flash('done_title','Succesfully Sent.');
      $request->session()->flash('done','Itcity Team Will Respond soon.');
         return back();
        }
        
        





}
