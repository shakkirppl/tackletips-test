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
                  <h1>My Account</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-2">
                  <div class="ccount-order nav flex-column nav-pills me-3 a" id="v-pills-tab" role="tablist"
                     aria-orientation="vertical">
                     <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home"
                        aria-selected="true">Order</button>
                     <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile"
                        aria-selected="false">Address</button>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="tab-content" id="v-pills-tabContent">
                     <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel"
                        aria-labelledby="v-pills-home-tab" tabindex="0">
                        @foreach($orders as $order)
                        <div class="row">
                           <div class="col-md-12">
                              <div class="account-list">
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="product-title">
                                          <span class="date-head myaccount-span-head">Date:
                                          </span>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="product-title">
                                          <span class="date-head myaccount-span-head">
                                          {{$order->created_at}}</span>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="fix mb-10">
                                          <span class="price myaccount-span-head total-myaccount">Total:
                                          ₹ {{$order->created_at}}</span>
                                       </div>
                                       <div class="product-description mb-20">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="delivered">
                                          <div class="delivery-green"></div>
                                          <span class="price status myaccount-span-head">Processing </span>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="product-title">
                                          <span style="color:#000"
                                             class="price courier-head myaccount-span-head">Courier Number:{{$order->courier_number}}
                                          </span>
                                       </div>
                                    </div>
                                    <div class="col-md-9">
                                       <div class="product-title">
                                          <span class="date-head myaccount-span-head">
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="product-title">
                                          <span style="color:#000"
                                             class="price courier-head myaccount-span-head">Courier Remarks:{{$order->courier_remarks}}
                                          </span>
                                       </div>
                                    </div>
                                    <div class="col-md-9">
                                       <div class="product-title">
                                          <span class="date-head myaccount-span-head">
                                          </span>
                                       </div>
                                    </div>
                                 </div>
                                 <hr>
                                 @foreach ($order->orderdetails as $detail)
                                 <div class="row">
                                    <div class="col-md-3">
                                       <div class="account-img">
                                          <a href="#"><img
                                             src="{{ url('uploads/product/thumb_images/' . $detail->product->product_image) }}"
                                             alt=""></a>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="product-title">
                                          <h4 class="product-title"><a href="#">{{$detail->product->product_name}}</a>
                                          </h4>
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="fix mb-10">
                                          <span class="my-price">Qty:{{$detail->quantity}}</span>
                                       </div>
                                       <div class="product-description mb-20">
                                       </div>
                                    </div>
                                    <div class="col-md-3">
                                       <div class="delivered">
                                          <p class="my-price">₹ {{$detail->price}}</p>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                        @endforeach
                     </div>
                     <div class="tab-pane fade" id="v-pills-profile" role="tabpanel"
                        aria-labelledby="v-pills-profile-tab" tabindex="0">
                        <div class="order-main">
                           <div class="row order-main">
                              <div class="col-md-12">
                                 <div class="order-address-details">
                                    <div class="row">
                                       <div class="col-md-5 ">
                                          <a style="color:#56595F;" href="{{url('address.new')}}">
                                             <div class="address-box">
                                                <span class="plus-sign">+</span>
                                                <div class="add-address"></div>
                                             </div>
                                          </a>
                                       </div>
                                       @foreach($customerAddress as $address)
                                       <div class="col-md-5">
                                          <a style="color:#56595F;" href="">
                                             <div class="address-box-default">
                                                <h1>{{$address->customer_name}}</h1>
                                                <hr style="margin: 0px;">
                                                <div class="address-default">
                                                   <p class="name">{{$address->customer_address}}</p>
                                                   <p>{{$address->customer_city}}</p>
                                                   <p>{{$address->customer_pincode}}</p>
                                                   <p> @foreach($address->state as $state) {{$state->name}} @endforeach</p>
                                                   <P>{{$address->customer_mobile}}</P>
                                                </div>
                                                <div class="row">
                                                   <div class="col-md-12">
                                                      <div class="address-list-button"> 
                                          <a href="{{ url('address.edit', $address->id) }}"><button>Edit</button></a>
                                          <a href="{{ url('address.remove', $address->id) }}"><button>Remove</button></a>
                                          @if($address->deafult==1)<button>Default</button>   @endif
                                          @if($address->deafult==0)<a href="{{ url('address.set.default', $address->id) }}"><button>Set Default</button></a>   @endif
                                          </div>
                                          </div>
                                          </div>
                                          </div>
                                          </a>
                                       </div>
                                       @endforeach
                                    </div>
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