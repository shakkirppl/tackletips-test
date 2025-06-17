<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Helper\CCAvenueHelper;


class CCAvenueNewController extends Controller
{
    //
    protected $merchantId = "2246391";
    protected $accessCode = "AVUA44KC80CL79AULC";
    protected $workingKey = "B8315ACA1E2104E9FCE7D44F73E307B8";
    protected $redirectUrl = "https://www.tackletips.in/ccavenue-response";
    public function pay(Request $request)
    {
        $orderId = 'ORD' . time(); // Unique order ID

        $data = [
            'merchant_id' => $this->merchantId,
            'order_id' => $orderId,
            'amount' => '1.00', // Change dynamically
            'currency' => 'INR',
            'redirect_url' => $this->redirectUrl,
            'cancel_url' => $this->redirectUrl,
            'language' => 'EN',
            'billing_name' => 'John Doe',
            'billing_email' => 'john@example.com',
            'billing_tel' => '9876543210',
            'billing_address' => '123 Street, City',
            'billing_city' => 'Mumbai',
            'billing_state' => 'MH',
            'billing_zip' => '400001',
            'billing_country' => 'India',
        ];

        // Convert array to query string
        $queryString = http_build_query($data);

        // Encrypt data
        $encryptedData = CCAvenueHelper::encrypt($queryString, $this->workingKey);

        // Redirect to CCAvenue
        return view('front-end.ccavenue.pay', [
            'access_code' => $this->accessCode,
            'enc_request' => $encryptedData
        ]);
    }

    // Handle Response from CCAvenue
    public function response(Request $request)
    {
        $encryptedResponse = $request->input('encResp');
        $decryptedResponse = CCAvenueHelper::decrypt($encryptedResponse, $this->workingKey);

        parse_str($decryptedResponse, $responseArray);

        if ($responseArray['order_status'] == "Success") {
            return "Payment Successful!";
        } else {
            return "Payment Failed!";
        }
    }
}
