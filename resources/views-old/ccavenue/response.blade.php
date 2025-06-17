<!DOCTYPE html>
<html lang="en">
  
@if($response['order_status'] == 'Success')
    <h2>Payment Successful!</h2>
    <p>Order ID: {{ $response['order_id'] }}</p>
    <p>Amount: {{ $response['amount'] }}</p>
@else
    <h2>Payment Failed</h2>
    <p>Failure Reason: {{ $response['failure_message'] }}</p>
@endif
</html>