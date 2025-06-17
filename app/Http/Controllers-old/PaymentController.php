<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Orders;
use App\Helper\CCAvenueHelper;
class PaymentController extends Controller
{
    public function generatePaymentRequest(Request $request)
    {
           
        $merchant_id = "2246391"; // Your Merchant ID
        $access_code = "AVUA44KC80CL79AULC"; // Provided by CC Avenue
        $working_key = "B8315ACA1E2104E9FCE7D44F73E307B8"; // Provided by CC Avenue
        $redirect_url = "https://tackletips.in/ccavResponseHandler.php";
        $cancel_url = "https://tackletips.in/ccavResponseHandler.php";

        $order_id = $request->order_id;
        $amount = $request->amount;

        $billing_name = $request->billing_name;
        $billing_address = $request->billing_address;
        $billing_city = $request->billing_city;
        $billing_state = $request->billing_state;
        $billing_zip = $request->billing_zip;
        $billing_country = "India";
        $billing_tel = $request->billing_tel;
        $billing_email = $request->billing_email;

        // Prepare data string
        $data = "merchant_id=$merchant_id&order_id=$order_id&currency=INR&amount=$amount&redirect_url=$redirect_url&cancel_url=$cancel_url&language=EN";
        $data .= "&billing_name=$billing_name&billing_address=$billing_address&billing_city=$billing_city";
        $data .= "&billing_state=$billing_state&billing_zip=$billing_zip&billing_country=$billing_country";
        $data .= "&billing_tel=$billing_tel&billing_email=$billing_email";

        // Encrypt data
        $encrypted_data = CCAvenueHelper::encrypt($data, $working_key);

        return response()->json([
            'encRequest' => $encrypted_data,
            'access_code' => $access_code,
            'url' => 'https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction'
        ]);
    }

    public function initiatePayment(Request $request)
    {
        require_once app_path('Helpers/Crypto.php'); // Ensure Crypto.php is included

        $merchant_id = env('CCAVENUE_MERCHANT_ID');
        $access_code = env('CCAVENUE_ACCESS_CODE');
        $working_key = env('CCAVENUE_WORKING_KEY');

        $order_id = time();

        $postData = [
            'tid' => time(),
            'merchant_id' => $merchant_id,
            'order_id' => $order_id,
            'amount' => $request->amount,
            'currency' => 'INR',
            'redirect_url' => env('CCAVENUE_REDIRECT_URL'),
            'cancel_url' => env('CCAVENUE_CANCEL_URL'),
            'billing_name' => 'shakkir',
            'billing_email' => 'shakkir@gmail.com',
            'billing_tel' => '9633740021',
            'billing_address' => 'address',
            'billing_city' => 'kozhi',
            'billing_state' => 'Kerala',
            'billing_zip' => '673611',
            'billing_country' => 'India'
        ];

        $queryString = http_build_query($postData);
        $encrypted_data = ccavenue_encrypt($queryString, $working_key); // ✅ Correct function call

        return view('ccavenue.payment', compact('encrypted_data', 'access_code'));
    }

    public function paymentResponse(Request $request)
    {
        require_once app_path('Helpers/Crypto.php');

        $working_key = env('CCAVENUE_WORKING_KEY');
        $encResponse = $request->input('encResp');

        $decrypted_response = ccavenue_decrypt($encResponse, $working_key); // ✅ Correct function call
        parse_str($decrypted_response, $responseData);

        if ($responseData['order_status'] == 'Success') {
            // Save to Orders table
        } else {
            // Save to FailOrders table
        }

        return redirect('/thank-you');
    }
    private function encrypt($plainText, $key)
    {
        $iv = "1234567890123456";
        return openssl_encrypt($plainText, "AES-128-CBC", $key, 0, $iv);
    }

    private function decrypt($encryptedText, $key)
    {
        $iv = "1234567890123456";
        return openssl_decrypt($encryptedText, "AES-128-CBC", $key, 0, $iv);
    }
}

