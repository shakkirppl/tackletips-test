<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <title>Tackle Tips- Fishing Tackle Store</title>

    <link rel="shortcut icon" href="assets/img/favicon.png">
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
                            <h2 class="title">My Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="content" class="product-area">
<div class="container">
<div class="row">
<div class="col-md-3 col-sm-3 col-xs-12">
    @foreach($user as $users)
 <div class="widget-ct widget-size mb-30">
<div class="widget-s-title">
<h4>My Account</h4>
</div>
<div class="widget-info size-filter clearfix profile">
<img src="assets/img/user.png">
<div class="name">
<span>Hello,</span>    
 <p>{{$users->customer_name}} </p>   
    
    </div>    
    
</div>
</div>   
    
<div class="widget-ct widget-categories mb-30">
<div class="widget-s-title">
<h4>Address Details</h4>
</div>
<div class="widget-info address">
  
  <p><span>mbl:</span> +91 {{$users->customer_mobile}}</p>    
   <p><span>Email:</span> {{$users->customer_email}}</p>    
    </div>
</div>
@endforeach


</div>
    
    
    
<div class="col-md-9 col-sm-9 col-xs-12">
<div class="shop-content">
<div class="col-md-12">
<div class="product-option mb-30 clearfix">

<div class="showing">
<!--<p class="hidden-xs">Showing 01-09 of 17 Results</p>-->
</div>
</div>
</div>

<div class="shop-list ">
    @foreach($history as $historys)
<div class="col-md-12">
<div class="account-list">    
<div class="row">
    <div class="col-md-4">      
<div class="product-title">
<span class="date-head myaccount-span-head">Date:
{{$historys->purchase_date}}</span>
</div> 
</div> 

 <div class="col-md-4">  
<div class="fix mb-10">
<span class="price myaccount-span-head total-myaccount">Total:

₹ {{$historys->product_sub_total}}</span>
<!--<span class="old-price font-16px ml-10"><del>₹ {{$historys->product_sub_total}}</del></span>-->
</div>
<div class="product-description mb-20">
</div>
</div>
<?php $order = $historys->purchase_id;  ?>
<?php $order_st = DB::table('orders')->where('purchase_id','=',$order)->get();
foreach($order_st as $order_st) {
  $status = $order_st->order_status_id;  
   $courier = $order_st->courier_number;  
   $courier_remarks = $order_st->courier_remarks; 
}

$stat_name = DB::table('order_status')->where('order_status_id','=',$status)->get();

?>
@if($stat_name!="")
@foreach($stat_name as $stat_name)
 <div class="col-md-4">
  <div class="delivered"> 
 <div class="delivery-green"></div>     
<span class="price status myaccount-span-head">{{$stat_name->name}} </span> 
    <!--<span>Your item has been delivered</span> -->
</div>
</div>
@endforeach
@endif
</div>
<hr>
<div class="row">
   <div class="col-md-12">
<div class="product-title">
<span style="color:#000" class="price courier-head myaccount-span-head">Courier Number:

{{$courier}}</span>

</div>
<hr>
   
<div class="product-title">
    
<span style="color:#000" class="price  courier-head myaccount-span-head">Courier Remarks:

{{$courier_remarks}}</span>
</div> 
</div>
 <?php $product=json_decode($historys->products);
if($product!="") {
foreach ($product as $product) {


  $img=DB::table('items')->where('product_id','=',$product->id)->get();
 if(!$img->isEmpty()){
foreach ($img as $imgs) {
 $im=$imgs->product_image;
}
$img=$im;

 }else{

$img="null";

 }
     ?>
     
     
</div>
<hr>
<div class="row">
  @if($img!='null')
<div class="col-md-3">    
<div class="account-img">
<a href="#"><img src="{{url('uploads/product/thumb_images/'.$img)}}" alt=""></a>
</div>

 </div> 
     @endif  
    




    
<div class="col-md-3">      
<div class="product-title">
<h4 class="product-title"><a href="#">{{$product->name}}</a></h4>
</div> 
</div> 

 <div class="col-md-3">  
<div class="fix mb-10">
<span class="my-price">Qty:{{$product->qty}}</span>
<!--<span class="old-price font-16px ml-10"><del>₹ {{$historys->product_sub_total}}</del></span>-->
</div>
<div class="product-description mb-20">
</div>
</div>
 <div class="col-md-3"> 
  <div class="delivered"> 
 <!--<div class="delivery-green"></div>     -->
 <p class="my-price">₹ {{$product->price}}</p> 
    <!--<span>Your item has been delivered</span> -->
</div>
</div>
<?php }} ?>






</div>      
 </div>    
 </div>    
   @endforeach 

    

    

</div>
</div>


</div>
</div>
</div>
</div>

@include('front-end/includes/footer')




</body>


</html>
