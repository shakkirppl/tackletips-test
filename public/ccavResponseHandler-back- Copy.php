<?php include('Crypto.php')?>
<?php

	error_reporting(0);
	
	$workingKey='B8315ACA1E2104E9FCE7D44F73E307B8';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	echo "<center>";
	
$servername = "localhost";
$username = "root";
$password = "tack@azd";
$dbname = "tackletips_tackle";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}



	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}

	if($order_status==="Success")
	{
	   
		$message= "<br>Thank you for shopping with us. Your credit card has been charged and your transaction is successful. We will be shipping your order to you soon.";
		
			$result = mysqli_query($conn, "SELECT MAX(order_id) AS last_id FROM orders");
            $row = mysqli_fetch_array($result);
            $last_id = $row['last_id'];

	    	$sql = "UPDATE orders SET paid=1 WHERE order_id='$last_id'";
	    	

            if ($conn->query($sql) === TRUE) {

            } else {
             echo "Error updating record: " . $conn->error;
            }
            
              $query = "SELECT * FROM goods_out_details_online WHERE order_prime_id='$last_id';";
   $result = $conn->query($query);
   
    if ($result->num_rows > 0) 
    {
       
  
        // OUTPUT DATA OF EACH ROW

        while($row = $result->fetch_assoc())
        {
            $item_id= $row["item_id"];

            $out_qty= $row["quantity"];
            $price= $row["mrp"];
            $date=date('Y-m-d');
            $o_id=$row["order_id"];
            
            $sql1 = "INSERT INTO stock_transations (date, item_id, in_qty, out_qty, price, transaction_id, transaction_type, user_id)
VALUES ($date, $item_id, 0,$out_qty,$price,'$o_id','SalesOnline',0)";

            if ($conn->query($sql1) === TRUE) {

            } else {
             echo "Error updating record: " . $conn->error;
            }

        }

header("Location: https://tackletips.in/success-payment");
exit;
//   echo $order_history;

    } 
    else {
        echo "0 results";
    }
		
	}
	else if($order_status==="Aborted")
	{
		$message= "<br>Thank you for shopping with us.We will keep you posted regarding the status of your order through e-mail";
	header("Location: https://tackletips.in/failure-payment");
exit;
	}
	else if($order_status==="Failure")
	{
		$message= "<br>Thank you for shopping with us.However,the transaction has been declined.";
		header("Location: https://tackletips.in/failure-payment");
exit;
    }
	else
	{
	     	
  
   $conn->close();
  

           	$message= "<br>Security Error. Illegal access ggdetected";
	}

	echo "<br><br>";

// 	echo "<table cellspacing=4 cellpadding=4>";
// 	for($i = 0; $i < $dataSize; $i++) 
// 	{
// 		$information=explode('=',$decryptValues[$i]);
// 	    	echo '<tr><td>'.$information[0].'</td><td>'.urldecode($information[1]).'</td></tr>';
// 	}

// 	echo "</table><br>";
	echo "</center>";
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">

body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
img { -ms-interpolation-mode: bicubic; }

img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
table { border-collapse: collapse !important; }
body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }


a[x-apple-data-detectors] {
    color: inherit !important;
    text-decoration: none !important;
    font-size: inherit !important;
    font-family: inherit !important;
    font-weight: inherit !important;
    line-height: inherit !important;
}

@media screen and (max-width: 480px) {
    .mobile-hide {
        display: none !important;
    }
    .mobile-center {
        text-align: center !important;
    }
}
div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
<body style="margin: 0 !important; padding: 0 !important; background-color: #eeeeee;" bgcolor="#eeeeee">


<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: Open Sans, Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">

