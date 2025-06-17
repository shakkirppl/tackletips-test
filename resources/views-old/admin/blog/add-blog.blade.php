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
                       
<h1>Add Blog</h1>
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
                            

                         <form action="{{url('/add-new-blog')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

                            <div class="form-group">
                                <label>Select category</label>
                                <select class="form-control" name="category_name" required="">
                                    <option disabled>---Select---</option>
                                    @foreach($blog_category as $blog_category)
                            <option value="{{ $blog_category->blog_cat_id}}">{{ $blog_category->blog_cat_name}}</option>
                            @endforeach
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="blog_title" class="form-control"  required="">
                                <i class="form-group__bar"></i>
                            </div>


                            <div class="form-group">
                                <label>Posted By</label>
                                <input type="text" name="posted_by" class="form-control"  required="">
                                <i class="form-group__bar"></i>
                            </div>


                             <div class="form-group">
                                 <label>Blog Image</label><br>
                                <input type="file" name="bgimage" id="imgInp" class="dropzone dz-clickable" required="" placeholder="Meta Tag Keywords"><br>
            
                                <i class="form-group__bar"></i>
                            </div> 

                              <div class="form-group">
                                <label>Blog Description</label>
                                <textarea class="form-control" name="blog_desc" id="summernote" ></textarea>
                                <i class="form-group__bar"></i>
                            </div>

                         

                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i>Save</button>

                          

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
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

 <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>
@endsection