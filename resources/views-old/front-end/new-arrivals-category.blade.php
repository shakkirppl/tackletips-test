<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <meta name="description" content="Tackle Tips is the no: one Online Fishing tackle store in India. We sell Gear, reels, Rods, Lines &other fishing accessories from all Leading Brands.">
    <title>Online Fishing Equipment -Tackletips </title>

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
                 url:'{{url('addcart-total')}}',
              
               data:({}),
               success:function(data){


$('#subtotal').html(data);


                 }

    });
   $.ajax({

               type:'get',
             url:'{{url('addcart-count')}}',
             
               data:({}),
               success:function(data){


$('#count').html(data);
$('#coaunt').html(data);

$('#countt').html(data);
$('#count2').html(data);
$('#countm').html(data);
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
                                <h2 class="title"> New Arrivals</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

    
   

<!--category-->
    <section id="shop-collection" class="products-list">
        <div class="container">
            <!--<h1 class="section-title">{{$category->name}}</h1>-->
            <hr class="lines">
            <div class="row">
                
                
   <div class="col-md-12 col-sm-12 col-xs-12">
<div class="shop-content">             
                @foreach($product as $new_pro)
                <?php $pro_id =$new_pro->product_slug; ?>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="shop-product">
                        <div class="product-box">
                            <a href="#"><img src="{{url('uploads/product/thumb_images/'.$new_pro->product_image)}}" alt="{{$new_pro->name}}"></a>
                            <div class="cart-overlay">
                            </div>
                             
                     
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
      </br>
    
         

         
         
            </div>
              
        </div>
                 </div>
             </div>
    </section>

@include('front-end/includes/footer')
</body>


</html>