</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <tr>
        <td align="center" style="background-color: #eeeeee;" bgcolor="#eeeeee">
        
        <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
            <tr>
                <td align="center" valign="top" style="font-size:0; padding: 35px;" bgcolor="#F44336">
               
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                            <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 36px; font-weight: 800; line-height: 48px;" class="mobile-center">
                                <h1 style="font-size: 36px; font-weight: 800; margin: 0; color: #ffffff;">Tackle Tips</h1>
                            </td>
                        </tr>
                    </table>
                </div>
                
                <div style="display:inline-block; max-width:50%; min-width:100px; vertical-align:top; width:100%;" class="mobile-hide">
                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">
                        <tr>
                            <td align="right" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;">
                                <table cellspacing="0" cellpadding="0" border="0" align="right">
                                    <tr>
                                        <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400;">
                                            <p style="font-size: 18px; font-weight: 400; margin: 0; color: #ffffff;"><a href="https://tackletips.in" target="_blank" style="color: #ffffff; text-decoration: none;">Shop &nbsp;</a></p>
                                        </td>
                                        <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 24px;">
                                            <a href="https://tackletips.in" target="_blank" style="color: #ffffff; text-decoration: none;"><img src="https://img.icons8.com/color/48/000000/small-business.png" width="27" height="23" style="display: block; border: 0px;"/></a>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                </div>
              
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px 35px 20px 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px;" /><br>
                            <h2 style="font-size: 30px; font-weight: 800; line-height: 36px; color: #333333; margin: 0;">
                               <?php echo $message ?>
                            </h2>
                        </td>
                    </tr>
                    <!--<tr>-->
                    <!--    <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 10px;">-->
                    <!--        <p style="font-size: 16px; font-weight: 400; line-height: 24px; color: #777777;">-->
                    <!--            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium iste ipsa numquam odio dolores, nam.-->
                    <!--        </p>-->
                    <!--    </td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--    <td align="left" style="padding-top: 20px;">-->
                    <!--        <table cellspacing="0" cellpadding="0" border="0" width="100%">-->
                    <!--            <tr>-->
                    <!--                <td width="75%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">-->
                    <!--                    Order Confirmation #-->
                    <!--                </td>-->
                    <!--                <td width="25%" align="left" bgcolor="#eeeeee" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;">-->
                    <!--                    2345678-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--            <tr>-->
                    <!--                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">-->
                    <!--                    Purchased Item (1)-->
                    <!--                </td>-->
                    <!--                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;">-->
                    <!--                    $100.00-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--            <tr>-->
                    <!--                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">-->
                    <!--                    Shipping + Handling-->
                    <!--                </td>-->
                    <!--                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">-->
                    <!--                    $10.00-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--            <tr>-->
                    <!--                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">-->
                    <!--                    Sales Tax-->
                    <!--                </td>-->
                    <!--                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;">-->
                    <!--                    $5.00-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--        </table>-->
                    <!--    </td>-->
                    <!--</tr>-->
                    <!--<tr>-->
                    <!--    <td align="left" style="padding-top: 20px;">-->
                    <!--        <table cellspacing="0" cellpadding="0" border="0" width="100%">-->
                    <!--            <tr>-->
                    <!--                <td width="75%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">-->
                    <!--                    TOTAL-->
                    <!--                </td>-->
                    <!--                <td width="25%" align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px; border-top: 3px solid #eeeeee; border-bottom: 3px solid #eeeeee;">-->
                    <!--                    $115.00-->
                    <!--                </td>-->
                    <!--            </tr>-->
                    <!--        </table>-->
                    <!--    </td>-->
                    <!--</tr>-->
                </table>
                
                </td>
            </tr>
            <!-- <tr>-->
            <!--    <td align="center" height="100%" valign="top" width="100%" style="padding: 0 35px 35px 35px; background-color: #ffffff;" bgcolor="#ffffff">-->
            <!--    <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:660px;">-->
            <!--        <tr>-->
            <!--            <td align="center" valign="top" style="font-size:0;">-->
            <!--                <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">-->

            <!--                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">-->
            <!--                        <tr>-->
            <!--                            <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">-->
            <!--                                <p style="font-weight: 800;">Delivery Address</p>-->
            <!--                                <p>675 Massachusetts Avenue<br>11th Floor<br>Cambridge, MA 02139</p>-->

            <!--                            </td>-->
            <!--                        </tr>-->
            <!--                    </table>-->
            <!--                </div>-->
            <!--                <div style="display:inline-block; max-width:50%; min-width:240px; vertical-align:top; width:100%;">-->
            <!--                    <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:300px;">-->
            <!--                        <tr>-->
            <!--                            <td align="left" valign="top" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px;">-->
            <!--                                <p style="font-weight: 800;">Estimated Delivery Date</p>-->
            <!--                                <p>January 1st, 2016</p>-->
            <!--                            </td>-->
            <!--                        </tr>-->
            <!--                    </table>-->
            <!--                </div>-->
            <!--            </td>-->
            <!--        </tr>-->
            <!--    </table>-->
            <!--    </td>-->
            <!--</tr>-->
            <tr>
                <td align="center" style=" padding: 35px; background-color: #ff7361;" bgcolor="#1b9ba3">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding-top: 25px;">
                            <h2 style="font-size: 24px; font-weight: 800; line-height: 30px; color: #ffffff; margin: 0;">
                                <!--Get 30% off your next order.-->
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 25px 0 15px 0;">
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tr>
                                    <td align="center" style="border-radius: 5px;" bgcolor="#66b3b7">
                                      <a href="https://tackletips.in" target="_blank" style="font-size: 18px; font-family: Open Sans, Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; border-radius: 5px; background-color: #F44336; padding: 15px 30px; border: 1px solid #F44336; display: block;">Shop Again</a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
            <tr>
                <td align="center" style="padding: 35px; background-color: #ffffff;" bgcolor="#ffffff">
                <table align="center" border="0" cellpadding="0" cellspacing="0" width="100%" style="max-width:600px;">
                    <tr>
                        <td align="center">
                            <img src="https://tackletips.in/front-end/assets/img/logoone.png" width="37" height="37" style="display: block; border: 0px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;">
                            <p style="font-size: 14px; font-weight: 800; line-height: 18px; color: #333333;">
                               Tackle Tips Fishing Tackle Store<br>
                                1st Floor, 11/893-J,<br>Nadakavu,Tanur<br>Kerala-676302
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="left" style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px;">
                            <p style="font-size: 14px; font-weight: 400; line-height: 20px; color: #777777;">
                                <!--If you didn't create an account using this email address, please ignore this email or <a href="#" target="_blank" style="color: #777777;">unsusbscribe</a>.-->
                            </p>
                        </td>
                    </tr>
                </table>
                </td>
            </tr>
        </table>
        </td>
    </tr>
</table>
    
</body>
</html>