<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.css">
      <script src="https://cdn.jsdelivr.net/npm/nouislider@15.7.0/dist/nouislider.min.js"></script>
   <style>
      .custom-select-filter {
  position: relative;
  width: 200px;
}

.select-btn-filter {
  background-color: #fff;
  padding: 8px 12px;
  border: 1px solid #ccc;
  cursor: pointer;
}

.dropdown-filter {
  display: none;
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 999;
  background-color: #fff;
  border: 1px solid #ccc;
  width: 100%;
}

.dropdown-filter div {
  padding: 8px 12px;
  cursor: pointer;
}

.dropdown-filter div:hover {
  background-color: #f1f1f1;
}

.dropdown-filter.show {
  display: block;
}

      </style>
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
               <div class="col-lg-3  col-md-12 product-categories-filtration  ">
                  <div class="product-categories-filtration-sub mobile-product-category">
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
                  <div class="menu-product-category-button">
                     <div class="mobile-icon-product">
                        <div id="menu-btn-product" class="mobile-menu-product">
                           <i class="fas fa-filter"></i>
                        </div>
                     </div>
                     <div id="menu-box-product" class="menu-box-product">
                        <h1 class="mobile-brands-head">Categories</h1>
                        <div class="product-category-mobile-accordian">
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
                        </div>
                        <h1 class="mobile-brands-head">Brands</h1>
                        <div class="brand-filtration-mobile">
                           <ul>
                              @foreach($brands as $brand)
                              <li> <a href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}</a></li>
                              @endforeach
                           </ul>
                        </div>
                        <button id="close-btn-product">&times;</button>
                     </div>
                  </div>
               </div>
           <div class="col-lg-9 col-md-12"> 
  <div class="filterby-price-main">
    <div class="row">
      <div class="col-md-12">
        <div class="filter-price-wrapper-main">
          <div class="sort-dropdown">
            <label for="sort-price">Sort by Price:</label>
            <div class="custom-select-filter">
              <div class="select-btn-filter" onclick="toggleDropdownFilter()">
                {{ ucfirst(str_replace('_', ' ', request('sort', 'Select an option'))) }} ▼
              </div>
              <div class="dropdown-filter" id="dropdownOptions">
                <div onclick="selectOptionFilter(this, 'newest')">New Arrivals</div>
                <div onclick="selectOptionFilter(this, 'price_low_high')">Price: Low to High</div>
                <div onclick="selectOptionFilter(this, 'price_high_low')">Price: High to Low</div>
              </div>
            </div>
          </div>

          <div class="filter-price-wrapper">
            <div>
              Price: ₹<span id="minPrice">{{ request('min_price', 0) }}</span> - ₹<span id="maxPrice">{{ request('max_price', 10000) }}</span>
            </div>
            <div id="priceSlider" data-url="{{ url()->current() }}"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- </div> -->

                  <!-- old product section -->
                  <div id="productList" class="product-list">
                     <div class="row">
                        @foreach($product as $new_pro)
                        <?php $pro_id = $new_pro->product_slug; ?>
                        <div class="col-md-4 col-6">
                           <a href="{{ url('product-view/'.$pro_id) }}">
                              <div class="product-view">
                                 <div class="product-view-img">
                                    <img src="{{ url('uploads/product/thumb_images/'.$new_pro->product_image) }}" alt="{{ $new_pro->name }}">
                                 </div>
                                 <div class="product-view-details">
                                    <h1>
                           <a href="{{ url('product-view/'.$pro_id) }}">{{ $new_pro->name }} {{ $new_pro->sub_name }}</a></h1>
                           <div class="product-price">
                           <p>₹{{ number_format($new_pro->product_price_offer, 2, '.', ',') }}</p>
                           </div>
                           <div class="reviews-icon">
                           <i class="i-color fa fa-star"></i><i class="i-color fa fa-star"></i><i class="i-color fa fa-star"></i><i class="i-color fa fa-star"></i><i class="fa fa-star-o"></i>
                           </div>
                           <div>
                           <a href="{{ url('product-view/'.$pro_id) }}">
                           <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                           </a>
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
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      const priceSlider = document.getElementById('priceSlider');
      const minPrice = document.getElementById('minPrice');
      const maxPrice = document.getElementById('maxPrice');

      if (priceSlider && minPrice && maxPrice) {
         noUiSlider.create(priceSlider, {
            start: [{{ request('min_price', 0) }}, {{ request('max_price', 10000) }}],
            connect: true,
            range: {
               'min': 0,
               'max': 10000
            },
            step: 100,
            tooltips: true,
            format: {
               to: value => Math.round(value),
               from: value => Number(value)
            }
         });

         priceSlider.noUiSlider.on('update', function (values) {
            minPrice.textContent = values[0];
            maxPrice.textContent = values[1];
         });

         priceSlider.noUiSlider.on('change', function (values) {
            const currentUrl = window.location.href.split('?')[0];
            const params = new URLSearchParams(window.location.search);
            params.set('min_price', values[0]);
            params.set('max_price', values[1]);
            window.location.href = `${currentUrl}?${params.toString()}`;
         });
      }

      document.getElementById('sort-select')?.addEventListener('change', function () {
         const currentUrl = window.location.href.split('?')[0];
         const params = new URLSearchParams(window.location.search);
         params.set('sort', this.value);
         window.location.href = `${currentUrl}?${params.toString()}`;
      });
   </script>

<script>
function toggleDropdownFilter() {
  event.stopPropagation(); // Prevent immediate close
  document.getElementById("dropdownOptions").classList.toggle("show");
}

function selectOptionFilter(element, value) {
  // Update button text
  document.querySelector(".select-btn-filter").innerText = element.innerText + " ▼";

  // Update URL parameters
  const currentUrl = window.location.href.split('?')[0];
  const params = new URLSearchParams(window.location.search);
  params.set('sort', value);
  window.location.href = `${currentUrl}?${params.toString()}`;
}

// Close dropdown if clicking outside
window.addEventListener('click', function(e) {
  if (!e.target.closest('.custom-select-filter')) {
    document.getElementById("dropdownOptions")?.classList.remove("show");
  }
});
</script>


   </body>
</html>