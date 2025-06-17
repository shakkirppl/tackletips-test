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
                  <h1>{{$pagename}}</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-3 product-categories-filtration">
                  <div class="product-categories-filtration-sub">
                     <div class="filter-by-brands">
                        <h1>Categories</h1>
                        <div class="accordian-main">
                           @foreach($category as $categor)
                           <button class="accordion-button">
                           {{$categor->name}}
                           <span class="arrow-filter">▼</span> 
                           </button>
                           <div class="accordion-content">
                              <ul>
                                 @foreach($categor->subcategories as $subcategory)
                                 <li><a href="{{url('sub-category-products/'.$subcategory->slug)}}" data-category="{{$categor->name}}">{{$subcategory->name}}</a></li>
                                 @endforeach
                              </ul>
                           </div>
                           @endforeach
                        </div>
                        <h1>Price</h1>
                        <div class="single-price-filter">
                           <label for="priceRange">
                           Max Price: ₹<span id="priceLabel">500</span>
                           </label>
                           <input type="range" id="priceRange" min="0" max="1000" value="500" step="10">
                        </div>
                        <h1>Brands</h1>
                        <div class="brand-filtration">
                           <ul>
                              @foreach($brands as $brand)
                              <li> <a href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}</a></li>
                              @endforeach
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-9">
                  <div class="filterby-price-main">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="filter-by-price">
                              <!-- <div>
                                 <h1>Showing 1-12 of 84 results</h1>
                                 </div> -->
                              <div class="sort-dropdown">
                                 <label for="sort-price">Sort by Price:</label>
                                 <div class="custom-select-filter">
                                    <div class="select-btn-filter" onclick="toggleDropdownFilter()">
                                       Select an option ▼
                                    </div>
                                    <div class="dropdown-filter">
   <div onclick="filterProducts('low-to-high')">Price: Low to High</div>
   <div onclick="filterProducts('high-to-low')">Price: High to Low</div>
</div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="product-detail-main">
                     <div class="row">
                        @foreach($product as $new_pro)
                        <?php $pro_id =$new_pro->product_slug; ?>
                        <div class="col-md-4 col-6 product-item" data-price="{{ $new_pro->product_price_offer }}">
                           <a href="{{url('product-view/'.$pro_id)}}">
                              <div class="product-view">
                                 <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}">
                                 </div>
                                 <div class="product-view-details">
                                    <div>
                                       <h1>  
                           <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;  {{$new_pro->sub_name}}</a> </h1>
                           </div>
                           <div class="product-price">
                           <p>
                           ₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}</p>
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
                     <div class="paginationclass">
                        {{ $product->links() }}
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
      <script>
         document.querySelectorAll(".accordion-button").forEach(function (button) {
            button.addEventListener("click", function () {
               const content = this.nextElementSibling;
               const arrow = this.querySelector(".arrow-filter");
              
               content.style.display = content.style.display === "block" ? "none" : "block";
             
               arrow.style.transform = content.style.display === "block" ? "rotate(180deg)" : "rotate(0deg)";
               
               document.querySelectorAll(".accordion-content").forEach(function (otherContent) {
                  if (otherContent !== content) {
                     otherContent.style.display = "none";
                  }
               });
              
               document.querySelectorAll(".arrow").forEach(function (otherArrow) {
                  if (otherArrow !== arrow) {
                     otherArrow.style.transform = "rotate(0deg)";
                  }
               });
            });
         });
      </script>
      <script>
         function toggleDropdownFilter() {
             document.querySelector('.dropdown-filter').classList.toggle('active');
         }
         
         function selectOptionFilter(option, value) {
             document.querySelector('.select-btn-filter').textContent = option.textContent;
             document.querySelector('.dropdown-filter').classList.remove('active');
         
             // Simulate a real select value
             console.log('Selected value:', value);
         }
         
         // Close dropdown when clicking outside
         window.onclick = function(e) {
             if (!e.target.closest('.custom-select-filter')) {
                 document.querySelector('.dropdown-filter').classList.remove('active');
             }
         }
      </script>
      <script>
         const rangeInput = document.getElementById("priceRange");
         const priceLabel = document.getElementById("priceLabel");
         
         rangeInput.addEventListener("input", function () {
           priceLabel.textContent = rangeInput.value;
         });
         
         
      </script>
      <!-- <script>
$(document).ready(function () {
    // Filter on range change
    $('#priceRange').on('input', function () {
        let maxPrice = parseFloat($(this).val());
        $('#priceLabel').text(maxPrice);

        $('.product-item').each(function () {
            let itemPrice = parseFloat($(this).data('price'));
            if (itemPrice <= maxPrice) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    // Toggle dropdown
    window.toggleDropdownFilter = function () {
        $('.dropdown-filter').toggle();
    };

    // Sort option selection
    window.selectOptionFilter = function (element, value) {
        let $items = $('.product-item');

        if (value === 'low-to-high') {
            $items.sort(function (a, b) {
                return $(a).data('price') - $(b).data('price');
            });
        } else if (value === 'high-to-low') {
            $items.sort(function (a, b) {
                return $(b).data('price') - $(a).data('price');
            });
        }

        $('.row').empty().append($items);
        $('.dropdown-filter').hide();
    };
});
</script> -->
   </body>
</html>