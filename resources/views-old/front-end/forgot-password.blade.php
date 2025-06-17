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




    <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('assets/img/banner/01.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title"> Forgot pasword</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="content">
<div class="container">
<div class="row">
<div class="col-md-12 col-lg-6 col-lg-offset-3">
<div class="login">
<div class="login-form-container">
<div class="login-text">
<h3>Forgot Pasword</h3>
<p>Please Enter Registered mail account detail bellow.</p>
</div>

<form  class="login-form" role="form" action="{{url('forgot-password-post')}}" method="post">
   {{csrf_field()}}
<div class="form-group">
<div class="controls">
<input type="text" class="form-control" placeholder="e-mail" name="name">
</div>
</div>
<div class="form-group">

<div class="button-box">

<button type="submit" class="btn btn-common log-btn">Send</button>
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
