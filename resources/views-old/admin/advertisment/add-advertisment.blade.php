@extends('layouts.admin-layout')

@section('style')





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
                       
<h1>Add Advertisment</h1>
                        <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                       
                    </div>

                   
  

                    </header>

                    <!-- arabic -->



 <!-- arabic end -->



                    <div class="card">
                        <div class="card-body">
                            

                         <form action="{{url('/add-new-ads')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

                            <div class="form-group">
                                <select  name="page" class="form-control" placeholder="Advertisment Page" required="">
                                  <option value="">Select Page</option>
                                  <option value="home-top-eng">Home page - top ( ENGILSH ) - 391 x 178</option>
                                  <option value="home-top-arabic">Home page - top ( ARABIC ) - 391 x 178</option>
                                   <option value="home-bottom-eng">Home page - bottom ( ENGILSH ) - 382 x 310</option>
                                   <option value="home-bottom-arabic">Home page - bottom ( ARABIC ) - 382 x 310</option>
                                   <option value="product-list-eng">Product List Page ( ENGILSH ) - 243 x 366</option>
                                    <option value="product-list-arabic">Product List Page ( ARABIC ) - 243 x 366</option>
                                     <option value="app">App Image - 620 x 220</option>
                                    <hr/>
                                     <option value="best-collection">Best collection-background (1263 x 300)</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>
                           
                            
                          
                            
                           
                             <div class="form-group">
                                <input type="file" name="image" id="dropzone-upload" class="dropzone dz-clickable" placeholder="image">
                                <i class="form-group__bar"></i>
                            </div>
                            
                            <div class="form-group">
                                <select class="form-control" name="url" required="">
                                    <option value="">----Select Ad URL Link----</option>
                                    @foreach($products as $productss)
                                    <option value="{{$productss->product_id}}">{{$productss->product_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                         
                          


                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> Save</button>

                          

                          </form>
                      
                        </div>

                    </div>

                 

                </div>


<!-- content-end -->


 

@endsection

@section('script')


  <!-- Vendors -->
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