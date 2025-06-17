<!DOCTYPE html>
<html lang="en">


<head> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <meta name="description" content="Tackle Tips is the no: one Online Fishing tackle store in India. We sell Gear, reels, Rods, Lines &other fishing accessories from all Leading Brands.">
   
    <title>Online Fishing Equipment -Tackletips</title>

    <link rel="shortcut icon" href="{{ URL::to('/') }}/front-end/assets/img/favicon.png">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/bootstrap-select.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/fonts/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/fonts/line-icons/line-icons.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/main.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/settings.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/animate.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/owl.carousel.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/owl.theme.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/component.css" type="text/css">
   <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slicknav.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/responsive.css" type="text/css">
    
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-SB2QVPKBYS"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-SB2QVPKBYS');
</script>
</head>

<body>
@include('front-end/includes/header')
<script src="{{url('front-end/assets/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function(){

        var cart_pro=[];
$('.addCart').click(function(){ 
var product_id=$(this).data("pro_id");
var qty='1';
var price=$(this).data("price");


     $.ajax({

               type:'get',
               url:'{{url('addcart')}}',
               data:({product_id:product_id,qty:qty,price:price}),
               success:function(data){

$('#mcart').html(data);


$(".basket-footer").css("display", "block");




  $.ajax({

              type:'get',
             url:'{{url('addcart-count')}}',
             
              data:({}),
              success:function(data){



$('#countmob').html(data);


                 }

    });



                 }

    });





         }); 

$('.whish').click(function(){


var product_id=$(this).data("pro_id");
var qty='1';
var price=$(this).data("price");

   $(document).ajaxStart(function(){
        $(".load").css("display", "block");
    });
 $.ajax({

               type:'get',
                 url:'{{url('add-to-wishlist')}}',
               data:({product_id:product_id,qty:qty,price:price}),
               success:function(data){

$('#countwhish').html(data);
                }


            });





});
 });
</script>


    <section id="slider">
          <div class="row">
        <div class="tp-banner-container">
            <div class="tp-banner">
                <ul>
                     @foreach($slider as $sliders)

 <?php $pro_id = $sliders->url; ?> 
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="2000" data-delay="10000">

                        <img style="background-size: contain;" src="{{ URL::to('/') }}/front-end/assets/img/dummy.png" alt="laptopmockup_sliderdy" data-lazyload="{{url('uploads/home-slider/'.$sliders->img_name)}}" data-bgsize="contain" data-bgposition="top" data-duration="12000" data-ease="Power0.easeInOut" data-bgfit="115" data-bgfitend="100" data-bgpositionend="right">

                        <div class="tp-caption sft skewtotop tp-resizeme title start" data-x="20" data-y="center" data-voffset="-60" data-speed="800" data-start="950" data-easing="Power4.easeOut" data-splitin="none" data-splitout="none" data-elementdelay="0.01" data-endelementdelay="0.1" data-endspeed="1000" data-endeasing="Power4.easeIn" style="z-index: 11;">
                            <h3 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; letter-spacing: 2px; font-size: 20px; text-transform: uppercase; font-weight: 700; color: #333;"></h3>
                        </div>

                        <div class="tp-caption largeHeadingWhite sfl str tp-resizeme start" data-x="20" data-y="center" data-voffset="5" data-speed="1200" data-start="950" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="800" data-endeasing="easeInOutExpo">
                            <h1 style="text-align: center; min-height: 0px; min-width: 0px; line-height: 94px; border-width: 0px; margin: 0px 0px 20px; padding: 0px; font-size: 50px;  letter-spacing: 2px; font-weight: 800; color: #333;"></h1>
                        </div>



                        <div class="tp-caption sfb tp-resizeme start sliderbtn" data-x="20" data-hoffset="0" data-y="center" data-voffset="70" data-speed="1200" data-start="1750" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"><a href="{{url('product-view/'.$pro_id)}}" class="btn btn-common"><i class="icon-handbag" style="font-size: 14px"></i>Start Shopping</a>
                        </div>
                    </li>
                  
   @endforeach   



                </ul>
            </div>
            </div>
        </div>
    </section>


    <div class="client">
        <div class="container">
            <div class="row">
                <div id="client-logo" class="owl-carousel">
 @foreach($brands as $brand)

                    <div class="client-logo item">
                        <a href="{{url('brand-products/'.$brand->url_word)}}">
                            <img src="{{url('uploads/brands/logo/'.$brand->brand_image)}}" alt="" />
                        </a>
                    </div>
   @endforeach               
                </div>
            </div>
        </div>
    </div>





