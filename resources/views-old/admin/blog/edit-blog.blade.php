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
                       
<h1>Edit Blog</h1>
                        <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                       {{--  <a class="btn btn-primary float-right" data-toggle="collapse" href=".a" role="button" aria-expanded="false" aria-controls="collapseExample">
                                   Arabic
                                </a>   --}}
                    </div>

                   
  

                    </header>

                    <!-- arabic -->



 <!-- arabic end -->



                    <div class="card">
                        <div class="card-body">
                            

                         <form action="{{url('/update-blog')}}" method="post" enctype="multipart/form-data">
                            @foreach($ed_blog as $ed_blog)
                           {{csrf_field()}}

                            

                             <div class="form-group">
                                <label>Parent Category</label>
                                 <input type="hidden" name="blog_id" value="{{$ed_blog->id}}">
                                <select class="form-control" name="category_name" data-toggle="tooltip" title="category">
                                    <?php 
                                        $parnt_nme = DB::table('blog_category')
                                                    ->where('blog_cat_id','=',$ed_blog->blog_cat)
                                                    ->get();
                                    ?>
                                    @foreach($parnt_nme as $parnt_nme)
                                    <option selected="" value="{{ $parnt_nme->blog_cat_id }}" style="color: #32c787;">{{ $parnt_nme->blog_cat_name }}</option>
                                    @endforeach
                                    <option value="0">Select a Category</option>
                                    @foreach($cat as $cat)
                                    <option value="{{$cat->blog_cat_id}}">{{$cat->blog_cat_name}}</option>
                                    @endforeach
                                   
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="blog_title" value="{{$ed_blog->blog_title}}" class="form-control"  required="">
                                <i class="form-group__bar"></i>
                            </div>

                             <div class="form-group">
                                <label>Posted By</label>
                                <input type="text" name="posted_by" value="{{$ed_blog->blog_posted_by}}"  class="form-control"  required="">
                                <i class="form-group__bar"></i>
                            </div>

                            
                             <div class="form-group">
                                <label>Blog Image</label><br>
                                <input type="file" name="bgimage" title="Image" value="{{ $ed_blog->blog_image}}">

                                 
                                <i class="form-group__bar"></i>
                            </div>
                            <span><img src="{{url('/uploads/blogs/'.$ed_blog->blog_image) }}" alt="" width="150px" height="100px"></span>
                            
                          <div class="form-group">
                                <label>Blog Description</label>
                                <textarea class="form-control" name="blog_desc" id="summernote" >{{ $ed_blog->blog_desc}}</textarea>
                                <i class="form-group__bar"></i>
                            </div>


                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> Update</button>

                          
                            @endforeach
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
        <script src="{{url('assets/vendors/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
         <script src="{{url('assets/vendors/bower_components/dropzone/dist/min/dropzone.min.js')}}"></script>

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