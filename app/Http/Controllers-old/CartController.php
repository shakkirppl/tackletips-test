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
use DB;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\App;
class CartController extends Controller
{
    //
    public function index(Request $request)
    {
  
        try {
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    
public function addcart(Request $request){

 try {
$product_id=$request->product_id;
$qty=$request->qty;

if (!is_numeric($qty) || floor($qty) != $qty || $qty < 1) {
    return response()->json(['error' => 'Quantity must be a whole number greater than 0'], 400);
}

$price=$request->price;
$size=$request->size;

$pro=Item::where('product_id','=',$product_id)->get();

foreach ($pro as $product) {
     $min_pur_qty=$product->min_pur_qty;
      $name=$product->name.$product->sub_name;
      $pro_prime_id=$product->id;
}

 $stock=StockTransactions::getcurrentstock($pro_prime_id);

if($stock>0){
Cart::add($product_id, $name, $qty, $price);
}
$cck=Cart::content();

$html="";

foreach ($cck as $ccks) {
 $rid= $ccks->rowId;
$img=Item::where('product_id','=',$ccks->id)->get();

foreach ($img as $img) {
     if($img->min_pur_qty=='1'){
    Cart::update($rid,'1');
}else{
    if($stock<$ccks->qty){ Cart::update($rid,$stock);}
}
    
}

}

$res=Cart::content();
foreach ($res as $res) {

$img=Item::where('product_id','=',$res->id)->get();

foreach ($img as $img) {

  $imgs=$img->product_image;
  

$html.='
            <div class="cart-entry">
                                                <a href="#" class="image">
                                                    <img src="'.url('uploads/product/single-product/'.$imgs).'" alt="">
                                                </a>
                                                <div class="content">
                                                    <a href="#" class="title">'.$res->name.'</a>
                                                    <p class="quantity">Quantity: '.$res->qty.'</p>
                                                    <span class="price">₹'.number_format($res->price, 3, '.', ',').'</span>
                                                </div>
                                                <div class="button-x">
                                              <i class="icon-close"></i>
                                                    
                                                </div>
                                            </div>
    ';

           
                    

}}
$htmtwol="";
$htmtwol.=' <div class="summary">
                                                <div class="subtotal">Sub Total</div>
                                                <div class="price-s">₹'.Cart::subtotal().'</div>
                                            </div>
                                            <div class="cart-buttons">
                                                <a href="'.url('my-cart').'" class="btn btn-border-2">View Cart</a>
                                                <a href="'.url('checkout').'" class="btn btn-common">Checkout</a>
                                                <div class="clear"></div>
                                            </div>
                                            
';
echo $html.$htmtwol;
 } catch (\Exception $e) {
    
    return $e->getMessage();
  }

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
if (!is_numeric($qty) || floor($qty) != $qty || $qty < 1) {
    return response()->json(['error' => 'Quantity must be a whole number greater than 0'], 400);
}
$rid=$request->input('rid');
$pid=$request->input('pid');

$pro=Item::where('product_id',$pid)->first();
 $stock=StockTransactions::getcurrentstock($pro->id);
 $max_limit=$pro->min_pur_qty;
if($max_limit=='1'){

Cart::update($rid,'1');
$request->session()->flash('succ_title','Cart Successfully Updated');
    return back();
}else{
    $incart=Cart::get($rid);
     if($stock<$incart->qty){ Cart::update($rid,$stock);}else{ Cart::update($rid,$qty);}
         
$request->session()->flash('succ_title','Cart Successfully Updated');
    return back();
    
}
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
 
  } 
    


    
}
