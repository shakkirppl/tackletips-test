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
                     <div class="order-details">
                        <table class="table table-responsive table-review-order">
                           <thead>
                              <tr>
                                 <th class="product-name">Product</th>
                                 <th class="product-total">Total</th>
                              </tr>
                              @foreach($cart as $item) 
                              <tr>
                                 <th>{{$item->name}}</th>
                                 <th>₹ {{ number_format($item->price * $item->quantity, 2) }}</th>
                              </tr>
                              @endforeach
                           </thead>
                           <tbody>
                           </tbody>
                           <tfoot>
                              <tr>
                                 <th>Subtotal</th>
                                 <td>
                                    <p class="price">₹{{Cart::getTotal()}}</p>
                                 </td>
                              </tr>
                              <tr>
                                 <input type="hidden" name="deliveryCharge" id="deliveryCharge"
                                    value="{{$deliveryCharge}}">
                                 <th>Delivery Charge</th>
                                 <td>
                                    <label> <span id="deli_charge">{{$deliveryCharge}}</span> </label>
                                 </td>
                              </tr>
                              @if($rodDeliveryCharge > 0)
                              <tr>
                                 <input type="hidden" name="rod_packing_charge" id="rod_packing_charge"
                                    value="{{$rodDeliveryCharge}}">
                                 <th>Rod Delivery Charge</th>
                                 <td>
                                    <label> <span id="deli_charge">{{$rodDeliveryCharge}}</span> </label>
                                 </td>
                              </tr>
                              @endif
                              <tr>
                                 <th>Total</th>
                                 <td><input type="hidden" name="total" id="total" value="0">
                                    <span class="price" id="grand_total">₹{{number_format(Cart::getTotal()+$deliveryCharge+$rodDeliveryCharge,2)}}</span>
                                    <input type="hidden" name="grand_order_total" id="grand_order_total"
                                       value="0">
                                 </td>
                              </tr>
                           </tfoot>
                        </table>
                        <div class="checkout-btn-continue-main">
                           <a href="{{url('/')}}" class="checkout-btn-continue">
                           <button class="button-58 p" role="button">CONTINUE SHOPPING</button>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="padding-top"></div>
            <form class="checkoutform" action="{{url('shop-complete')}}" method="get">
               {{csrf_field()}}
               <div class="row">
                  <div class="col-md-6 col-sm-6 col-xs-12">
                     <div class="shipping-address">
                        <div class=" ">
                           <h3 class="small-title">Shipping Address</h3>
                        </div>
            <form class="checkoutform" action="">
            <div class="radio-group shipping-address-save">
            @if(!empty($customerAddress) && count($customerAddress) > 0)
            @foreach($customerAddress as $address)
            <label class="address-label">
            <span class="address-details">
            <p class="name">{{$address->customer_name}} </p>
            <p class="address">
            {{$address->customer_address}},  {{$address->customer_city}},
            @foreach($address->state as $stat) {{$stat->name}} @endforeach,
            {{$address->customer_pincode}}, {{$address->customer_mobile}}
            </p>
            </span>
            <input type="radio" name="address" id="address{{$address->id}}" value="{{$address->id}}" 
            {{$address->deafult == 1 ? 'checked' : ''}}>
            </label>
            @endforeach
            @endif
            </div>
            </div>
            </form>
            </div>
            <div class="col-md-6">
            <div class="preffered-delivery-address">
            <h2 class="title-checkout">
            <i class="icon-credit-card"></i>
            Preferred Delivery Partner
            </h2>
            <div class="form-group form-group-top clearfix">
            <div class="radio">
            <label><input checked="" type="radio" id="any" name="courier_service"
               value="Any"><span>Any</span></label>
            </div>
            <div class="radio">
            <label><input type="radio" id="professional" name="courier_service"
               value="Professional"><span>Professional Courier</span></label>
            </div>
            <div class="radio">
            <label><input type="radio" id="delhivery" name="courier_service"
               value="Delhivery"><span>Delhivery services</span></label>
            </div>
            <div class="radio">
            <label><input type="radio" id="dtdc" name="courier_service" value="Dtdc"><span>Dtdc
            Courier Service(Our Preferred Partner) </span></label>
            </div>
            <div class="radio">
            <label><input type="radio" id="speedpost" name="courier_service"
               value="SpeedPost"><span>Speed Post</span></label>
            </div>
            </div>
            <div class="grand-total-div card card--padding">
            <table class="table-total-checkout">
            <tbody>
            <tr>
            <th>GRAND TOTAL:</th>
            <td>₹{{number_format(Cart::getTotal()+$deliveryCharge+$rodDeliveryCharge,2)}}</td>
            </tr>
            </tbody>
            </table>
            <hr>
            <div class="proceed-to-checkout-main">
            <a href="sign-up.html" class="proceed-to-checkout">
            <button class="button-58 " role="button">PLACE ORDER NOW</button>
            </a>
            </div>
            </div>
            </div>
            </div>
            </div>
         </div>
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