<div class="section">
<div class="container">
    <h1 class="section-title">Categories</h1>
            <hr class="lines">
      <div class="accessories" style="margin-bottom:30px;">
    <div class="row">
      
        <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
            <?php $mcat1 = 1; ?>
           <a href="{{url('products/'.$mcat1)}}"> <img alt="" src="{{url('/front-end/assets/img/categories/reel_final_PHOTO.jpg')}}"></a>
        </div>
         <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
             <?php $mcat3 = 3; ?>
          <a href="{{url('products/'.$mcat3)}}">  <img alt="" src="{{url('/front-end/assets/img/categories/LINE_FINAL_PHOTO.jpg')}}" ></a>
        </div> 
        <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
            <?php $mcat2 = 2; ?>
         <a href="{{url('products/'.$mcat2)}}">  <img alt="" src="{{url('/front-end/assets/img/categories/rod_final_PHOTO.jpg')}}" ></a>
        </div>
 
    <!--    </div>-->
    <!--</div>-->
    
    <!--  <div class="accessories" style="margin-bottom:30px;">-->
    <!--    <div class="row">-->
       
         <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
             <?php $mcat7 = 7; ?>
          <a href="{{url('products/'.$mcat7)}}"> <img alt="" src="{{url('/front-end/assets/img/categories/APPAREL_FINAL_PHOTO.jpg')}}" ></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
            <?php $mcat6 =6; ?>
           <a href="{{url('products/'.$mcat6)}}"> <img alt="" src="{{url('/front-end/assets/img/categories/TERMINAL_TACKLE_final_PHOTO.jpg')}}" ></a>
        </div>
        
           <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
               <?php $mcat4 =4; ?>
          <a href="{{url('products/'.$mcat4)}}" >  <img alt="" src="{{url('/front-end/assets/img/categories/LURE_FINAL_PHOTO.jpg')}}" ></a>
        </div>
    
  
       
         <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
              <?php $mcat8 = 8; ?>
          <a href="{{url('products/'.$mcat8)}}"> <img alt="" src="{{url('/front-end/assets/img/categories/SPARE_PARTS_FINAL_PHOTO.jpg')}}" ></a>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
           <a href="{{url('new-arrivals')}}"> <img alt="" src="{{url('/front-end/assets/img/categories/NEW_ARRIVEL_final_PHOTO.jpg')}}" ></a>
        </div>
        
           <div class="col-xs-6 col-sm-6 col-md-4" style="margin-bottom:20px;">
               <?php $mcat5 = 5; ?>
          <a href="{{url('products/'.$mcat5)}}">  <img alt="" src="{{url('/front-end/assets/img/categories/ACCESSORIES_FINAL_PHOTO.jpg')}}" ></a>
        </div>
    
          </div>
    </div>
    
    
</div></div>
<div class="row">
    
    
    
    
    
    

<div class="col-md-12 "> 
    
    
<div class="new-products-new">     

<div class="slider-items-products">
            <div id="special-products-slider3" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4 owl-carousel owl-theme" style="opacity: 1; display: block;">
                   <div class="owl-wrapper-outer">
                       
                       <div class="owl-wrapper" style="width: 11730px; left: 0px; display: block; transition: all 800ms ease 0s; transform: translate3d(-510px, 0px, 0px);">
                
                </div></div>  
                                
              
              </div>
            </div>
          </div>



    
            
</div>   
    
        
        

    
</div>
    











         
</div>




















    <section class="new-arrival-section section">
        <div class="container">
            <h1 class="section-title">New Arrivals</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-12">
                    <div id="new-products" class="owl-carousel">
           
         @foreach($new as $new_pro)

  <?php $pro_id = $new_pro->product_slug; ?>

                        <div class="item">
                             
                            <div class="shop-product">
                                <div class="product-box">
                                    <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                                     <a href="{{url('product-view/'.$pro_id)}}">
                                    <div class="cart-overlay">
                                    </div>
                                </a>
                                
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title">
                                       
                                        <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;  {{$new_pro->sub_name}}</a></h4>
                              <div class="align-items">
                                <div class="pull-left">
          <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                 
</span>
                                        </div>
                                        <div class="pull-right">
                                            <div class="reviews-icon">
                                                <i class="i-color fa fa-star"></i>
                                                <i class="i-color fa fa-star"></i>
                                                <i class="i-color fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                            </div>
                           
                        </div>
                    
            @endforeach    


                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="content-area">
<div class="container">

    
    
        
<div class="hero-land clearfix">
  <div class="landing caption text-center"> 
    <div class="row">
 <div class="col-md-12">   

<h2>*Fishing Is All About *</h2>
<p>Right Place . . . Right Time . . . Right Rechnique<br>Watch out video on our YouTube channel to know more about fishing tips & tricks <br><a href="https://youtube.com/@TackleTips" target="_blank">https://youtube.com/@TackleTips</a></a></p>
<p>
<!-- <a href="category.html" class="btn btn-common"><span class="icon-organization"></span> Apply Now</a> -->
</p>
</div>
  
</div>
</div>  
 </div>  
  </div>    
</section>
    
    
   <!--new arrivals reel-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Reel</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_real as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>
    
     <!--new arrivals rod-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Rod</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_rod as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>

 <!--new arrivals Line-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Line</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_line as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>


 <!--new arrivals lure-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Lure</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_lure as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>


 <!--new arrivals Accessories-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Accessories</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_accesories as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>
    
    <!--new arrivals Terminal-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Terminal Tackle</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_terminal as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>

  <!--new arrivals Apparel-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Apparel</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_apparel as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>
    
      <!--new arrivals Spare Parts-->
   <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">New Arrivals-Spare Parts</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($new_spare as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>
    
    
    <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">Seasonal Products</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($seasonal_product as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                             <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                          
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                                
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
                  
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
                  @endforeach  

       
    
         
            </div>
        </div>
    </section>


