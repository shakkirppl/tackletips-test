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
                  <h1>Wishlist</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="row">
                     <div class=" ">
                        <h3 class="small-title"></h3>
                        <p></p>
                     </div>
                     <div class="padding-top"></div>
                     <div class="wishlist">
                        <div class="row">
                           <div class="col-md-4 col-sm-4 text-center">
                              <p>Product</p>
                           </div>
                           <div class="col-md-4 col-sm-2">
                              <p>Price</p>
                           </div>
                           <div class="col-md-4 col-sm-2">
                              <p>Action</p>
                           </div>
                        </div>
                     </div>
                     <div class="wishlist-entry clearfix">
                        <div class="row">
                           @foreach($wishlist as $wishli) 
                           <div class="col-md-4 col-sm-4">
                              <div class="cart-entry">
                                 <a class="image" href="{{ url('product-view/'.$wishli->product->product_slug) }}">
                                 <img src="{{ url('uploads/product/thumb_images/'.$wishli->product->product_image) }}" alt="">
                                 </a>
                                 <div class="cart-content">
                                    <h4 class="title">{{ $wishli->product->name }}</h4>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-4 col-sm-2 entry">
                              <div class="price">₹ {{ number_format($wishli->product->product_price_offer, 2) }}</div>
                           </div>
                           <div class="col-md-4 col-sm-2 btn-entry ms-auto">
                              <a class="btn-close" href="{{ url('product-view/'.$wishli->product->product_slug) }}">View Product</a>
                           </div>
                           @endforeach
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
         $(document).ready(function () {
         $(".qty").on("change", function () {
            var rowId = $(this).data("id");
            var quantity = $(this).val();
            var token = "{{ csrf_token() }}";
            $.ajax({
                url: "{{ route('cart.update') }}",
                method: "POST",
                data: {
                    _token: token,
                    rowId: rowId,
                    quantity: quantity
                },
                success: function (response) {
                    if (response.success) {
                        location.reload(); // Refresh the page to update the cart
                    }
                }
            });
         });
         });
      </script>
   </body>
</html>