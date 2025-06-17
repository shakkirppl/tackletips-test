<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CCAvenueController extends Controller
{
    public function handleCallback(Request $request)
    {
        // Validate the callback request from CCAvenue
        // Check if the transaction is successful

        // Example validation, make sure to customize based on CCAvenue response
        if ($request->input('order_status') === 'Success') {
            // Handle successful payment
            $orderId = $request->input('order_id');
            // Perform your logic here, e.g., update order status in the database
            // Redirect the user or display a success message
            return redirect()->route('success-payment');
        } else {
            // Handle unsuccessful payment
            // You may redirect the user to a failure page
            return redirect()->route('failure-payment');
        }
    }
}