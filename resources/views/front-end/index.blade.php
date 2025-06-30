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
   </head>
   <body>
      @include('front-end.include.header')
      <section class="main-slider">
         <div class="row">
            <div class="col-md-12">
               <div class="swiper mySwiper swiper-main">
                  <div class="swiper-wrapper">
                     @foreach($slider as $sliders)
                     <?php $pro_id = $sliders->url; ?> 
                     <div class="swiper-slide ">
                        <img class="desktop-view" src="{{url('uploads/home-slider/'.$sliders->img_name)}}" alt="">
                       
                     </div>
                     <!-- </a> -->
                     @endforeach  
                  </div>
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
               </div>
               
            </div>
         </div>
      </section>
      <section class="main-slider">
         <div class="row">
            <div class="col-md-12">
               <div class="swiper mySwiper swiper-main">
                  <div class="swiper-wrapper">
                     @foreach($slider_mob as $sliders)
                     <?php $pro_id = $sliders->url; ?> 
                     <div class="swiper-slide ">
                        
                        <img class="mobile-view" src="{{url('uploads/home-slider/'.$sliders->img_name)}}" alt="">
                     </div>
                     <!-- </a> -->
                     @endforeach  
                  </div>
                  <div class="swiper-pagination"></div>
                  <div class="swiper-button-prev"></div>
                  <div class="swiper-button-next"></div>
               </div>
               
            </div>
         </div>
      </section>
      <section class="logo-slider">
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading">
                     <h1 >Brands</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="swiper mySwiper swiper-logo">
                     <div class="swiper-wrapper">
                        @foreach($brands as $brand)
                        <div class="swiper-slide ">
                           <a href="{{url('brand-products/'.$brand->url_word)}}">
                           <img src="{{url('uploads/brands/logo/'.$brand->brand_image)}}" alt="" />
                           </a>
                        </div>
                        @endforeach 
                     </div>
                     <div class="swiper-button-prev"></div>
                     <div class="swiper-button-next"></div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="main-categories">
         <div class="padding-top"></div>
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Categories</h1>
                  </div>
               </div>
            </div>
            <div class="row categories-main">
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/reels')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/REELS HOME PAGE CATOGORY.jpg" alt="">
                        <div class="categories-head">
                           <h1>Reel</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4" >
                  <a href="{{url('category-products/line')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/LINE HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Line</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/rod')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/ROD HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Rod</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/apparel')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/APPAREL HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Apparel</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/terminal-tackle')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/TERMINAL TACKLE HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Terminal Tackle</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/lure')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/LURE HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Lure</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4" >
                  <a href="{{url('category-products/spare-parts')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/SPARE PARTS HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Spare Parts</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('new-arrivals')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/NEW ARRIVAL HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>New Arrivals</h1>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="col-md-2 col-4">
                  <a href="{{url('category-products/accessories')}}">
                     <div class="categories-img">
                        <img src="{{URL::to('/')}}/front-end/categories/ACCESSORIES HOME PAGE CATOGARY IMAGE.jpg" alt="">
                        <div class="categories-head">
                           <h1>Accessories</h1>
                        </div>
                     </div>
                  </a>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="new-arrivals">
                     <div class="swiper mySwiper swiper-newarrival">
                        <div class="swiper-wrapper">
                           @foreach($new as $new_pro)
                           <?php $pro_id = $new_pro->product_slug; ?>
                           <div class="swiper-slide ">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                 <div class="product-view">
                                    <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}">
                                    </div>
                                    <div class="product-view-details">
                                       <h1>
                                       <h1>{{$new_pro->name}} &nbsp;  {{$new_pro->sub_name}}</h1>
                                       <div class="product-price">
                                          <p>
                                             ₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                                          </p>
                                       </div>
                                       <div class="reviews-icon">
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                       </div>
                                       <!-- HTML !-->
                              <a href="{{url('product-view/'.$pro_id)}}">
                              <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                              </a>
                              </div>
                              </div>
                              </a>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="fishing-all-about-you">
                     <img src="{{URL::to('/')}}/front-end/images/home/banners/testimonial-add-banner-2x-scaled.jpg" alt="">
                     <div class="fishing-all-about-you-contents">
                        <h1>*Fishing Is All About *</h1>
                        <p>Right Place . . . Right Time . . . Right Technique
                           Watch out video on our YouTube channel to know more about fishing tips & tricks
                        </p>
                        <a href="">https://youtube.com/@TackleTips</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Reel</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_real as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Rod</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_rod as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Line</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_line as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Lure</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_lure as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="fishing-all-about-you">
                     <img src="{{URL::to('/')}}/front-end/images/home/banners/testimonial-add-banner-2x-scaled.jpg" alt="">
                     <div class="fishing-all-about-you-contents">
                        <h1>*Fishing Is All About *</h1>
                        <p>Right Place . . . Right Time . . . Right Rechnique
                           Watch out video on our YouTube channel to know more about fishing tips & tricks
                        </p>
                        <a href="">https://youtube.com/@TackleTips</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Accessories</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_accesories as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Terminal Tackle</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_terminal as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Apparel</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_apparel as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="discount-details">
                     <img src="{{URL::to('/')}}/front-end/images/home/banners/dsc-bg.jpg" alt="">
                     <div class="discount-details-contents">
                        <h1>Best Deals of The Week</h1>
                        <p>Up to 60% Discount</p>
                        <a href=""> <button class="button-58" role="button">SHOP NOW</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>New Arrivals-Spare Parts</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($new_spare as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <!-- <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Seasonal Products</h1>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($seasonal_product as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                  <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
         </section> -->
      <section class="main-product-categories">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>Popular Products</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach($offer as $new_pro)
                  <?php $pro_id = $new_pro->product_slug; ?>
                  <div class="col-md-3 col-6">
                     <a href="{{url('product-view/'.$pro_id)}}">
                        <div class="product-view">
                           <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></div>
                           <div class="product-view-details">
                              <div>
                                 <h1> 
                     <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a> </h1>
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
                     <!-- HTML !-->
                     <div>
                     <a href="{{url('product-view/'.$pro_id)}}">
                     <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                     </a>
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
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="discount-details">
                     <img src="{{URL::to('/')}}/front-end/images/home/banners/dsc-bg.jpg" alt="">
                     <div class="discount-details-contents">
                        <h1>Best Deals of The Week</h1>
                        <p>Up to 60% Discount</p>
                        <a href=""> <button class="button-58" role="button">SHOP NOW</button></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>Featured Products</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="new-arrivals">
                     <div class="swiper mySwiper popular-products">
                        <div class="swiper-wrapper">
                           @foreach($new as $new_pro)
                           <?php $pro_id = $new_pro->product_slug; ?>
                           <div class="swiper-slide ">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                 <div class="product-view">
                                    <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}">
                                    </div>
                                    <div class="product-view-details">
                                       <h1>
                                       <h1>{{$new_pro->name}} &nbsp;  {{$new_pro->sub_name}}</h1>
                                       <div class="product-price">
                                          <p>
                                             ₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                                          </p>
                                       </div>
                                       <div class="reviews-icon">
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                       </div>
                              <a href="{{url('product-view/'.$pro_id)}}">
                              <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                              </a>
                              </div>
                              </div>
                              </a>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1 style="color: #ea2c0c;">Youtube</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="new-arrivals">
                     <div class="swiper mySwiper popular-products">
                        <div class="swiper-wrapper">
                           @foreach($videoYoutube as $youtube)
                           <div class="swiper-slide">
                              <a href="{{ $youtube->video }}">
                              <img src="{{ url('uploads/video/' . $youtube->image) }}" alt="">
                              </a>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1>Featured Products</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="new-arrivals">
                     <div class="swiper mySwiper popular-products">
                        <div class="swiper-wrapper">
                           @foreach($featured as $new_pro)
                           <?php $pro_id = $new_pro->product_slug; ?>
                           <div class="swiper-slide ">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                 <div class="product-view">
                                    <div class="product-view-img"> <img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}">
                                    </div>
                                    <div class="product-view-details">
                                       <h1>
                                       <h1>{{$new_pro->name}} &nbsp;  {{$new_pro->sub_name}}</h1>
                                       <div class="product-price">
                                          <p>
                                             ₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                                          </p>
                                       </div>
                                       <div class="reviews-icon">
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="i-color fa fa-star"></i>
                                          <i class="fa fa-star-o"></i>
                                          <i class="fa fa-star-o"></i>
                                       </div>
                              <a href="{{url('product-view/'.$pro_id)}}">
                              <button class="button-58 view-details-button" role="button">VIEW DETAILS</button>
                              </a>
                              </div>
                              </div>
                              </a>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row ">
               <div class="col-md-6 col-6">
                  <div class="heading">
                     <h1 style="color:#f60869;">Instagram</h1>
                  </div>
               </div>
               <div class="col-md-6 col-6">
                  <div class="view-all-button">
                     <a href="">
                        <h1>View All</h1>
                     </a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="new-arrivals">
                     <div class="swiper mySwiper popular-products">
                        <div class="swiper-wrapper">
                           @foreach($videoInstagram as $instagram)
                           <div class="swiper-slide">
                              <a href="{{ $instagram->video }}">
                              <img src="{{ url('uploads/video/' . $instagram->image) }}" alt="">
                              </a>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="testimonial-main">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Customer Feedback</h1>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-12">
                  <div class="testimonial-sub">
                     <div class="swiper mySwiper testimonial">
                        <div class="swiper-wrapper">
                           @foreach($testimonial as $testmon)
                           <div class="swiper-slide">
                              <div class="testimonial-contents">
                                 <div class="author-title">
                                    <img src="{{ asset('uploads/testimonial/' . $testmon->image) }}" alt="Author image" width="80" height="80" style="border-radius: 50%;">
                                    <h5>{{$testmon->auther}}</h5>
                                 </div>
                                 <div class="datils">
                                    <p>{{$testmon->description}}</p>
                                 </div>
                              </div>
                           </div>
                           @endforeach
                        </div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section class="latest-blog-main">
         <div class="container">
            <div class="row ">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Latest Blog</h1>
                  </div>
               </div>
            </div>
            <div class="latest-blog-sub">
               <div class="row">
                  @if(count($blog))
                  @foreach($blog as $blg)
                  <div class="col-md-3 col-12">
                     <div class="latest-blog">
                        <div class="latest-blog-img">
                           <a href="{{url('blog/'.$blg->id)}}">
                              <img src="{{url('uploads/blogs/'.$blg->blog_image)}}" alt="">
                        </div>
                        <div class="latest-blog-contents">
                        <div class="blog-date">
                        <p>{{$blg->created_at}}</p>
                        </div>
                        <div>
                        <p>{{$blg->blog_title}}</p>
                        </div>
                        <a href="{{url('blog/'.$blg->blog_id)}}"><button class="button-58 view-details-button" role="button">READ MORE</button></a>
                        </div>
                     </div>
                  </div>
                  @endforeach   
                  @endif 
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