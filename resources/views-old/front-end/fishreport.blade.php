<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Fishing Tackle Store">
    <title>Tackle Tips- Fishing Tackle Store</title>
<meta property="og:url"           content="https://www.your-domain.com/your-page.html" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Your Website Title" />
<meta property="og:description"   content="Your description" />
<meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
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
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  @include('front-end/includes/header')




   <div class="ttm-page-title ttm-bg clearfix" style="background-image: url('{{ URL::to('/') }}/front-end/assets/img/banner/01.jpg');">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="ttm-page-title-row-inner">
                        <div class="page-title-heading">
                            <h2 class="title">FISH REPORTS</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="reporttop" style="background: #fafafa;">
    <div class="container">
    <div class="row">
        <div class="fishingreport">
             @foreach($fish_reports as $fish)
  <div class="col-sm-6 col-md-offset-3 col-md-6 col-md-offset-3">
    <div class="thumbnail">
      <img src="{{url('uploads/fishreports/'.$fish->image)}}" alt="...">
      <div class="caption">
        <!--<h3>Thumbnail label</h3>-->
        <p style="text-align:justify"</p>
       {{$fish->angler_name}}
      </div>
   <div class="fb-share-button" 
data-href="https://www.your-domain.com/your-page.html" 
data-layout="button_count">
</div>
          <div class="btn-group  btngroup" role="group" aria-label="...">
   <button class="icons"><i class="fa fa-facebook" aria-hidden="true"></i></button> 
   <button class="icons"><i class="fa fa-whatsapp" aria-hidden="true"></i></button> 
   <button class="icons"><i class="fa fa-instagram" aria-hidden="true"></i></button>
</div>
    </div>
   
  </div>
  @endforeach
  <div class="col-md-3">
       <a href="{{url('fish-report-new')}}"
 class="btn btn-primary postbutton">Add Post</a>
  </div>
  </div>
</div>
</div>
</div>

<!--<div id="content" class="product-area">-->
<!--<div class="container">-->
<!--<div class="row">-->
<!--<div class="questions-box text-center" style="margin-top:0px !important">-->
<!--<h1>Thank You!</h1>-->
<!--<a href="{{url('contact')}}" class="btn btn-common">Contact</a>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->
<!--</div>-->

   @include('front-end/includes/footer')




</body>


</html>
