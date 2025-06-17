<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Tax;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\CustomerAddress;
use App\Models\CustomerRegistration;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
class AnotherTransactionController extends Controller
{
    //
  public function initiatePayment(Request $request)
    {
        // Get required data from request
        $order_id = $request->input('order_id', time()); // Generate unique order_id if not provided
        $amount = $request->input('amount', '1.00');
        $currency = 'INR';
        $language = "EN";

        // Fetch from .env
        $merchant_id = '2246391';
        $access_code = 'ATUA44KC80CL79AULC';
        // $access_code = 'AVUA44KC80CL79AULC';
        // $working_key = 'B8315ACA1E2104E9FCE7D44F73E307B8';
        $working_key = 'B8315ACA1E2104E9FCE7D44F73E307B8';

        $redirect_url = 'https://www.tackletips.in/payment-response'; // Use named routes
        $cancel_url = 'https://www.tackletips.in/payment-cancel';

        // Prepare plain text string
        $plain_text = "merchant_id={$merchant_id}&order_id={$order_id}&redirect_url={$redirect_url}&cancel_url={$cancel_url}&amount={$amount}&currency={$currency}&language={$language}";

        // Encrypt using CCAvenue encryption function
        $enc_val = $this->encryptCCAvenue($plain_text, $working_key);

        // Return response to mobile app or frontend
        return response()->json([
            "order_id" => $order_id,
            "access_code" => $access_code,
            "redirect_url" => $redirect_url,
            "cancel_url" => $cancel_url,
            "enc_val" => $enc_val,
        ]);
    }

    // CCAvenue encryption function
  function encryptCCAvenue($plainText, $key)
{
    $key = hex2bin(md5($key));
    $iv = pack("C*", ...array_fill(0, 16, 0));
    $encryptedText = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $iv);
    return bin2hex($encryptedText);
}

 public function user_updation(Request $request)
    {
  
        try {
            $ustomers=CustomerRegistration::whereBetween('id',[1,100])
            ->get();
            foreach($ustomers as $ustomer)
            {
                $exuser=User::where('email',$ustomer->customer_email)->first();
                if(!$exuser){               
                $pass = Crypt::decryptString($ustomer->password);
                 $user = User::create([
            'name' => $ustomer->customer_name,
            'email' => $ustomer->customer_email,
            'password' => Hash::make($pass),
            'phone' => $ustomer->customer_mobile,
        ]);
       
        
          $user = User::find($user->id);
        $user->customer_id=$ustomer->customer_id;
        $user->save();
        
       $cust = CustomerRegistration::where('id', $ustomer->id)->first();

if ($cust) {
    $cust->user_id = $user->id;
    $cust->de_pas = $pass;
    $cust->save();
}
                
        
            $customer=new CustomerAddress;
            $customer->user_id=$user->id;
            $customer->customer_name=$ustomer->customer_name;
            $customer->customer_mobile=$ustomer->customer_mobile;
            $customer->customer_pincode=$ustomer->customer_pincode;
            $customer->customer_city=$ustomer->customer_city;
            $customer->customer_dist=$ustomer->customer_dist;
            $customer->customer_state=$ustomer->customer_state;
            $customer->customer_address=$ustomer->pincode;
            $customer->remarks='';
            $customer->deafult=1;
            $customer->save();
                }
            }
            return 'ok';
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    public function order_updation(Request $request)
    {
  
        try {
            
    $orders=  DB::table('orders')
    ->select('orders.*')
    ->orderBy('orders.id', 'desc')
    ->whereBetween('id',[1,100])
    ->get();
    foreach($orders as $order)
    {
        $pu_det = DB::table('purchase') ->where('purchase_id','=',$order->purchase_id)
         ->first();
          $order_history = $pu_det->products;
        $exp_product = json_decode($order_history);
        $userId=0;
        foreach ($exp_product as $exp_produ)
        {
              $product=Item::where('product_id','=',$exp_produ->id)->first();

                          $tax=Tax::find($product->tax_id);
                  
                          $qty=$exp_produ->qty;
                          $mrp=$exp_produ->price;                
                          $percentage=$tax->percentage+100;
                          $tax_rate=$mrp/$percentage*100;
                            
                          $rate=$mrp/$percentage*100;
                          $taxable_rate=$tax_rate;
                          $mrp_rate=$rate;
                          $tax_rate=$mrp-$tax_rate;
                          
                           $orderDetails=new OrderDetails;
                          $orderDetails->product_id=$product->id;
                          $orderDetails->orders_id=$order->order_id;
                          $orderDetails->customer_id=$order->customer_id;
                          $orderDetails->user_id=$userId;
                          $orderDetails->quantity=$qty;
                          $orderDetails->price=$mrp;
                          $orderDetails->rate=$mrp_rate;
                          $orderDetails->taxable=$qty*$taxable_rate;
                          $orderDetails->tax_amt=$qty*$tax_rate;
                          $orderDetails->total_amount=$qty*$mrp;
                          $orderDetails->shipping_charge=0;
                          $orderDetails->status=0;
                          $orderDetails->save();
        }
        
        
    }
    return 'complete';
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    
    public function index(Request $request)
    {
  
        try {
            
            
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    
    
      public function success_payment(Request $request)
    {
       try {
         
         return view('front-end.tankyou');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }
    
         public function failure_payment(Request $request)
    {
       try {
         
         return view('front-end.failure');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    } 
    
        public function fish_report_new(Request $request)
    {
       try {
         
         return view('front-end.post');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }
        public function add_new_fish_report(Request $request){
    
   try {   
    $data = request()->validate([
            'angler_name' => 'required',
            'place' => 'required',
            'image' => 'required'
         
        ]);
        $photo = $request->file('image'); 
        $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$photo->getClientOriginalExtension();

        $destinationPath = 'uploads/fishreports';
        $thumb_img = Image::make($photo->getRealPath())->resize(600,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
FishReports::insert([

'angler_name'=>$request->input('angler_name'),
'tackle_used'=>$request->input('tackle_used'),
'fish_name'=>$request->input('fish_name'),
'place'=>$request->input('place'),
'date'=>$request->input('date'),
'weight'=>$request->input('weight'),
'image'=>$storyimagename
    ]);

 $request->session()->flash('succ','Successfully Added New Fish Reports');
    return back();
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

   public function terms_and_conditions(Request $request){

 try {
     
     return view('front-end.terms-and-conditions');  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
  
   public function about_us(Request $request){

 try {
     
     return view('front-end.about-us');  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
       public function privacy_policy(Request $request){

 try {
     
     return view('front-end.privacy-policy');  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
  
       public function refund_cancellation_policy(Request $request){

 try {
     
     return view('front-end.refund-cancellation-policy');  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
  
       public function shipping_policy(Request $request){

 try {
     
     return view('front-end.shipping-policy');  
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
  }
    

    
    


    
}
