<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\CustomerAddress;
use App\Models\State;
use App\Models\District;
use App\Models\Item;
use App\Models\Tax;
use App\Models\GoodsOutOnline;
use App\Models\GoodsOutDetailOnline;
use App\Models\Orders;
use App\Models\Purchase;
use App\Models\CustomerRegistration;
use App\Models\User;
use App\Models\OrderDetails;
use Carbon\Carbon;
class CheckoutController extends Controller
{
    //
    public function index()
    {
        try {
            $data['cartItems']= Cart::getContent();
            if(Auth::user()){
                 $customerAddressCount=CustomerAddress::where('user_id',Auth::user()->id)->count();
                if($customerAddressCount > 0)
                {
                    $data['deliveryCharge']=0;
                    $rodDeliveryCharge=0;
                    $data['cart']= Cart::getContent();
                    $data['customerAddress']=CustomerAddress::with('state')->where('user_id',Auth::user()->id)->get();
                    $defaultAddress=CustomerAddress::where('user_id',Auth::user()->id)->where('deafult',1)->first();
                    if($defaultAddress){
                        $delevery=State::where("id",$defaultAddress->customer_state)->first();
                        $data['deliveryCharge']=$delevery->delivery_charge ?? 0;
                    }
                    foreach ($data['cart'] as $cart){ 
                        $item=Item::where('id','=',$cart->id)->first();
                        if($item->category_id==2){
                            $rodDeliveryCharge=$rodDeliveryCharge+150;
                            }
                    }
                    $data['rodDeliveryCharge']=$rodDeliveryCharge;
                  
                    return view('front-end.checkout',$data);
                }
                else{
                    $data['state']=State::get();
                    $data['mode']='checkout';
                    
                 
                    return view('front-end.address-new',$data);
                }
            }
            else{
                return view('front-end.account',$data);
            }
        } catch (\Exception $e) {
            return $e->getMessage();
          }
       
        }
        
        public function shopComplete(Request $request)
        {
            // return $request->all();
            $request->validate([
                'address' => 'required|integer',
                'courier_service'=> 'required',
            ]);
            try {
                $data['cartItems']= Cart::getContent();
                $data['address']=$request->address;
                $selectAddress=CustomerAddress::find($request->address);
                $data['courier_service']=$request->courier_service;
                $data['selectAddress']=$selectAddress;
                $data['net_total']=100;
                return view('front-end.payment',$data);
        } catch (\Exception $e) {
           return $e->getMessage();
         }
         
      
       }
        public function shopCompleteWithoutPayment(Request $request)
        {
            // return $request->all();
            $request->validate([
                'address' => 'required|integer',
                'courier_service'=> 'required',
            ]);
            try {
                $data['cartItems']= Cart::getContent();
                 
                if(Auth::user()){
                    DB::transaction(function () use ($request,&$orders) {
                    $rod_packing_charge=0;
                    $delivery_charge=0;
                     $customerAddress=CustomerAddress::find($request->address);
                     $delevery=State::where("id",$customerAddress->customer_state)->first();
                     $delivery_charge=$delevery->delivery_charge;
                     $cartData=Cart::getContent();
                     $products=Cart::getContent();
                     foreach ($cartData as $cart){ 
                        $item=Item::where('id','=',$cart->id)->first();
                        if($item->category_id==2){
                            $rod_packing_charge=$rod_packing_charge+150;
                            }
                    }
                        $delivery_partner = $request->input('courier_service');
                        $subtotal = Cart::getTotal();
                        $mode = 'Website';
                        $totalAmount=Cart::getTotal()+$rod_packing_charge+$delivery_charge;
                        $userId=Auth::user()->id;
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
                        $purchase->products=$products;
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
                        $orders->paid=0;
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
                  
                        foreach ($cartData as $cart){ 
                          $product=Item::where('id','=',$cart->id)->first();

                          $tax=Tax::find($product->tax_id);
                  
                          $qty=$cart->quantity;
                          $mrp=$cart->price;                
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

                          $orderDetails=new OrderDetails;
                          $orderDetails->product_id=$product->id;
                          $orderDetails->orders_id=$orders->id;
                          $orderDetails->customer_id=$User->customer_id;
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
                           });
                $data['cartItems']= Cart::getContent();
                $userId=Auth::user()->id;
                $user=User::find($userId);
                $selectAddress=CustomerAddress::find($request->address);
                $data['courier_service']= $request->input('courier_service');
                $data['selectAddress']=$selectAddress;
                $data['net_total']=$orders->total_amnt;
                $data['orderNumber']=$orders->order_number;
                $data['email']=$user->email;
                return view('front-end.payment',$data);
                           Cart::clear();
                //  return redirect('order-confirmation/'.$orders->id)->with('success', 'Order saved successfully!');
                }
                else{
                    return view('front-end.account',$data);
                }
             } catch (\Exception $e) {
                return $e->getMessage();
              }
              
           
            }

            public function order_confirmation($id)
            {
                try {
                  
                    $data['orders']= Orders::find($id);
                    $data['cartItems']= Cart::getContent();
                    return view('front-end.order-confirmation',$data);
                } catch (\Exception $e) {
                    return $e->getMessage();
                  }
                  
               
            }
        
        
}
