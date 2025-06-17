<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
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
                                <h2 class="title"> @if ($cat){{$cat->name}}@endif</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   

    
   


    <section id="shop-collection" class="products-list">
        <div class="container">
            
            <div class="row">
                
                    <div class="col-md-3">
                      	<div class="column medium-4">
						<div class="search_type sort">
							<label>Sort by:</label>
							 <form method="GET" action="#">
            <select name="sort" onchange="this.form.submit()">
                <option value="newest" {{ request('sort') == 'newest' ? 'selected' : '' }}>Newest</option>
                <option value="price_low_high" {{ request('sort') == 'price_low_high' ? 'selected' : '' }}>Price: Low to High</option>
                <option value="price_high_low" {{ request('sort') == 'price_high_low' ? 'selected' : '' }}>Price: High to Low</option>
            </select>
        </form>
							<!--<select id="sort-price" name="sort-price" class="fancySelect sort mixSortSelect">-->

							<!--	<option selected value="price:desc">High to Low</option>-->
							<!--	<option value="price:asc">Low to High</option>-->
								
							<!--</select>-->

						</div>
					</div>  
                    </div>
                    
                    
                     <div class="col-md-9">
                         <h1 class="section-title">@if ($cat){{$cat->name}}@endif Products</h1>
                         <hr class="lines">
                    </div>
                    
                    
                </div>
      
           
            <div class="row">
                
              <div class="col-md-3 col-sm-3 col-xs-12">

<div class="widget-ct widget-categories mb-30 product-categry-sidebar" data-toggle="collapse" data-parent="#accordion" data-target="#collapsezero">
<div class="widget-s-title">
<h4>Categories</h4>
</div>
 <div id="collapsezero" >
@foreach($category as $categories)
 <?php $cat_id = $categories->id; ?>
<ul id="accordion-category" class="product-cat">
<li class="panel">
<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-category" href="#{{$cat_id}}">{{$categories->name}} <span><i class="icon-arrow-down"></i></span></a>
<div id="{{$cat_id}}" class="panel-collapse collapse">
<?php $reels=DB::table('sub_category')->where('parent_id',$categories->id)->orderby('sort_order','asc')->get(); ?>
<ul class="listSidebar">
      @foreach($reels as $reel)
               <?php $cat1 = $reel->id; ?>
                
<li><a href="{{url('category-products/'.$cat1)}}">{{$reel->name}}<span style="float: right;color: #de5252;
    font-size: 15px;"></span></a></li>
@endforeach

</ul>
</div>
</li>


</ul>
@endforeach
</div>
</div>


<div class="brand widget-ct widget-categories mb-30" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
<div class="widget-s-title">
<h4>BRANDS</h4>
</div>
  <div id="collapseOne" >
@foreach($brands as $brand)

<ul id="accordion-category" class="product-cat">
<li class="panel" >
    
<a class="accordion-toggle"  href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}<span style="float: right;color: #de5252;
    font-size: 15px;"> </span></a>
</li>
</ul>
@endforeach
</div>
</div>

</div>  
                
   <div class="col-md-9 col-sm-9 col-xs-12">
<div class="shop-content">             
                @foreach($product as $new_pro)
                <?php $pro_id =$new_pro->product_slug; ?>
                <div class="col-md-4 col-sm-6 col-xs-6">
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
              <div class="paginationclass">
                 {{ $product->links() }}
             </div>
                     <div class="brand-end widget-ct widget-categories mb-30" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
<div class="widget-s-title">
<h4>BRANDS</h4>
</div>
  <div id="collapseOne" >
@foreach($brands as $brand)

<ul id="accordion-category" class="product-cat">
<li class="panel" >
    
<a class="accordion-toggle"  href="{{url('brand-products/'.$brand->url_word)}}">{{$brand->name}}<span style="float: right;color: #de5252;
    font-size: 15px;"> </span></a>
</li>
</ul>
@endforeach
</div>
</div>
        </div>
        

        
        
                 </div>
             </div>
    </section>





@include('front-end/includes/footer')
</body>


</html>
