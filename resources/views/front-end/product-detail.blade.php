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
                  <h1>Products</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="product-detail-view">
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <div class="product-detail-view-section">
                     <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="thumbnail-detail swiper mySwiper2 swiper-initialized swiper-horizontal swiper-backface-hidden">
                        <div class="swiper-wrapper" id="swiper-wrapper-0f4040f9abb103770" aria-live="polite">
                           @foreach($product_images as $pro_image)
                           <div class="swiper-slide swiper-slide-active" role="group" aria-label="1 / 3"
                              style="width: 591px; margin-right: 10px;">
                              <div class="zoom-container">
                                 <img src="{{ url('uploads/product/thumb_images/' . $pro_image->images) }}" 
                                    alt="Product Image {{ $loop->iteration }}" 
                                    class="zoom-img"
                                    data-zoom-src="{{ url('uploads/product/thumb_images/' . $pro_image->images) }}"
                                    id="main-img-{{ $loop->iteration }}">
                                 <div class="zoom-lens"></div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                     </div>
                     <div thumbsslider=""
                        class="swiper thumbnail-detail-sub mySwiper swiper-initialized swiper-horizontal swiper-free-mode swiper-watch-progress swiper-backface-hidden swiper-thumbs">
                        <div class="swiper-wrapper" id="swiper-wrapper-66c5de397e545adf" aria-live="polite"
                           style="transform: translate3d(0px, 0px, 0px);">
                           @foreach($product_images as $pro_image)
                           <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active swiper-slide-thumb-active"
                              role="group" aria-label="1 / 3" style="width: 140.25px; margin-right: 10px;">
                              <img src="{{url('uploads/product/thumb_images/'.$pro_image->images)}}">
                           </div>
                           @endforeach
                        </div>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="product-detail-view-contents">
                     <div class="zoom-result" id="zoom-result"></div>
                     <h1>{{$prometa->name}} <span class="product-detail-head-sub">{{$prometa->sub_name}}</span>
                     </h1>
                     <div class="product-detail-sub">
                        <h6> View all <a href="{{url('brand-products/'.$brand->url_word)}}"><span class="product-detail-head-sub">{{$brand->name}} </span></a>
                           Products
                        </h6>
                     </div>
                     <div class="product-price-view">
                        <p>
                           ₹ {{$prometa->product_price_offer}}
                        </p>
                     </div>
                     <div class="reviews-icon">
                        <i class="i-color fa fa-star" aria-hidden="true"></i>
                        <i class="i-color fa fa-star" aria-hidden="true"></i>
                        <i class="i-color fa fa-star" aria-hidden="true"></i>
                        <i class="i-color fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                     </div>
                     <div class="color-list">
                        <h5 class="sub-title">Select Attribute</h5>
                        @foreach($group as $pro_group)
                        <?php $pro_id = $pro_group->product_id; ?>
                        <button class="color active selectattri"
                           onclick="location.href='{{url('product-view/'.$pro_id)}}'">
                           <div class="selectattribute">
                              <p>{{$pro_group->sub_name}}</p>
                           </div>
                        </button>
                        @endforeach  
                     </div>
                     <div class="select-quantuty">
                        <h5 class="sub-title">Quantity</h5>
                        <div class="quantity-control">
                           <button type="button" class="btn-decrease" aria-label="Decrease quantity">-</button>
                           <input type="" class="quantity-input" name="cartquantity" id="cartquantity" value="1" min="1" />
                           <button type="button" class="btn-increase" aria-label="Increase quantity">+</button>
                        </div>
                     </div>
                     <div class="add-to-cart-button">
                        @if($stock>0)
                        <!-- <button class="button-58 add-to-cart-popup" class="add-to-cart" id="add-now-btn" data-product-id="{{ $prometa->id }}">ADD TO CART</button> -->
                       <button class="button-58 add-to-cart-popup add-to-cart" id="add-now-btn" data-product-id="{{ $prometa->id }}">
                        ADD TO CART
                     </button>
                        @else
                        <h6 class="outofstock">Out Of Stock</h6>
                        @endif
                     </div>
                     <div class="add-to-cart-popup-box">
                        <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel"
                           aria-hidden="true">
                           <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                 <div class="modal-body">
                                    <h1>The item has been added to your cart.</h1>
                                    <button class="button-58 p" role="button"
                                       data-bs-dismiss="modal">Close</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="share">
                        <ul class="usefull-link">
                           <!-- <li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Email to a Friend</a></li> -->
                           <li><a href="#" class="wishlist-btn" data-id="{{ $prometa->id }}">
                              <i class="fas fa-heart"></i> Add to Wishlist
                              </a>
                           </li>
                           <!-- <li><a href="#"><i class="fas fa-print"></i> print</a></li> -->
                        </ul>
                     </div>
                     <div class="share-media">
                        <div class="share-icons">
                           <span>share :</span>
                           <a href="https://www.facebook.com"><i class="fa fa-facebook"></i></a>
                           <a href="https://www.instagram.com"><i class="fa fa-instagram"></i></a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="description-review">
                     <div class="review-container">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                           <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                 data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                 aria-selected="true">Description</button>
                           </li>
                           <li class="nav-item" role="presentation">
                              <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                 data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                 aria-selected="false">Reviews</button>
                           </li>
                        </ul>
                     </div>
                     <div class="tab-content border ">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                           <div class="description-contents">
                              <div class="pro-tab-info pro-description">
                                 <h3 class="small-title">{{$prometa->name}}</h3>
                                 <div style="overflow-x:auto;">
                                    <p class="p-description">{!!$prometa->description!!}</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                           <div class="pro-tab-info pro-reviews">
                              <div class="customer-review">
                                 <h3 class="small-title">Customer review</h3>
                                 <div class="row">
                                    @if($review)
                                    @foreach($review as $revie)
                                    <div class="col-md-4">
                                       <div class="review-main">
                                          <div class="review-icon">
                                             <i class="fas fa-user"></i>
                                          </div>
                                          <div class="review-icon-desc">
                                             <h1>{{$revie->author_name}}</h1>
                                             <!-- Display Star Rating -->
                                             <div class="rating">
                                                @for ($i = 1; $i <= 5; $i++)
                                                @if ($i <= $revie->rating)
                                                <i class="fas fa-star text-warning"></i> <!-- Filled star -->
                                                @else
                                                <i class="far fa-star text-warning"></i> <!-- Empty star -->
                                                @endif
                                                @endfor
                                             </div>
                                             <p>{{$revie->text}}</p>
                                          </div>
                                       </div>
                                    </div>
                                    @endforeach
                                    @endif
                                 </div>
                              </div>
                              <div class="leave-review">
                                 <h3 class="small-title">Leave your review</h3>
                                 <div class="your-rating mb-30">
                                 </div>
                                 <div class="reply-box">
                                    <form class="form-horizontal" action="{{ url('add-review') }}" method="post">
                                       {{ csrf_field() }}  
                                       <input type="hidden" name="product_id" value="{{ $prometa->product_id }}">
                                       <div class="form-group">
                                          <!-- Name Field -->
                                          <div class="col-md-6">
                                             <input class="form-control" type="text" name="author" placeholder="Your name here...">
                                          </div>
                                          <br>
                                          <!-- Rating Field -->
                                          <div class="col-md-6">
                                             <label for="rating">Rating:</label>
                                             <select class="form-control" name="rating" required>
                                                <option value="5">⭐⭐⭐⭐⭐ </option>
                                                <option value="4">⭐⭐⭐⭐ </option>
                                                <option value="3">⭐⭐⭐ </option>
                                                <option value="2">⭐⭐ </option>
                                                <option value="1">⭐ </option>
                                             </select>
                                          </div>
                                       </div>
                                 </div>
                                 <!-- Rating Dropdown -->
                                 <!-- Review Text -->
                                 <div class="form-group">
                                 <div class="col-md-6">
                                 <textarea class="form-control input-lg" name="text" rows="4" placeholder="Your review here..."></textarea>
                                 </div>
                                 </div>
                                 <!-- Submit Button -->
                                 <div class="form-group">
                                 <div class="col-md-12">
                                 <div class="submit-review">
                                 <button class="button-58" type="submit">SUBMIT REVIEW</button>
                                 </div>
                                 </div>
                                 </div>
                                 </form>
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
      <section class="main-product-categories">
         <div class="padding-top"></div>
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Customers Also Brought</h1>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($product as $products)    
                  <?php $pro_id = $products->product_slug; ?>   
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$products->product_image)}}" alt="">
                           </div>
                           <div class="product-view-details">
                              <div>
                                 <h1>{{$products->name}} &nbsp;  {{$products->sub_name}} </h1>
                              </div>
                              <div class="product-price">
                                 <p>
                                    ₹{{number_format($products->product_price_offer, 2, '.', ',')}}
                                 </p>
                              </div>
                              <div class="reviews-icon">
                                 <i class="i-color fa fa-star"></i>
                                 <i class="i-color fa fa-star"></i>
                                 <i class="i-color fa fa-star"></i>
                                 <i class="fa fa-star-o"></i>
                                 <i class="fa fa-star-o"></i>
                              </div>
                              <div>
                     <a href="{{url('product-view/'.$pro_id)}}"> <button class="button-58 view-details-button" role="button">VIEW DETAILS</button> </a>
                     </div>
                     </div>
                     </div>
                     </a>
                  </div>
                  @endforeach
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
      <script>
         var swiper = new Swiper(".mySwiper", {
             spaceBetween: 10,
             slidesPerView: 4,
             freeMode: true,
             watchSlidesProgress: true,
         });
         var swiper2 = new Swiper(".mySwiper2", {
             spaceBetween: 10,
             navigation: {
                 nextEl: ".swiper-button-next",
                 prevEl: ".swiper-button-prev",
             },
             thumbs: {
                 swiper: swiper,
             },
         });
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
         
                
                 btnDecrease.addEventListener("click", () => {
                     input.value = Math.max(parseInt(input.min), parseInt(input.value) - 1);
                     updateButtonStates();
                 });
         
                
                 btnIncrease.addEventListener("click", () => {
                     input.value = parseInt(input.value) + 1;
                     updateButtonStates();
                 });
         
                 
                 updateButtonStates();
             });
         });
         
         
      </script>
      <script>
    // Function to update cart count (called on page load and after adding)
    function updateCartCount() {
        $.ajax({
            url: '{{ route("cart.count") }}',
            method: 'GET',
            success: function (data) {
                $('.cart-count').text(data.count); // Update count in the cart icon
            },
            error: function () {
                console.error('Failed to fetch cart count.');
            }
        });
    }

    // Run on page load
    $(document).ready(function () {
        updateCartCount(); // Load cart count initially

        // Handle Add to Cart button click
        $(document).on('click', '#add-now-btn', function () {
            var productId = $(this).data('product-id');
            var quantity = $('#cartquantity').val();

            if (!quantity || quantity <= 0) {
                alert('Please enter a valid quantity.');
                return;
            }

            if (!productId) {
                alert('Product ID missing.');
                return;
            }

            $.ajax({
                url: '{{ url("cart/add") }}',
                method: 'GET',
                data: {
                    product_id: productId,
                    quantity: quantity
                },
                success: function (response) {
                    if (Array.isArray(response.cartItems)) {
                        updateCartCount(); // Refresh cart count
                      //  showPopup('Product added to cart successfully!');
                    } else {
                        console.error('cartItems is not an array:', response);
                        showPopup('Error updating cart. Please try again.');
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    showPopup('Failed to add product to cart. Please try again.');
                }
            });
        });
    });

    // Example popup function (replace with SweetAlert or custom popup if needed)
    function showPopup(message) {
        alert(message);
    }
</script>
      <script>
         document.addEventListener("DOMContentLoaded", () => {
           
             const addToCartButtons = document.querySelectorAll(".add-to-cart-popup");
         
             
             addToCartButtons.forEach((button) => {
                 button.addEventListener("click", () => {
                     
                     const cartModal = new bootstrap.Modal(document.getElementById("cartModal"));
                     cartModal.show();
                 });
             });
         });
         
         
     
         
         $(".wishlist-btn").on("click", function (e) {
         e.preventDefault();
         var productId = $(this).data("id");
         var token = "{{ csrf_token() }}";
         
         $.ajax({
            url: "{{ route('wishlist.add') }}",
            method: "POST",
            data: {
                _token: token,
                product_id: productId
            },
            success: function (response) {
                alert(response.message);
            },
            error: function (xhr) {
                if (xhr.status === 401) {
                    alert("You need to log in first.");
                } else if (xhr.status === 409) {
                    alert(xhr.responseJSON.message);
                } else {
                    alert("Something went wrong!");
                }
            }
         });
         });
      </script>
      <script>
         document.querySelectorAll('.zoom-container').forEach((container) => {
         const img = container.querySelector('.zoom-img');
         const lens = container.querySelector('.zoom-lens');
         const result = document.getElementById('zoom-result');
         
         // Show magnifier above swiper-wrapper
         img.addEventListener('mousemove', (e) => {
         result.style.display = 'block';
         result.style.zIndex = '999';  // Ensure it's on top
         //   result.style.top = `${container.getBoundingClientRect().top - result.offsetHeight - 10}px`;
         //   result.style.left = `${container.getBoundingClientRect().left}px`;
         
         moveLens(e, img, lens, result);
         });
         
         img.addEventListener('mouseleave', () => {
         result.style.display = 'none';
         });
         });
         
         function moveLens(e, img, lens, result) {
         const rect = img.getBoundingClientRect();
         const x = e.clientX - rect.left - (lens.offsetWidth / 2);
         const y = e.clientY - rect.top - (lens.offsetHeight / 2);
         
         // Ensure the lens stays within the image bounds
         const lensX = Math.max(0, Math.min(x, img.width - lens.offsetWidth));
         const lensY = Math.max(0, Math.min(y, img.height - lens.offsetHeight));
         
         lens.style.left = `${lensX}px`;
         lens.style.top = `${lensY}px`;
         
         const cx = result.offsetWidth / lens.offsetWidth;
         const cy = result.offsetHeight / lens.offsetHeight;
         
         result.style.backgroundImage = `url('${img.getAttribute('data-zoom-src')}')`;
         result.style.backgroundSize = `${img.width * cx}px ${img.height * cy}px`;
         result.style.backgroundPosition = `-${lensX * cx}px -${lensY * cy}px`;
         }
         
      </script>
   </body>
</html>