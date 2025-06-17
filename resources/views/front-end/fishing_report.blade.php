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
                  <h2>FISHING REPORT</h2>
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
                        <!-- <div class="login-text">
                           <h3>Login</h3>
                           <p>Please Register using account detail bellow.</p>
                        </div> -->
                        @if(Auth::check())
                        <form action="{{ route('fishing_reports.store') }}" method="POST" enctype="multipart/form-data">
                           @csrf
                           <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                           <div class="form-group mb-3">
                              <label>Name <sup>*</sup></label>
                              <input class="form-control"  type="text" name="name" required>
                           </div>
                           <div class="form-group mb-3">
                              <label>Place:</label>
                              <input class="form-control"  type="text" name="place" required>
                           </div>
                           <div class="form-group mb-3">
                              <label>Tackle Used:</label>
                              <input class="form-control"   type="text" name="tacke_used" required>
                           </div>
                           <div class="form-group mb-3">
                           <label>Image:</label>
        <input type="file" name="image" accept="image/*" required>
        
        <input type="hidden" name="in_date" id="in_date">
        <input type="hidden" name="in_time" id="in_time">
                              <!-- <div class="file-upload">
                                 <label for="fileInput" class="custom-file-label">CHOOSE IMAGE</label>
                                 <input type="file" name="image" id="fileInput" accept="image/*" required>
                                 <input type="hidden" name="in_date" id="in_date">
                                 <input type="hidden" name="in_time" id="in_time">
                              </div> -->
                           </div>
                           <button class="button-58" role="button">SUBMIT</button>
                           <label class="your-publish-content">Your add publish after verifyed</label>
                        </form>
                        @endif
                        @if(session('success'))
                        <div class="alert alert-success">
                           {{ session('success') }}
                        </div>
                        @endif
                        @if(session('error'))
                        <div class="alert alert-danger">
                           {{ session('error') }}
                        </div>
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="heading">
                     <h1>Fishing Reports</h1>
                  </div>
               </div>
            </div>
            <div class="product-categories">
               <div class="row">
                  @foreach ($fishingReports as $report)
                  <div class="col-md-3 col-6">
                     <div class="latest-blog">
                        <div class="blog-report-img">
                           <a href="#">
                           {{-- Image --}}
                           @if($report->image)
                           <img src="{{ asset($report->image) }}" alt="Fishing Report Image" width="200">
                           @else
                           <img src="{{ asset('uploads/fishing_reports/default.jpg') }}" alt="Default Image" width="200">
                           @endif
                           </a>
                        </div>
                        <div class="latest-blog-report-contents">
                           <div class="blog-report-sub-head">
                              <h3>{{ $report->name }}</h3>
                              <p><strong>Location:</strong> {{ $report->place }}</p>
                              <p><strong>Tackle Used:</strong> {{ $report->tacke_used }}</p>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endforeach
                  @if($fishingReports->isEmpty())
                  <p>No fishing reports available at the moment.</p>
                  @endif
               </div>
            </div>
         </div>
         <div class="padding-top"></div>
      </section>
      <!-- <section class="blog-container">
         <h3>Fishing Reports</h3>
         <div class="blog-grid">
          
            @foreach ($fishingReports as $report)
            <div class="blog-card">
               {{-- Image --}}
               @if($report->image)
               <img src="{{ asset($report->image) }}" alt="Fishing Report Image" width="200">
               @else
               <img src="{{ asset('uploads/fishing_reports/default.jpg') }}" alt="Default Image" width="200">
               @endif
               {{-- Content inside the card --}}
               <div class="blog-content">
                  <h3 class="blog-title">{{ $report->name }}</h3>
                  <p><strong>Location:</strong> {{ $report->place }}</p>
                  <p><strong>Tackle Used:</strong> {{ $report->tacke_used }}</p>
               </div>
            </div>
            @endforeach
         </div>
         @if($fishingReports->isEmpty())
         <p>No fishing reports available at the moment.</p>
         @endif
         </section> -->
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
      <script>
         // Automatically set the current date and time
         document.addEventListener("DOMContentLoaded", function() {
             let now = new Date();
             document.getElementById("in_date").value = now.toISOString().split("T")[0]; // YYYY-MM-DD format
             document.getElementById("in_time").value = now.toTimeString().split(" ")[0].slice(0, 5); // HH:MM format
         });
         
         // Auto-hide alerts after 5 seconds
         setTimeout(() => {
             document.querySelectorAll('.alert').forEach(alert => alert.style.display = 'none');
         }, 5000);
      </script>
   </body>
</html>