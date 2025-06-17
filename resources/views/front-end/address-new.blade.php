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
                  <h1>Welcome - <span class="user-name">{{Auth::user()->name}}</span> </h1>
               </div>
            </div>
         </div>
      </section>
      <section>
         <div class="padding-top"></div>
         <div class="container">
            <div class="address-new-main">
               <div class="row">
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="shipping-address">
                        <div class=" ">
                           <h3 class="small-title">Shipping Address</h3>
                        </div>
                        <form class="form-sub" action="{{ url('add.new.shipping-address') }}" method="POST">
                           @csrf
                           <input type="hidden" name="mode" value="{{$mode}}">
                           <div class="form-group mb-3">
                              <label>Name <sup>*</sup></label>
                              <input class="form-control" name="customer_name" type="text" value="{{ old('customer_name') }}" required>
                              @error('customer_name')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="form-group mb-3">
                              <label>Address <sup>*</sup></label>
                              <textarea class="form-control" name="customer_address" required> </textarea>
                              @error('customer_address')
                              <span class="text-danger">{{ $message }}</span>
                              @enderror
                           </div>
                           <div class="row " >
                              <div class="col-md-6">
                                 <div class="form-group mb-3">
                                    <label>City <sup>*</sup></label>
                                    <input class="form-control" name="customer_city" type="text" value="{{ old('customer_city') }}" required>
                                    @error('customer_city')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group mb-3 ps-2">
                                    <label>Zip/Postal Code <sup>*</sup></label>
                                    <input class="form-control" name="customer_pincode" type="text" value="{{ old('customer_pincode') }}" required>
                                    @error('customer_pincode')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group  mb-3 ">
                                    <label>Telephone <sup>*</sup></label>
                                    <input class="form-control" name="customer_mobile" type="text" value="{{ old('customer_mobile') }}" required>
                                    @error('customer_mobile')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group  mb-3 ps-2">
                                    <label>State/Province <sup>*</sup></label>
                                    <div class="btn-group bootstrap-select">
                                       <select class="selectpicker checkout-selector" name="customer_state"
                                          id="shipping_state" required="" tabindex="-98">
                                          <option>Select</option>
                                          @foreach($state as $stat)
                                          <option value="{{$stat->id}}">{{$stat->name}}</option>
                                          @endforeach
                                       </select>
                                    </div>
                                    @error('customer_state')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label>District <sup>*</sup></label>
                                    <br>
                                    <div class="btn-group bootstrap-select">
                                       <select class="selectpicker checkout-selector" name="customer_dist"
                                          id="shipping_district" required="" tabindex="-98">
                                       </select>
                                    </div>
                                 </div>
                                 @error('customer_dist')
                                 <span class="text-danger">{{ $message }}</span>
                                 @enderror
                              </div>
                           </div>
                           <button  type="submit" class=" button-58 complete-order">
                           Submit
                           </button>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
         <div class="padding-top"></div>
      </section>
      @include('front-end.include.footar')
      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
         document.querySelectorAll('.dropdown-box-order').forEach(function (dropdownBox) {
             dropdownBox.addEventListener('click', function (event) {
                 const dropdown = this.parentElement;
                 dropdown.classList.toggle('active');
         
                
                 event.stopPropagation();
             });
         });
         
         
         document.addEventListener('click', function () {
             document.querySelectorAll('.dropdown-container-order').forEach(function (dropdown) {
                 dropdown.classList.remove('active');
             });
         });
      </script>
      <script>
         $(document).ready(function () {
             $('#shipping_state').on('change', function () {
                 var stateId = $(this).val();
                 if (stateId) {
                     $.ajax({
                       url: "{{ url('/get-districts') }}/" + stateId,
                         type: 'GET',
                         dataType: 'json',
                         success: function (data) {
                             $('#shipping_district').empty().append('<option>Select</option>');
                             $.each(data, function (key, value) {
                                 $('#shipping_district').append('<option value="' + value.id + '">' + value.name + '</option>');
                             });
                         }
                     });
                 } else {
                     $('#shipping_district').empty().append('<option>Select</option>');
                 }
             });
         });
      </script>
   </body>
</html>