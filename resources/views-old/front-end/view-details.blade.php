
<!DOCTYPE html>
<html lang="en">
<style>
/*body {*/
/*	color: #666;*/
/*	font-size: 13px;*/
/*	background: #f4f4f4;*/
/*	font-family: "Arial", sans-serif;*/
/*}*/

/*#container {*/
/*	margin: 15px auto;*/
/*	text-align: center;*/
/*	width: 900px;*/
/*	position: relative;*/
/*}*/

/*a,*/
/*a:visited {*/
/*	color: #0196e3;*/
/*	text-decoration: none;*/
/*	outline: none;*/
/*}*/

/*a:hover {*/
/*	text-decoration: underline;*/
/*}*/

/*p {*/
/*	padding-top: 10px;*/
/*	text-align: center;*/
/*}*/

/*header {*/
/*	background: #fff url('http://timivey.com/external/codepen/thumbslider/panel.jpg') repeat-x bottom center;*/
/*	height: 30px;*/
/*	padding-top: 10px;*/
/*    border-bottom: 1px solid #ccc;*/
/*    margin: 0;*/
/*    padding: 0;*/
/*}*/
.flexslider {
   
    /*background: #eee;*/
    /*border: 4px solid #fff;*/
    
}
main{
    padding:0px;
}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modalzoom {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 5; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  /*background-color: rgba(0,0,0,0.9); */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;

  
  color: #fff;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>

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
        <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick.css" type="text/css">
<link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick-theme.css" type="text/css">

	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- FlexSlider CSS -->
<link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/flexslider.css">
<!-- FlexSlider JS -->

	<!-- Demo CSS -->
	<link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/demo.css">
	
	
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

<!--<script src="{{url('front-end/assets/js/jquery-3.3.1.js')}}"></script>-->
<script type="text/javascript">
    $(document).ready(function(){

        var cart_pro=[];
$('.addCart').click(function(){ 
var product_id=$(this).data("pro_id");
var qty=$('#quantity').val();
var price=$(this).data("price");


     $.ajax({

               type:'get',
               url:'{{url('addcart')}}',
               data:({product_id:product_id,qty:qty,price:price}),
               success:function(data){

$('#mcart').html(data);


$(".basket-footer").css("display", "block");



//         $.ajax({
 
//               type:'get',
//                  url:'{{url('addcart-total')}}',
              
//               data:({}),
//               success:function(data){


// $('#subtotal').html(data);


//                  }

//     });
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
 });
</script>


    
 <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('{{ URL::to('/') }}/front-end/assets/img/banner/01.jpg');">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="ttm-page-title-row-inner">
                            <div class="page-title-heading">
                                <h2 class="title">Products</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
        
   


  <!--   <div class="container">-->
  <!--    <h1>Magnify Image On Hover Example</h1>-->
  <!--    <div class="">-->
  <!--    <div class="zoom-box">-->
  <!--        <img  class="imageone" src="https://source.unsplash.com/6TIpY5KqCYo/600x450" width="200" height="150" />-->
  <!--    </div>-->
  <!--</div>-->
  <!--</div>-->

  
  
<section id="product-collection" class="section">
<div class="container">
<div class="row">
<div class="col-md-7 col-sm-12 col-xs-12 col-12 ">
<main>
 <article>
<div class="slider">
   <div id="slider" class="flexslider">
      <ul class="slides">
        @foreach($product_images as $pro_image)
        <li class="column">
            <img id="myImg" class="imageone" onclick="openModal();currentSlide(n)"  src="{{url('uploads/product/thumb_images/'.$pro_image->images)}}"/>
        </li>
        @endforeach 
      </ul>
   </div>
   <div id="carousel" class="flexslider flexslidersub">
      <ul class="slides">
            @foreach($product_images as $pro_image)
         <li>
            <img src="{{url('uploads/product/thumb_images/'.$pro_image->images)}}" />
         </li>
          @endforeach 
      </ul>
   </div>
   
<div id="myModalzoom" class="modalzoom">
  <span class="close">&times;</span>
  <img id="modal-img" class="modal-content"  src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQS2ol73JZj6-IqypxPZXYS3rRiPwKteoD8vezk9QsRdkjt3jEn&usqp=CAU">
    
  
  <div id="caption"></div>
</div>

</div> 
</article>
</main>
</div> 
   
   
   
    

<div class="col-md-5 col-sm-5 col-xs-12 col-12">
<div class="info-panel">
<h1 class="product-title">{{$prometa->name}}&nbsp;  <span style="color: #de5252;" class="productsubtitle">{{$prometa->sub_name}}</span> </h1>
<a href="{{url('brand-products/'.$brand->url_word)}}">View all  <span style="color: #de5252;" class="productsubtitle">{{$brand->name}}</span> Products</a>
<br>
<div class="price-ratting">
<div class="price float-left">
₹ {{$prometa->product_price_offer}}
</div>
<div class="ratting float-right">
<div class="product-star">
<i class="icon-star active"></i>
<i class="icon-star active"></i>
<i class="icon-star active"></i>
<i class="icon-star active"></i>
<i class="icon-star active"></i>
<span>({{$review_count}} Customer Review)</span>
</div>
</div></div>

@if($prometa->group_id!=0)

<div class="color-list">
<h5 class="sub-title">Select Attribute</h5>
    
      @foreach($group as $pro_group)
      <?php $pro_id = $pro_group->product_id; ?>

<button class="color active selectattri" onclick="location.href='{{url('product-view/'.$pro_id)}}'">
    <!--<img src="{{url('uploads/product/thumb_images/'.$pro_group->product_image)}}">-->
    <!--<i class="fa fa-check"></i>-->
<div class="selectattribute">    
    <p>{{$pro_group->sub_name}} </p>
</div>
    
    </button>

  @endforeach  
    

    

</div>
@endif
<div class="quntity-details">
<h5 class="sub-title">Quantity</h5>
<form id="myform" method="POST" class="quantity quantity-selector" action="#">
  <input type="button" value="-" class="qtyminus minus" field="quantity">
  <input type="number" name="quantity" id="quantity" value="1" class="qty" step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57">
  <input type="button" value="+" class="qtyplus plus" field="quantity">
</form>
    
</div>

<div class="quantity-cart">
   @if($stock >= 1)
<a data-toggle="modal" href="#myModal" class="btn btn-common addCart" data-pro_id="{{$prometa->product_id}}" data-price="{{$prometa->product_price_offer}}"><i class="icon-basket-loaded-loaded" ></i> add to cart</a>
@else
  <h6 class="outofstock">Out Of Stock</h6>
@endif

</div>

<ul class="usefull-link">
<li><a href="#"><i class="icon-envelope-open"></i> Email to a Friend</a></li>
<li><a href="#"><i class="icon-heart"></i> Wishlist</a></li>
<li><a href="#"><i class="icon-printer"></i> print</a></li>
</ul>

<div class="share-icons">
<span>share :</span>
<a href="#"><i class="fa fa-facebook"></i></a>
<a href="#"><i class="fa fa-twitter"></i></a>
<a href="#"><i class="fa fa-instagram"></i></a>
<a href="#"><i class="fa fa-pinterest"></i></a>
</div>
</div>
</div>
</div>
</div>
</section>
    
 
  
    
    
    

<div class="single-pro-tab section">
<div class="container">
<div class="row">
<div class="col-md-12 col-xs-12">
<div class="single-pro-tab-menu">

<ul class="">
<li class="active"><a href="#description" data-toggle="tab">Description</a></li>
<li><a href="#reviews" data-toggle="tab">Reviews</a></li>
</ul>
</div>

<div class="tab-content">
<div class="tab-pane active" id="description">
<div  class="pro-tab-info pro-description">
<h3 class="small-title">{{$prometa->name}}</h3>
<div style="overflow-x:auto;">
<p   class="p-description">{!!$prometa->description!!}</p>
</div>
</div>
</div>
<div class="tab-pane" id="reviews">
<div class="pro-tab-info pro-reviews">
<div class="customer-review">
<h3 class="small-title">Customer review</h3>
 @foreach($review as $re)
<ul class="product-comments clearfix">
      
<li class="mb-30">
<div class="pro-reviewer">
<img src="{{ URL::to('/') }}/front-end/assets/img/user.png" alt="">
</div>
<div class="pro-reviewer-comment">
<div class="fix">
<div class="pull-left mbl-center">
<h5><strong>{{$re->author_name}}</strong></h5>
<p class="reply-date">{{$re->created_at}}</p>
</div>
<!-- <div class="comment-reply pull-right">
<a href="#"><i class="fa fa-reply"></i></a>
<a href="#"><i class="fa fa-close"></i></a>
</div> -->
</div>
<p>{{$re->text}}</p>
</div>
</li>
 

</ul>
  @endforeach 
</div>
<div class="leave-review">
<h3 class="small-title">Leave your reviw</h3>
<div class="your-rating mb-30">
<!-- <p class="mb-10"><strong>Your Rating</strong></p>
<span>
<a href="#"><i class="fa fa-star-o"></i></a>
</span>
<span class="separator">|</span>
<span>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
</span>
<span class="separator">|</span>
<span>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
</span>
<span class="separator">|</span>
<span>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
</span>
<span class="separator">|</span>
 <span>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
<a href="#"><i class="fa fa-star-o"></i></a>
</span> -->
</div>
<div class="reply-box">
<form class="form-horizontal" action="{{url('add-review')}}" method="post">
  {{csrf_field()}}                 
<div class="form-group">
<div class="col-md-6">
<input class="form-control" type="text" name="author" placeholder="Your name here...">
<input  type="text" name="product_id" hidden="" value="{{$prometa->product_id}}">
</div>
<div class="col-md-6">
<input class="form-control" name="subject" type="text" placeholder="Subject...">
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<textarea class="form-control input-lg" name="text" rows="4" placeholder="Your review here..."></textarea>
</div>
</div>
<div class="form-group">
<div class="col-md-12">
<button class="btn btn-common" type="submit">Submit Review</button>
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
</div>
    
      <section class="new-arrival-section section">
        <div class="container">
            <h1 class="section-title">Customers Also Brought</h1>
            <hr class="lines">
            <div class="row">
                <div class="col-md-12">
                    <div id="new-products" class="owl-carousel">

                                     @foreach($product as $products)    

 <?php $pro_id = $products->product_slug; ?>   
                        <div class="item">
                            <div class="shop-product">
                                <div class="product-box">
                                    <a href="#"><img src="{{url('uploads/product/thumb_images/'.$products->product_image)}}" alt=""></a>
                                    <div class="cart-overlay">
                                    </div>
                                     @if($products->offer_product==1)
                                    <span class="sticker new"><strong>OFFER</strong></span>@endif
                                    <div class="actions">
                                        <div class="add-to-links">
                                    @if($products->web_stock>0)
                                            <a data-toggle="modal" href="#myModal"   class="btn-cart addCart" data-pro_id="{{$products->product_id}}" data-price="{{$products->product_price_offer}}"><i class="icon-basket-loaded"></i></a>
                                              @endif
                                            <a href="#" class="btn-wish"><i class="icon-heart"></i></a>
                                            <a class="btn-quickview md-trigger" href="{{url('product-view/'.$pro_id)}}" ><i class="icon-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <h4 class="product-title"><a href="{{url('product-view/'.$pro_id)}}">{{$products->name}}&nbsp;  {{$products->sub_name}}</a></h4>
                                    <div class="align-items">
                                        <div class="pull-left">
                            <span class="price">₹{{number_format($products->product_price_offer, 2, '.', ',')}}
                  @if($products->offer_product==1)<del>₹{{number_format($products->product_price, 2, '.', ',')}}</del>@endif
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
                            </div>
                        </div>
                     @endforeach 
               
                


                    </div>
                </div>
            </div>
        </div>
    </section>   
    <!--<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>-->

  <!--<script type="text/javascript" src="{{ URL::to('/') }}/front-end/assets/js/jquery.jqZoom.js"></script>-->
    <!--<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script>
    // Get the modal
var modal = document.getElementById("myModalzoom");

// Get the image and insert it inside the modal - use its "alt" text as a caption
// var img = document.getElementById("myImg");
var modalImg = document.getElementById("modal-img");
var captionText = document.getElementById("caption");
// img.onclick = function(){
//   modal.style.display = "block";
//   modalImg.src = this.src;
//   captionText.innerHTML = this.alt;
// }


document.addEventListener("click", (e) => {
  const elem = e.target;
  if (elem.id==="myImg") {
    modal.style.display = "block";
    modalImg.src = elem.dataset.biggerSrc || elem.src;
    captionText.innerHTML = elem.alt; 
  }
})

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>
    

<script>
$(document).ready(function(){
	      $('#carousel').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        itemWidth:66,
        itemMargin: 10,
        asNavFor: '#slider'
      });
      $('#slider').flexslider({
        animation: "slide",
        controlNav: false,
        animationLoop: false,
        slideshow: false,
        sync: "#carousel",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
});
</script>
    <script>
    $(document).ready(function(){
    var totalWidth = 0;
    var positions = [];
     autoplay:false,

    $('#slides .slide').each( function(i) {
        autoplay:false,
        // Get slider widths
        positions[i] = totalWidth;
        totalWidth += $(this).width();
        
        // check widths
        if( !$(this).width() ) {
            autoplay:false,
            alert('Please make sure all images have widths!');
            return false;
        }
    });
    
    // set width
    $('#slides').width(totalWidth);
    
    // menu item click handler
    $('#menu ul li a').click( function(e, keepScroll) {
        
        // remove active calls and add inactive
        $('li.product').removeClass('active').addClass('inactive');
        
        // Add active class to the partent
        $(this).parent().addClass('active');
        
        var pos = $(this).parent().prevAll('.product').length;
        
        $('#slides').stop().animate({marginLeft:-positions[pos] + 'px'}, 450);
        
        // Prevent default
        e.preventDefault();
        
        // Stopping the autoscroll
        if(!autoScroll) {
            clearInterval(itvl);
        }   
    });
    
    // Make first image active.
    $('.product').first().addClass('active').siblings().addClass('inactive');
    
    // Auto scroll
    var current = 1;
    
    function autoScroll() {
        if (current == -1) {
            return false;
        }
        
        $( '#menu ul li a' ).eq( current % $('#menu ul li a').length ).trigger('click', true);
        current++;
    }
    
    // Durration for auto scroll
    var duration = 5;
    var itvl = setInterval( function() {
        autoScroll();
    }, duration * 1000);
    
});
        </script>
    <script>
        // When webpage will load, everytime below 
        // function will be executed
        $(document).ready(function () {
  
            // If user clicks on any thumbanil,
            // we will get it's image URL
            $('.thumbnails img').on({
                click: function () {
                    let thumbnailURL = $(this).attr('src');
  
                    // Replace main image's src attribute value 
                    // by clicked thumbanail's src attribute value
                    $('.figure img').fadeOut(200, function () {
                        $(this).attr('src', thumbnailURL);
                    }).fadeIn(200);
                }
            });
        });
    </script>
    
    <script>
    $(function(){
        $(".imageone").jqZoom({
            selectorWidth: 30,
            selectorHeight: 30,
             viewerWidth: 300,
            viewerHeight: 200,
        });

    })
</script>
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
try {
  fetch(new Request("https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js", { method: 'HEAD', mode: 'no-cors' })).then(function(response) {
    return true;
  }).catch(function(e) {
    var carbonScript = document.createElement("script");
    carbonScript.src = "//cdn.carbonads.com/carbon.js?serve=CK7DKKQU&placement=wwwjqueryscriptnet";
    carbonScript.id = "_carbonads_js";
    document.getElementById("carbon-block").appendChild(carbonScript);
  });
} catch (error) {
  console.log(error);
}
</script>


@include('front-end/includes/footer')
</body>


</html>
