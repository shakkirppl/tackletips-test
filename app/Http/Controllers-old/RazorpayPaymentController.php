<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Session;
use Exception;
use DB;
class RazorpayPaymentController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {    $data=DB::table('accounts_account')->first();  

        return view('razorpayView',['data' =>$data]);
    }
  
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function store(Request $request)
    {
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
          
        // Session::put('success', 'Payment successful');
        return view('front-end.tankyou');
    }
}
