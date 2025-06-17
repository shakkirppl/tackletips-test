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
<script src="{{url('front-end/assets/js/jquery-3.3.1.js')}}"></script>
<script type="text/javascript">
$(document).ready(function(){
  
$('#shipping_state').on('change', function() {
      var country_id = this.value;

$.ajax({
 url:"{{url('getdeliverycharge')}}" + '/' + country_id,
// url: 'country_id/getdeliverycharge',
type: "GET",
// data: {
// country_id: country_id,
// _token: '{{csrf_token()}}' 
// },
dataType : 'json',
success: function(data){
$('#delivery_charge').val(data);
$('#deli_charge').html('₹'+data);
  var total = parseFloat($('#total').val());
  var deli_charge = parseFloat(data);

var grand_total=deli_charge+total;
$('#grand_total').html('₹'+grand_total);
$('#oder_total').html('₹'+grand_total);

$('#grand_order_total').val(grand_total);

},
error:function (error) {
                    alert('error');
     }
});

 


$("#shipping_district").html('');
$.ajax({
url:"{{url('get-district-by-state')}}",
type: "POST",
data: {
country_id: country_id,
_token: '{{csrf_token()}}' 
},
dataType : 'json',
success: function(result){
$('#shipping_district').html('<option value="">Select District</option>'); 
$.each(result.states,function(key,value){
$("#shipping_district").append('<option value="'+value.id+'">'+value.name+'</option>');
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
                            <h2 class="title"> Checkout</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<form action="{{url('shop-complete')}}" method="post">
                  {{csrf_field()}}
                  <input type="radio" hidden="" name="payment" checked="" value="cod" required>
<div id="content">
<div class="container">
<div class="row">
    <div class="col-md-6 col-sm-6 col-sx-12">
<input type="hidden" name="delivery_charge" id="delivery_charge">
<div class="order-details">
<h2 class="title-checkout"><i class="icon-basket-loaded-loaded"></i>Your Order</h2>
<div class="order_review margin-bottom-35">
<table class="table table-responsive table-review-order">
<thead>
<tr>
<th class="product-name">Product</th>
<th class="product-total">Total</th>
</tr>
</thead>
<tbody>
      
     @foreach($cart as $cart)

<tr>
<td><p>{{$cart->name}}  <strong>({{$cart->qty}})</strong></p></td>

<td><p class="price">₹{{number_format($cart->price, 2, '.', ',')}}</p></td>
</tr>
@endforeach  
</tbody>
<tfoot>
 <tr>
<th>Subtotal</th>
<td>
     <?php  $subtotal = str_replace( ',', '', Cart::subtotal() );?>
<p class="price">₹{{number_format($subtotal, 2, '.', ',')}}</p>
</td>
</tr>
<tr>
    @if($rod!=0)
    <tr>
        <th>Rod Packing Charge </th>
        <th><p class="price">₹{{number_format($rod, 2, '.', ',')}}</p></th>
    </tr>
    @endif
    <input type="hidden" name="rod_packing_charge" id="rod_packing_charge" value="{{$rod}}">
<th>Delivery Charge</th>
<td>

<label> <span id="deli_charge">Depending on Selected State</span> </label>

</td>
</tr>
<tr>
<th>Total</th>
<td><input type="hidden" name="total" id="total" value="{{$total}}">
    <span class="price" id="grand_total">₹{{number_format($total, 2, '.', ',')}}</span>
<input type="hidden" name="grand_order_total" id="grand_order_total" value="{{$total}}"></td>
</tr>


</tfoot>
</table>
<div class="checkout-btn-continue">
<a href="{{url('/')}}" class="btn btn-common btn-full continue-shoping">Continue shopping <span class="icon-action-redo"></span></a>
</div> 
</div>
</div>
</div>

<div class="col-md-6 col-sm-6 col-xs-12">

<h2 class="title-checkout"><i class="icon-home"></i>Shipping Address</h2>
<form>
 <div class="form-group">
<label>Name <sup>*</sup></label>
<input class="form-control" name="shipping_name" type="text" value="{{$user->shipping_name}}">
</div>



<div class="form-group">
<label>Address <sup>*</sup></label>
<input class="form-control" name="shipping_address" type="text" value="{{$user->shipping_address}}">
</div>


<div class="row">
<div class="col-md-6">
<div class="form-group">
<label>City <sup>*</sup></label>
<input class="form-control" name="shipping_city" type="text" value="{{$user->shipping_city}}">
</div>

</div>
<div class="col-md-6">
<div class="form-group">
<label>Zip/Postal Code <sup>*</sup></label>
<input class="form-control" name="shipping_pin" type="text" value="{{$user->shipping_pin}}">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>Telephone <sup>*</sup></label>
<input class="form-control" name="shipping_phone" type="text" value="{{$user->shipping_phone}}">
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label>State/Province <sup>*</sup></label>
 

<select class="selectpicker" name="shipping_state" id="shipping_state" required="">
    <!-- <option selected="selected" value="18">Kerala</option> -->
     <option >Select</option>
     @foreach($state as $stat)
<option  value="{{$stat->id}}">{{$stat->name}}</option>
@endforeach  
</select>
</div>
</div>
<div class="col-md-6">
<div class="form-group">
<label for="state">District</label>
<select class="form-control" id="shipping_district" name="shipping_district" required="">
</select>
</div>      
</div> 

</div>
</form>
</div>
</div>
<!--<div class="mb-50"></div>-->
<div class="row">
<div class="col-md-6 col-sm-6 col-sx-12 ">

<h2 class="title-checkout">
<i class="icon-credit-card"></i>
Preferred Delivery Partner
</h2>

<div class="form-group form-group-top clearfix">
<div class="radio">
<label><input checked=""  type="radio" id="any" name="courier_service" value="Any"><span>Any</span></label>
</div>
<div class="radio">
<label><input  type="radio" id="professional" name="courier_service" value="Professional"><span>Professional Courier</span></label>
</div>
<div class="radio">
<label><input  type="radio" id="delhivery" name="courier_service" value="Delhivery"><span>Delhivery services</span></label>
</div>
<div class="radio">
<label><input  type="radio" id="dtdc" name="courier_service" value="Dtdc"><span>Dtdc Courier Service(Our Preferred Partner) </span></label>
</div>
<div class="radio">
<label><input  type="radio" id="speedpost" name="courier_service" value="SpeedPost"><span>Speed Post</span></label>
</div>
<!-- <div class="radio">
<label><input type="radio"> <span>Flat Rate: $10.00</span></label>
</div> -->
</div>



</div>

<div class="col-md-6 col-sm-6 col-sx-12">






<div class="card card--padding fill-bg">
<table class="table-total-checkout">
<tbody>
<tr>
<th class="title-checkout grand-total">GRAND TOTAL:</th>
<td><span id="oder_total grand-total">₹{{number_format($total, 2, '.', ',')}}</span></td>
</tr>
</tbody>
</table>

<button type="submit" style="" class="btn btn-common btn-full">Place Order Now <span class="icon-action-redo"></span></button>
</div>

</div>
</div>
</div>
</div>
  </form>

 @include('front-end/includes/footer')




</body>


</html>
