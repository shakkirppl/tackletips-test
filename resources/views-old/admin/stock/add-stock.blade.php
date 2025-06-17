@extends('layouts.admin-layout')

@section('style')
  <!-- Vendor styles -->

        
        
    <!--     
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/dropzone/dist/dropzone.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/nouislider/distribute/nouislider.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/material-design-iconic-font/dist/css/material-design-iconic-font.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/animate.css/animate.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/select2/dist/css/select2.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/bower_components/trumbowyg/dist/ui/trumbowyg.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/vendors/flatpickr/flatpickr.min.css')}}" />
        <!-- App styles -->
        <!-- <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">
        <link rel="stylesheet" href="{{url('assets/demo/css/demo.css')}}">  -->




@endsection

@section('content')

<style type="text/css">
    
#editor {
    max-height: 250px;
    height: 250px;
    background-color: white;
    border-collapse: separate; 
    border: 1px solid rgb(204, 204, 204); 
    padding: 4px; 
    box-sizing: content-box; 
    -webkit-box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset; 
    box-shadow: rgba(0, 0, 0, 0.0745098) 0px 1px 1px 0px inset;
    border-top-right-radius: 3px; border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px; border-top-left-radius: 3px;
    overflow: scroll;
    outline: none;
}
#voiceBtn {
  width: 20px;
  color: transparent;
  background-color: transparent;
  transform: scale(2.0, 2.0);
  -webkit-transform: scale(2.0, 2.0);
  -moz-transform: scale(2.0, 2.0);
  border: transparent;
  cursor: pointer;
  box-shadow: none;
  -webkit-box-shadow: none;
}

div[data-role="editor-toolbar"] {
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

.dropdown-menu a {
  cursor: pointer;
}

    
</style>


<!-- content -->
 <div class="content__inner">
                    <header class="content__title">
                       
<h1>Add Quantity & Price</h1>
                        <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                        <a class="btn btn-primary float-right" data-toggle="collapse" href=".a" role="button" aria-expanded="false" aria-controls="collapseExample">
                                   Arabic
                                </a>  
                    </div>

                   
  

                    </header>

                    <!-- arabic -->



 <!-- arabic end -->





                    <div class="card">
                        <div class="card-body">
                            

                          <form action="{{url('/add-new-stock')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}


                                    <div class="form-group">
                                    <select class="form-control" name="select_product" placeholder="Meta Tag Keywords" required="">
                                    <option value="">Select Product</option>
                                   @foreach($prod as $prod)
                                   <option value="{{ $prod->product_id}}">{{ $prod->product_name }}</option>
                                   @endforeach      
                                </select>
                                        <i class="form-group__bar"></i>
                                    </div> 

                            <div class="form-group">
                                <input type="number" name="total_quantity" class="form-control" placeholder="Enter Total Quantity" required="">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="date" name="added_date" class="form-control" placeholder="Enter Total Quantity" required="" data-toggle="tooltip" title="Enter Add Date">
                                <i class="form-group__bar"></i>
                            </div>



                            <div class="form-group">
                                <select class="form-control" name="stock_status" placeholder="Meta Tag Keywords" required="">
                                    <option value="">Status</option>
                                    <option value="1">Enable</option>
                                    <option value="0">Disable</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>


                            

                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> Save</button>

                          

                          </form>

                          

                          </form>
                      
                      
                        </div>

                    </div>

                 

                </div>


<!-- content-end -->


 

@endsection

@section('script')


  <!-- Vendors -->
        


        <script src="{{url('assets/vendors/bower_components/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/moment/min/moment.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/nouislider/distribute/nouislider.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/trumbowyg/dist/trumbowyg.min.js')}}"></script>
        <script src="{{url('assets/vendors/flatpickr/flatpickr.min.js')}}"></script>

        <script src="{{url('assets/vendors/bower_components/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>

        <script src="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script>

        <script src="{{url('assets/vendors/bower_components/autosize/dist/autosize.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap-wysiwyg.js')}}"></script>

@endsection