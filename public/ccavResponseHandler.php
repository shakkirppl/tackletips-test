<?php
include('Crypto.php');

error_reporting(0);

// CCAvenue working key
$workingKey = 'B8315ACA1E2104E9FCE7D44F73E307B8'; // Replace with your actual working key
$encResponse = $_POST["encResp"]; // Encrypted response from CCAvenue
$rcvdString = decrypt($encResponse, $workingKey); // Decrypt the response

$order_status = "";
$decryptValues = explode('&', $rcvdString);
$dataSize = sizeof($decryptValues);

$servername = "localhost";
$username = "root";
$password = "tack@azd";
$dbname = "tackletips_tackle";

// Create DB connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Extract order status
for ($i = 0; $i < $dataSize; $i++) {
    $information = explode('=', $decryptValues[$i]);
    if ($i == 3) $order_status = $information[1];
}

$message = "";

if ($order_status === "Success") {
    $message = "Thank you for shopping with us. Your transaction was successful.";

    $result = mysqli_query($conn, "SELECT MAX(order_id) AS last_id FROM orders");
    $row = mysqli_fetch_array($result);
    $last_id = $row['last_id'];

    // Update order as paid
    $conn->query("UPDATE orders SET paid = 1 WHERE order_id = '$last_id'");

    // Insert stock transaction records
    $query = "SELECT * FROM goods_out_details_online WHERE order_prime_id = '$last_id'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $date = date('Y-m-d');
        while ($row = $result->fetch_assoc()) {
            $item_id = $row["item_id"];
            $out_qty = $row["quantity"];
            $price = $row["mrp"];
            $o_id = $row["order_id"];

            $sql1 = "INSERT INTO stock_transations 
                (date, item_id, in_qty, out_qty, price, transaction_id, transaction_type, user_id)
                VALUES 
                ('$date', '$item_id', 0, '$out_qty', '$price', '$o_id', 'SalesOnline', 0)";

            $conn->query($sql1);
        }
    }

    // Redirect to success page
    header("Location: https://tackletips.in/success-payment");
    exit;

} elseif ($order_status === "Aborted" || $order_status === "Failure") {
    $message = "Your transaction was not completed.";
    header("Location: https://tackletips.in/failure-payment");
    exit;
} else {
    $message = "Security Error. Illegal access detected.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body { margin: 0; padding: 0; font-family: 'Open Sans', Helvetica, Arial, sans-serif; background: #eeeeee; }
        .container { max-width: 600px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 8px; box-shadow: 0 4px 12px rgba(0,0,0,0.1); text-align: center; }
        .header { background: #F44336; padding: 20px; color: #fff; border-radius: 8px 8px 0 0; }
        .message { margin-top: 20px; font-size: 18px; color: #333; }
        img { width: 100px; margin-top: 20px; }
        a.button { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #F44336; color: #fff; border-radius: 5px; text-decoration: none; }
        a.button:hover { background: #d32f2f; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Tackle Tips</h1>
        </div>
        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" alt="Success">
        <div class="message">
            <?php echo $message; ?>
        </div>
        <a class="button" href="https://tackletips.in">Back to Home</a>
    </div>
</body>
</html>