<!-New-product-design--->

    <section id="shop-collection">
        <div class="container">
            <h1 class="section-title">Popular Products</h1>
            <hr class="lines">
            <div class="row">

                         @foreach($offer as $new_pro)
 <?php $pro_id = $new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-6">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href=""><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                              <a href="{{url('product-view/'.$pro_id)}}">
                            <div class="cart-overlay">
                            </div>
                              </a>
                       
                        </div>
                        <div class="product-info">
                            <h4 class="product-title">
                               
                                <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                            <div class="align-items">
                                <div class="pull-left">
                                    <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
               
                                </div>
                                <div class="pull-right">
                                    <div class="reviews-icon">
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="i-color fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                            </div>
                            
                          
                            
                        </div>
                        <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                    </div>
                </div>
            
                 @endforeach  
        
          
       
        
          
            </div>
        </div>
    </section>





    <section class="discount-product-area">
        <div class="container">
            <div class="row">
                <div class="discount-text">
                    <p>Best Deals of The Week</p>
                    <h3>Up to 60% Discount</h3>
                    <!-- <a href="#" class="btn btn-common btn-large">View Deals</a> -->  
                    <div class="tp-caption sfb tp-resizeme start " data-x="20" data-hoffset="0" data-y="center" data-voffset="70" data-speed="1200" data-start="1750" data-easing="easeInOutExpo" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300"><a href="" class="btn btn-common"><i class="icon-handbag" style="font-size: 14px"></i>Shop Now</a>
                        </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <h1 class="section-title">Featured Products</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-12">
                    <div id="featured" class="owl-carousel">

                                 @foreach($featured as $new_pro)
 <?php $pro_id =$new_pro->product_slug; ?>

                        <div class="item">
                            <div class="shop-product">
                                <div class="product-box">
                                    <a href="#"><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                                     <a href="{{url('product-view/'.$pro_id)}}">
                                    <div class="cart-overlay">
                                    </div>
                                   </a>
                         
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title">
                                        
                                        <a href="{{url('product-view/'.$pro_id)}}">{{$new_pro->name}}&nbsp;{{$new_pro->sub_name}}</a></h4>
                                    <div class="align-items">
                                        <div class="pull-left">
                                            <span class="price">₹{{number_format($new_pro->product_price_offer, 2, '.', ',')}}
               
                                        </div>
                                        <div class="pull-right">
                                            <div class="reviews-icon">
                                                <i class="i-color fa fa-star"></i>
                                                <i class="i-color fa fa-star"></i>
                                                <i class="i-color fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                    <div class="product-price-button">
                              <a href="{{url('product-view/'.$pro_id)}}">
                                <button class="view-details-button">View Details</button>
                            </a>
                            
                        </div>
                            </div>
                        </div>
                      @endforeach        
                

                    </div>
                </div>
            </div>
        </div>
    </section>





    <div class="testimonial section">
        <div class="container">
            <div class="row">

                <div class="testimonials-carousel owl-carousel">
                      @if(count($testimonial))
               
                  @foreach($testimonial as $test)
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="author-info">
                           <!--      <a href="#"><img src="assets/img/testimonial/img1.jpg" alt=""></a> -->
                                <div class="author-title">
                                    <h5>{{$test->testimonial_author}}</h5>
                                    <span>{{$test->testimonial_category}}</span>
                                </div>
                            </div>
                            <div class="datils">
                                <p>{{$test->testimonial_desc}}</p>
                            </div>
                        </div>
                    </div>
                        @endforeach   
            @endif 
      
                </div>
            </div>
        </div>
    </div>


    <section class="latest-blog section">
        <div class="container">
            <h1 class="section-title">Latest Blog</h1>
            <hr class="lines">
            <div class="row">
                @if(count($blog))
               
                  @foreach($blog as $blg)
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="blog-item">
                        <div class="blog-img">
                            <a href="{{url('blog/'.$blg->id)}}">
                                <img src="{{url('uploads/blogs/'.$blg->blog_image)}}" alt="">
                            </a>
                            <div class="mask">
                            </div>
                        </div>
                        <div class="blog-info">
                            <div class="post-date">{{$blg->created_at}}</div>
                            <h3><a href="{{url('blog/'.$blg->id)}}">{{$blg->blog_title}}</a></h3>
                            <p id="blogDetails" class="blogparaclass">{{$blg->blog_short}}</p>
                              <a href="{{url('blog/'.$blg->id)}}" class="readmore">Read More</a> 
                        </div>
                    </div>
                </div>
            @endforeach   
            @endif 
     
            </div>
        </div>
    </section>
@include('front-end/includes/footer')
<script>
    var myDiv = $('#blogDetails');
myDiv.text(myDiv.text().substring(0,150))
</script>
  
</body>


</html>
