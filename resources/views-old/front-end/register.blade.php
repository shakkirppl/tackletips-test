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
                            <h2 class="title"> Register</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="content">
<div class="container">
<div class="row">
<div class="col-md-6">
<div class="login">
<div class="login-form-container">
<div class="login-text">
<h3>Login</h3>
<p>Please Register using account detail bellow.</p>
</div>

<form  class="login-form" role="form" action="{{url('customer-login')}}" method="post">
   {{csrf_field()}}
       <input type="hidden" name="from" value="{{$type}}">
<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="Email/Mobile No" name="emmail_login">
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="password" class="form-control" placeholder="Password" name="password_login">
</div>
</div>
<div class="button-box">
<div class="login-toggle-btn">
<input type="checkbox">
<label>Remember me</label>
<a href="{{url('forgot-password')}}">Forgot Password?</a>
</div>
<button type="submit" class="btn btn-common log-btn">Login</button>
</div>
</form>

</div>
</div>
</div>
<div class="col-md-6">
<div class="login">
<div class="login-form-container">
<div class="login-text">
<h3>Creat a new account</h3>
<p>Please Register using account detail bellow.</p>
</div>

 <form class="login-form" role="form" action="{{url('customer-registration')}}" method="post" name="form1">
   {{csrf_field()}}
   <input type="hidden" name="from" value="{{$type}}">
<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="Username" name="name">
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="password" class="form-control" placeholder="Password" name="password">
</div>
</div>
<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="Mobile No" name="customer_mobile">
</div>
</div>

<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="Email" name="email">
</div>
</div>
<div class="button-box">
<button type="submit" class="btn btn-common log-btn">Register</button>
</div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
 @include('front-end/includes/footer')




</body>


</html>
