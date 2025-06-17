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
      <section class="main-new-arrivals">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Reel</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Rod</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Line</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Lure</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Accessories</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Terminal Tackle</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Apparel</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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
               <div class="col-md-12">
                  <div class="heading">
                     <h1>New Arrivals-Spare Parts</h1>
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
                     <button class="button-58" role="button">VIEW DETAILS</button>
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