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
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick.css" type="text/css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/front-end/assets/css/slick-theme.css" type="text/css">
    
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




    <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('{{ URL::to('/') }}/front-end/assets/img/banner/01.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">Cart</h2>
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
                    <h3 class="small-title">Shopping cart</h3>
                    <p>Shopping cart-Checkout-Order complete</p>
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
                            <p>Quantity</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>Total</p>
                        </div>
                        <div class="col-md-2 col-sm-2">
                            <p>Close</p>
                        </div>
                    </div>
                </div>
                @foreach($cart as $cart)
                <?php 

$img=DB::table('items')->where('product_id','=',$cart->id)->get();

foreach ($img as $img) {
  
  $imgs=$img->product_image;
  $qty=$img->web_stock;
  $prices=$img->product_price;
  $offers=$img->product_price_offer;
   $min_pur_qty=$img->min_pur_qty;
   $pid=$img->product_id;

}


?>
<form action="{{url('update-cart')}}" method="post">
    {{csrf_field()}}

    <input type="hidden" name="rid" value="{{$cart->rowId}}">
    
    <input type="hidden" name="pid" value="{{$pid}}">

                <div class="wishlist-entry clearfix">
                    <div class="col-md-4 col-sm-4">
                        <div class="cart-entry">
                            <a class="image" href="#"><img src="{{url('uploads/product/single-product/'.$imgs)}}" alt=""></a>
                            <div class="cart-content">
                                <h4 class="title">{{$cart->name}} </h4>
                               @if($qty>0)
                        <h4 class="title instock">In stock</h4>
                        @else
                        <h4 class="title outstock">out of Stock</h4>
                        @endif
                            </div>
                        </div>
                    </div>
                    
            
                    <div class="col-md-2 col-sm-2 entry">
                        <div class="price">
                            ₹ {{$offers}} 
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2">
                
  
  <input type='number' name='quantity' value='{{$cart->qty}}' class='qty' step="1" onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>


                    </div>
                    <div class="col-md-2 col-sm-2 entry">
                        <div class="price">
                            ₹ {{$cart->qty*$offers}}
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-2 btn-entry">
                        <a class="btn-close" href="{{url('remove-cart/'.$cart->rowId)}}"><i class="icon-close"></i>
                            <?php  if($cart->price!=$offers){ ?> 
                        <input type="submit" style="background-color: #0f99de; display:none;" class="btn rd-stroke-btn border_1px dart-btn-xs" value="Update Cart">
                        <?php }else{ ?>
                         <input type="submit" style="background-color: #0f99de;" class="btn rd-stroke-btn border_1px dart-btn-xs" value="Update Cart">
                        <?php } ?>
                        </a>
                    </div>
                </div>


              </form>
              

              
         @endforeach   
            <div class="col-md-6 col-md-offset-6 col-xs-12 cart-totttal">
                            
                <div class="card card--padding fill-bg">
<table class="table-total-checkout">
<tbody>
<tr>
<th>GRAND TOTAL:</th>
<td>₹{{Cart::subtotal()}}</td>
</tr>
</tbody>
</table>
<a href="{{url('checkout')}}" class="btn btn-common btn-full">Proceed to checkout <span class="icon-action-redo"></span></a>
<a href="{{url('/')}}" class="btn btn-common btn-full continue-shoping">Continue shopping <span class="icon-action-redo"></span></a>
</div>   
               
           </div>
   
            </div>
        </div>
    </div>
    



   @include('front-end/includes/footer')




</body>


</html>
