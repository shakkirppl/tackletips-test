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
                            <h2 class="title">Add Post</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="formpost">
            
             
              
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          
        </div>  
            <form action="{{url('fish-report-post')}}" method="post" enctype="multipart/form-data">
    {{csrf_field()}}   
           
            <div class="col-sm-6 col-md-offset-3 col-md-6 col-md-offset-3">
                <form class="formclass">
         <div class="form-group">
  <label for="">Angler Name</label>
  <input type="text" name="angler_name" class="form-control" value="">
     </div>
      <div class="form-group">
  <label for="">Tackle Used</label>
  <input type="text" name="tackle_used" class="form-control" value="">
     </div>
       <div class="form-group">
  <label for="">Fish Name</label>
  <input type="text" name="fish_name" class="form-control" value="">
     </div>
    <div class="form-group">
  <label for=""> Place</label>
  <input type="text" name="place" class="form-control" value="">
     </div>
    <div class="form-group">
  <label for="">  Date</label>
  <input type="text" name="date" class="form-control" value="">
     </div>
       <div class="form-group">
  <label for="">     Weight</label>
  <input type="text" name="weight" class="form-control" value="">
     </div>
     

<div class="input-group mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text">Upload</span>
  </div>
  <div class="custom-file">
    <input type="file" class="custom-file-input" id="inputGroupFile01" name="image">
    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
  </div>
</div>

<input value="Submit" type="submit" class="btn " style="background:black;">


            </div>
            </form>
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
