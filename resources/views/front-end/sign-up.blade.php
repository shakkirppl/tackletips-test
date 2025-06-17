<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tackle Tips</title>
      <link rel="shortcut icon" href="{{URL::to('/')}}/front-end/images/home/favicon.png">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/main.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/main-second.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/style.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/product-detail-view.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/responsive.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/bootstrap.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/swiper-bundle-min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.carousel.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="{{URL::to('/')}}/front-end/css/aos.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Questrial&display=swap" rel="stylesheet">
   </head>
   <body>
      @include('front-end.include.header')
      <section class="product-detail-section">
         <div class="container">
            <div class="row">
               <div class="product-detail-header">
                  <h1>Sign Up</h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="login">
                     <div class="login-form-container">
                        <div class="login-text">
                           <h3>Creat a new account</h3>
                           <p>Please Register using account detail bellow.</p>
                        </div>
                        @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                        @endif
                        <form class="login-form" role="form" action="{{url('customer-registration')}}"
                           method="post" name="form1">
                           {{csrf_field()}}
                           <input type="hidden" name="redirect" value="{{ $redirect ?? '' }}">

                           <div class="form-group">
                              <div class="controls">
                                 <input type="text" class="form-control" placeholder="Name" name="name"  value="{{ old('name') }}">
                              </div>
                              @error('name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <div class="controls">
                                 <input type="text" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                              </div>
                              @error('email')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <div class="controls">
                                 <input type="text" class="form-control" placeholder="Mobile No" id="phone"
                                    name="phone" value="{{ old('phone') }}">
                              </div>
                              @error('phone')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <div class="controls">
                                 <input type="password" class="form-control" placeholder="Password"
                                    name="password" >
                              </div>
                              @error('password')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="form-group">
                              <div class="controls">
                                 <input type="password" class="form-control" placeholder="Confirm Password"
                                    d="password_confirmation" 
                                    name="password_confirmation" >
                              </div>
                              @error('password_confirmation')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="button-box">
                              <button class="button-58 " type="submit">SIGN UP</button>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      @include('front-end.include.footar')
      <script>
         AOS.init();
      </script>
      <script src="{{URL::to('/')}}/front-end/js/swiper.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/main.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.bundle.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/bootstrap.popper.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/jquery.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/owl.carousel.min.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/scriptfont.js"></script>
      <script src="{{URL::to('/')}}/front-end/js/aos.js"></script>
      <script>
         window.onscroll = function () { myFunction() };
         
         var header = document.getElementById("myHeader");
         var sticky = header.offsetTop;
         
         function myFunction() {
             if (window.pageYOffset > sticky) {
                 header.classList.add("sticky");
         
             } else {
                 header.classList.remove("sticky");
             }
         }
      </script>
   </body>
</html>