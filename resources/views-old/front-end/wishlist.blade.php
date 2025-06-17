<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <title>Tackle Tips- Fishing Tackle Store</title>

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
</head>

<body>

@include('front-end/includes/header')




    <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('{{ URL::to('/') }}/front-end/assets/img/banner/01.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title"> wishlist</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="content">
<div class="container">
<div class="row">
<div class="header text-center">
<h3 class="small-title">Wishlist</h3>
</div>
<div class="col-md-12">
<div class="wishlist">
<div class="col-md-4 col-sm-4 text-center">
<p>Product</p>
</div>
<div class="col-md-2 col-sm-2">
<p>Price</p>
</div>
<div class="col-md-2 col-sm-2">
<p>Stock status</p>
</div>
<div class="col-md-2 col-sm-2">
<p>Close</p>
</div>
</div>
@foreach($wishlist as $wislists)
 <?php $pro_id =$wislists->product_id; ?>
<div class="wishlist-entry clearfix">
<div class="col-md-4 col-sm-4">
<div class="cart-entry">
<a class="image" href="{{url('product-view/'.$pro_id)}}"><img src="{{url('uploads/product/thumb_images/'.$wislists->product_image)}}" alt=""></a>
<div class="cart-content">
<a href="{{url('product-view/'.$pro_id)}}"><h4 class="title">{{$wislists->name}}</h4></a>

</div>
</div>
</div>
<div class="col-md-2 col-sm-2 entry">
<div class="price">

₹{{number_format($wislists->product_price_offer, 2, '.', ',')}} @if($wislists->offer_product==1)<del>₹{{number_format($wislists->product_price, 2, '.', ',')}}</del>@endif
</div>
</div>
<div class="col-md-2 col-sm-2 entry">
    <?php if($wislists->web_stock>0){ ?>
<a class="instock" href="#">In stock</a>
<?php }else{ ?>
<a class="stock" href="#">Out of stock</a>
     <?php } ?>
</div>
<div class="col-md-2 col-sm-2 entry">
       <a href="{{url('wish-list-delete/'.$wislists->whishlist_id)}}"><i class="fa fa-trash-o"></i></a>

</div>
</div>

     @endforeach   



</div>
</div>
</div>
</div>

@include('front-end/includes/footer')




</body>


</html>
