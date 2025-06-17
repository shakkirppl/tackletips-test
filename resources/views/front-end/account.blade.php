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
                  <h1>MY CART ({{$cartItems->count()}})</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="cart-detail-main-padding">
               @foreach($cartItems as $item)
               <div class="row mb-4">
                  <div class="col-md-6 col-4">
                     <div class="cart-detail-img">
                        <a class="image" href="{{ url('product-view/'.$item->product_slug) }}">
                        <img src="{{ url('uploads/product/thumb_images/'.$item->attributes->image) }}" alt="">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6 col-8">
                     <div class="cart-product-details">
                        <div class="cart-head-one">
                           <h1>{{$item->name}}</h1>
                        </div>
                        <div class="cart-head-three">
                           <h1> ₹ {{ number_format($item->price, 2) }}</h1>
                        </div>
                     </div>
                     <div class="cart-order-product-details-price">
                        <div class="cart-price-one">
                           <h1>{{ $item->quantity }}</h1>
                        </div>
                        <div class="cart-price-two">
                           <h1> ₹ {{ number_format($item->price * $item->quantity, 2) }}</h1>
                        </div>
                        <div class="cart-remove-button">
                           <a class="btn-close" href="{{ url('remove-cart/'.$item->rowId) }}">
                           Remove
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <hr>
               @endforeach    
               <div class="guest-address-main">
                  <div class="cart-details-payment-head-list">
                     <div class="row">
                        <div class="col-md-6 col-6">
                           <div class="cart-details-payment-head">
                              <h1 style="font-weight: 600;">Total Payble : </h1>
                           </div>
                        </div>
                        <div class="col-md-6 col-6">
                           <div class="cart-details-payment-price">
                              <h1 style="font-weight: 600;">{{Cart::getTotal()}}</h1>
                           </div>
                        </div>
                     </div>
                  </div>
                  <hr>
                  <div class="row">
                     <div class="col-md-12 col-12">
                        <p class="shipping-notice">cart description</p>
                     </div>
                  </div>
               </div>
            </div>
            <div class="product-main-div">
               <div class="row">
                  <div class="col-md-12">
                     <div class="sub-buttons">
                        <div class="row">
                           <div class="col-md-6 col-6">
                              <div class="cart-actions">
                                <a href="{{ url('user-login?redirect=checkout') }}">
                    <div class="cart-options-head">
                        <p class="account-head">Have An Account</p>
                    </div>
                    <button class="button-58 accounts-login">Login</button>
  </a>
                              </div>
                           </div>
                           <div class="col-md-6 col-6">
                              <div class="cart-actions">
                                 <a href="{{ url('user-register?redirect=checkout') }}">
                    <div class="cart-options-head">
                        <p class="account-head">New to Tackletips</p>
                    </div>
                    <button class="button-58 new-signup">Signup</button>
                </a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
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
   </body>
</html>