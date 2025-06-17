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
                  <h1>Cart</h1>
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
                        <h3 class="small-title">Shopping cart</h3>
                        <p>Shopping cart-Checkout-Order complete</p>
                     </div>
                     <div class="padding-top"></div>
                     <div class="wishlist">
                        <div class="row">
                           <div class="col-md-4 col-sm-4 text-center">
                              <p>Product</p>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <p>Price</p>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <p>Quantity</p>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <p>Total</p>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <p>Close</p>
                           </div>
                        </div>
                     </div>
                     <!-- <form action="{{ url('update-cart') }}" method="post">
                        {{csrf_field()}} -->
                     <div class="wishlist-entry clearfix">
                        <div class="row">
                           @foreach($cart as $item) 
                           <input type="hidden" name="rowId[]" value="{{ $item->id }}">
                           <div class="col-md-4 col-sm-4">
                              <div class="cart-entry">
                                 <a class="image" href="{{ url('product-view/'.$item->product_slug) }}">
                                 <img src="{{ url('uploads/product/thumb_images/'.$item->attributes->image) }}" alt="">
                                 </a>
                                 <div class="cart-content">
                                    <h4 class="title">{{ $item->name }}</h4>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-2 col-sm-2 entry">
                              <div class="price">₹ {{ number_format($item->price, 2) }}</div>
                           </div>
                           <div class="col-md-2 col-sm-2">
                              <div class="quantity-control">
                                 <button type="button" class="btn-decrease" aria-label="Decrease quantity">-</button>
                                 <!-- class="quantity-input" name="cartquantity" id="cartquantity" value="1" min="1" -->
                               <input type="text" class="quantity-input qty" value="{{ $item->quantity }}" min="1" step="1" data-id="{{ $item->id }}" readonly>
                                 <button type="button" class="btn-increase" aria-label="Increase quantity">+</button>
                              </div>
                              <!--  -->
                           </div>
                           <div class="col-md-2 col-sm-2 entry">
                              <div class="price item-total">₹ {{ number_format($item->price * $item->quantity, 2) }}</div>
                           </div>
                           <div class="col-md-2 col-sm-2 btn-entry">
                              <a class="btn-close" href="{{ url('remove-cart/'.$item->id) }}">Delete</a>
                           </div>
                           @endforeach
                           <!-- <div class="col-md-12">
                              <input type="submit" class="btn rd-stroke-btn border_1px dart-btn-xs" value="Update Cart">
                              </div> -->
                        </div>
                     </div>
                     <!-- </form> -->
                     <hr>
                     <div class="padding-top"></div>
                     <div class="row mt-5">
                        <div class="col-md-6">
                        </div>
                        <div class=" col-md-6  col-md-offset-4  col-xs-12 cart-total">
                           <div class="grand-total-div card card--padding ">
                              <table class="table-total-checkout">
                                 <tbody>
                                    <tr>
                                       <th>GRAND TOTAL : </th>
                                       <td>₹{{Cart::getTotal()}}</td>
                                    </tr>
                                 </tbody>
                              </table>
                              <hr>
                              <div class="proceed-to-checkout-main">
                                 <a href="{{url('checkout')}}" class="proceed-to-checkout">
                                 <button class="button-58 p" role="button">PROCEED TO CHECKOUT</button>
                                 </a>
                              </div>
                              <div class="continue-shoping-main">
                                 <a href="{{URL::to('/')}}" class=" continue-shoping"><button class="button-58 p"
                                    role="button">CONTINUE SHOPPING</button> </a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="padding-top"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      @include('front-end.include.footar')
      <!-- <script>
         AOS.init();
      </script> -->
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
      <script>
       document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".quantity-control").forEach((control) => {
        const input = control.querySelector(".quantity-input");
        const btnDecrease = control.querySelector(".btn-decrease");
        const btnIncrease = control.querySelector(".btn-increase");

        const updateButtonStates = () => {
            btnDecrease.disabled = parseInt(input.value) <= parseInt(input.min);
        };

        const sendAjaxUpdate = () => {
            const rowId = input.dataset.id;
            const quantity = input.value;
            const token = "{{ csrf_token() }}";

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
                        // Update total for the item
                        const itemTotalElement = control.closest('.row').querySelector('.item-total');
                        const itemTotal = parseFloat(response.item_total).toFixed(2);
                        itemTotalElement.textContent = "₹ " + itemTotal;

                        // Update grand total
                        document.querySelector(".table-total-checkout td").textContent = "₹" + parseFloat(response.grand_total).toFixed(2);
                    }
                }
            });
        };

        btnDecrease.addEventListener("click", () => {
            input.value = Math.max(parseInt(input.min), parseInt(input.value) - 1);
            updateButtonStates();
            sendAjaxUpdate();
        });

        btnIncrease.addEventListener("click", () => {
            input.value = parseInt(input.value) + 1;
            updateButtonStates();
            sendAjaxUpdate();
        });

        updateButtonStates();
    });
});

         
         
      </script>
   </body>
</html>