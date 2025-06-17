<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tackle Tips</title>
      <link rel="shortcut icon" href="{{URL::to('/')}}/front-end/images/home/favicon.png">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/main.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/main-second.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/style.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/product-detail-view.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/swiper-bundle-min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/aos.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
   </head>
   <body>
      @include('front-end.include.header')
      <section class="product-detail-section">
         <div class="container">
            <div class="row">
               <div class="product-detail-header">
                  <h1>Checkout</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class=" ">
                     <h3 class="small-title">Your Order</h3>
                  </div>
                  <div class="row">
                  </div>
               </div>
            </div>
            <form method="POST" class="your-order-details" name="customerData" action="ccavRequestHandler.php">
               @csrf
               <input type="hidden" name="_token" value="{{ csrf_token() }}" />
               <!--<table width="40%" height="100" border='1' align="center"><caption><font size="4" color="blue"></font></caption></table>-->
               <table width="100%" height="100" border='1' align="center">
                  <input type="hidden" name="tid" id="tid" readonly />
                  <input type="hidden" name="merchant_id" value="2246391" readonly/>
                  <input type="hidden" name="order_id" value="{{$orderNumber}}"/>
                  <input type="hidden" name="amount" value="{{$net_total}}"/>
                  <input type="hidden" name="currency" value="INR"/>
                  <input type="hidden" name="redirect_url" value="https://tackletips.in/ccavResponseHandler.php"/>
                  <input type="hidden" name="cancel_url" value="https://tackletips.in/ccavResponseHandler.php"/>
                  <!--<input type="hidden" name="redirect_url" value="https://tackletips.in/ccavenue/callback"/>-->
                  <!--<input type="hidden" name="cancel_url" value="https://tackletips.in/ccavenue/callback"/>-->
                  <input type="hidden" name="language" value="EN"/></td>
                  <tr>
                     <td style="font-weight:bold;">Billing Name	:</td>
                     <td><input style="border:none;" type="text" name="billing_name" value="{{$selectAddress->customer_name}}"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;"> Billing Address	:</td>
                     <td><input style="border:none;" type="text" name="billing_address" value="{{$selectAddress->customer_address}}"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing City	:</td>
                     <td><input  style="border:none;" type="text" name="billing_city" value="{{$selectAddress->customer_city}}"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing State	:</td>
                     <td><input style="border:none;" type="text" name="billing_state" value="KL"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing Zip	:</td>
                     <td><input style="border:none;" type="text" name="billing_zip" value="{{$selectAddress->customer_pincode}}"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing Country	:</td>
                     <td><input style="border:none;"  type="text" name="billing_country" value="India"/></td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing Tel	:</td>
                     <td><input type="text" style="border:none;"  name="billing_tel" id="billing_tel" value="{{$selectAddress->customer_mobile}}" required />
                        <span id="errmsg" style="color:red;">
                     </td>
                  </tr>
                  <tr>
                     <td style="font-weight:bold;">Billing Email	:</td>
                     <td><input style="border:none;" type="text" name="billing_email" value="{{$email}}"/></td>
                  </tr>
                  <tr>
                     <td id="processing_fee" colspan="2">
                     </td>
                  </tr>
               </table>
               <tr>
                  <td>
                     <input  class="valid-button button-58 " type="submit" value="CHECKOUT" onclick="ValidateMobileNumber()">
                  </td>
               </tr>
         </div>
         </tr>
         </table>
         </form>
         </div>
         <div class="padding-top"></div>
      </section>
      @include('front-end.include.footar')
      <script>
         AOS.init();
      </script>
      <script src="{{URL::to('/')}}/front-end/js/swiper.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/jquery.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/aos.js"></script>
      <script>
         window.onscroll = function () { myFunction() };
         
         var header = document.getElementById("myHeader");
         var sticky = header.offsetTop;
         
         function myFunction() {
             if (window.pageYOffset > sticky) {
                 header.classList.add("sticky");
         
             } else {
                 header.classList.remove("sticky");
             }
         }
      </script>
   </body>
</html>