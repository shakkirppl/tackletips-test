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
use App\Models\Tax;
use App\Models\OrderDetails;
use App\Models\User;
use App\Models\CustomerAddress;
use App\Models\CustomerRegistration;
use Illuminate\Support\Facades\Log; // ✅ correct import
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
    
//  public function user_updation(Request $request)
//     {
  
//         try {
//            CustomerRegistration::whereBetween('id', [1, 3000])
//             // ->whereNotNull('de_pas')
//             ->where('sync',0)
//             ->chunk(100, function ($customers) {
//             foreach($customers as $ustomer)
//             {
//                 $exuser=User::where('email',$ustomer->customer_email)->first();
//                 if(!$exuser){               
//                 $pass = Crypt::decryptString($ustomer->password);
//                 // $pass =$ustomer->de_pas;
//                  $user = User::create([
//             'name' => $ustomer->customer_name ?? $ustomer->customer_email,
//             'email' => $ustomer->customer_email ?? null,
//             'password' => Hash::make($pass),
//             'phone' => $ustomer->customer_mobile ?? null,
            
//         ]);
       
        
//           $user = User::find($user->id);
//         $user->customer_id=$ustomer->id;
//         $user->save();
        
//        $cust = CustomerRegistration::where('id', $ustomer->id)->first();

// if ($cust) {
//     $cust->user_id = $user->id;
//     $cust->de_pas = $pass;
//     $cust->sync =1;
//     $cust->save();
// }
                
//         if($ustomer->status === 1)
//         {
//             $customer=new CustomerAddress;
//             $customer->user_id=$user->id;
//             $customer->customer_name=$ustomer->customer_name ?? $ustomer->customer_email;
//             $customer->customer_mobile=$ustomer->customer_mobile;
//             $customer->customer_pincode=$ustomer->customer_pincode;
//             $customer->customer_city=$ustomer->shipping_city;
//             $customer->customer_dist=$ustomer->customer_dist;
//             $customer->customer_state=$ustomer->shipping_state;
//             $customer->customer_address=$ustomer->shipping_pin;
//             $customer->remarks='';
//             $customer->deafult=1;
//             $customer->save();
//         }
//                 }
//                   $cust = CustomerRegistration::where('id', $ustomer->id)->first();

// if ($cust) {
//     $cust->sync =1;
//     $cust->save();
// }
//             }
//             });
//             return 'ok';
//         } catch (\Exception $e) {
    
//     return $e->getMessage();
//   }
//     }


public function user_updation(Request $request)
{
    try {
        CustomerRegistration::whereBetween('id', [1, 3000])
            ->where('sync', 0)
            ->chunk(100, function ($customers) {
                foreach ($customers as $ustomer) {

                    try {
                        // Skip if user already exists
                        $exuser = User::where('email', $ustomer->customer_email)->first();
                        if ($exuser) {
                             $ustomer->sync    = 1;
                             $ustomer->save();
                             return 'exsit'; 
                            \Log::channel('daily')->warning("Skipped: User already exists - Customer ID: {$ustomer->id}, Email: {$ustomer->customer_email}");
                            return;
                        }

                        // Decrypt password
                        try {
                            $pass = Crypt::decryptString($ustomer->password);
                        } catch (\Exception $e) {
                             return 'error'; 
                            \Log::channel('daily')->error("Decryption failed for Customer ID: {$ustomer->id}, Error: " . $e->getMessage());
                            return;
                        }

                        // Create new user
                        $user = User::create([
                            'name'     => $ustomer->customer_name ?? $ustomer->customer_email,
                            'email'    => $ustomer->customer_email ?? null,
                            'password' => Hash::make($pass),
                            'phone'    => $ustomer->customer_mobile ?? null,
                        ]);

                        // Update user with customer ID
                        $user->customer_id = $ustomer->id;
                        $user->save();

                        // Update CustomerRegistration with user ID and password
                        $ustomer->user_id = $user->id;
                        $ustomer->de_pas  = $pass;
                        $ustomer->sync    = 1;
                        $ustomer->save();

                        // Add address if status is 1
                        if ($ustomer->status === 1) {
                            $customerAddress = new CustomerAddress;
                            $customerAddress->user_id           = $user->id;
                            $customerAddress->customer_name     = $ustomer->customer_name ?? $ustomer->customer_email;
                            $customerAddress->customer_mobile   = $ustomer->customer_mobile;
                            $customerAddress->customer_pincode  = $ustomer->customer_pincode;
                            $customerAddress->customer_city     = $ustomer->shipping_city;
                            $customerAddress->customer_dist     = $ustomer->customer_dist;
                            $customerAddress->customer_state    = $ustomer->shipping_state;
                            $customerAddress->customer_address  = $ustomer->shipping_pin;
                            $customerAddress->remarks           = '';
                            $customerAddress->deafult           = 1;
                            $customerAddress->save();
                        }
                    } catch (\Exception $ex) {
                        \Log::channel('daily')->error("Sync failed for Customer ID: {$ustomer->id}, Reason: " . $ex->getMessage());
                    }
                }
            });
// return $remaining = CustomerRegistration::where('sync', 0)->get();
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
    ->orderBy('orders.id', 'ASC')
    ->where('sync',0)
    ->whereBetween('id',[1,300])
    ->get();
    foreach($orders as $order)
    {
$pu_det = DB::table('purchase')->where('purchase_id', '=', $order->purchase_id)->first();

if (!$pu_det || !$pu_det->products) {
    \Log::warning("No purchase product data for purchase_id: " . $order->purchase_id);
    continue;
}

$exp_product = json_decode($pu_det->products);

if (!$exp_product || (!is_array($exp_product) && !is_object($exp_product))) {
    \Log::warning("Invalid or empty product JSON for purchase_id: " . $order->purchase_id);
    continue;
}

        $userId=0;
        foreach ($exp_product as $exp_produ)
        {
              $product=Item::select('id','tax_id','name','sub_name')->where('product_id','=',$exp_produ->id)->first();
 $product = Item::select('id', 'tax_id', 'name', 'sub_name')
                   ->where('product_id', '=', $exp_produ->id)
                   ->first();

    // Skip if product not found
    if (!$product) {
        \Log::warning("Product not found for product_id: " . $exp_produ->id);
        continue;
    }
 $qty = $exp_produ->qty;
    $mrp = $exp_produ->price;
    if (!$product->tax_id) {
        \Log::warning("Tax ID missing for product_id: " . $product->id);
        $percentage = 100;
        $tax_rate = 0;
    } else {
        $tax = Tax::find($product->tax_id);
        $percentage = ($tax && $tax->percentage) ? $tax->percentage + 100 : 100;
        $tax_rate = $mrp / $percentage * 100;
    }
                          // $tax=Tax::find($product->tax_id);
                  
                          // $qty=$exp_produ->qty;
                          // $mrp=$exp_produ->price;                
                          // $percentage=$tax->percentage+100;
                          // $tax_rate=$mrp/$percentage*100;
                            
                          $rate=$mrp/$percentage*100;
                          $taxable_rate=$tax_rate;
                          $mrp_rate=$rate;
                          $tax_rate=$mrp-$tax_rate;
                          
                           $orderDetails=new OrderDetails;
                          $orderDetails->product_id=$product->id;
                          $orderDetails->orders_id=$order->id;
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
        $orders=Orders::find($order->id);
        $orders->sync=1;
        $orders->save();
    }
    return 'complete';
        } catch (\Exception $e) {
    
    return $e->getMessage();
  }
    }
    
    


    
}
