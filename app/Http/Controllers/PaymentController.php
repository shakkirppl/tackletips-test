<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Orders;
class PaymentController extends Controller
{
    public function initiatePayment(Request $request)
    {
        $merchant_id = config('services.ccavenue.merchant_id');
        $access_code = config('services.ccavenue.access_code');
        $working_key = config('services.ccavenue.working_key');
        $redirect_url = config('services.ccavenue.redirect_url');
        $cancel_url = config('services.ccavenue.cancel_url');

        $order_id = 'ORD' . time();
        $amount = 100;
        $currency = "INR";

        $data = [
            "merchant_id" => $merchant_id,
            "order_id" => $order_id,
            "currency" => $currency,
            "amount" => $amount,
            "redirect_url" => $redirect_url,
            "cancel_url" => $cancel_url
        ];

        $encrypted_data = $this->encrypt(http_build_query($data), $working_key);

        return view('ccavenue.payment', compact('encrypted_data', 'access_code'));
    }

    public function paymentResponse(Request $request)
    {
        $working_key = config('services.ccavenue.working_key');

        $decrypted_data = $this->decrypt($request->encResp, $working_key);
        parse_str($decrypted_data, $response);

        if ($response['order_status'] == 'Success') {
            Orders::create([
                'order_id' => $response['order_id'],
                'tracking_id' => $response['tracking_id'],
                'payment_mode' => $response['payment_mode'],
                'amount' => $response['amount'],
                'currency' => $response['currency'],
                'status' => 'Success',
            ]);
        } else {
            Orders::create([
                'order_id' => $response['order_id'],
                'failure_message' => $response['failure_message'] ?? 'Payment Failed',
                'amount' => $response['amount'],
                'currency' => $response['currency'],
            ]);
        }

        return view('ccavenue.response', ['response' => $response]);
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

