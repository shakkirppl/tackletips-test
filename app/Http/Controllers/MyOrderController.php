<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Darryldecode\Cart\Facades\CartFacade as Cart;
use App\Models\CustomerAddress;
use App\Models\Purchase;
use App\Models\Orders;
use App\Models\OrderDetails;
use App\Models\User;
class MyOrderController extends Controller
{
    //
    public function my_order() 
    {
        try {
            if(Auth::user()){
                $data['customerAddress']=CustomerAddress::with('state')->where('user_id',Auth::user()->id)->get();
                $userId=Auth::user()->id;
                $User=User::find($userId);
                $data['orders'] = Orders::with([
                    'orderdetails.product', // Load product details for each order detail
                ])->where('customer_id',  $User->customer_id)->orderBy('id','DESC')->get();
                return view('front-end.my-account',$data);
            }
            else{
                return view('front-end.login');
            }
       
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function order_confirmation() 
    {
        try {
            if(Auth::user()){
                return view('front-end.order-confirmation');
            }
            else{
                return view('front-end.login');
            }
       
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    
}
