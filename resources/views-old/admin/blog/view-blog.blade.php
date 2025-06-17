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
<link rel="stylesheet" href="{{url('assets/vendors/bower_components/select2/dist/css/select2.min.css')}}">
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<br><div><input type="file" name="image[]" value=""/><a href="javascript:void(0);" class="remove_button" title="Remove field"><img src="{{url('uploads/remove-icon.png')}}"/></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function(){ //Once add button is clicked
        if(x < maxField){ //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>

<!-- content -->
 <div class="content__inner">
                    <header class="content__title">
                       
<h1>View Blog</h1>
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

                 <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Blog Details</h4>
                         @foreach($view_blog as $view_blog)
                         
                        <table class="table table-dark mb-0">
                            
                            <tbody>
                            <tr>
                                <th scope="row">Blog Category</th>
                                <?php
                                $category = $view_blog->blog_cat;
                                $ct = DB::table('blog_category')
                                    ->where('blog_cat_id','=',$category)
                                    ->get();
                                ?>
                                <td> @foreach($ct as $ct)
                                {{ $ct->blog_cat_name }}
                                @endforeach</td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Title</th>
                              <td>
                              {{ $view_blog->blog_title }}
                                
                               
                                </td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Posted By</th>
                              
                             
                              <td>{{ $view_blog->blog_posted_by }}</td>
                              
                                
                            </tr>
                            <tr>
                                <th scope="row">blog_image</th>
                                <td><img src="{{url('/uploads/blogs/'.$view_blog->blog_image) }}" width="150px" height="100px"></td>
                                
                            </tr>
                             <tr>
                                <th scope="row">Blog Description</th>
                                <td>{{ $view_blog->blog_desc }}</td>
                                
                            </tr>
                              
                            </tbody>
                        </table>
                        @endforeach
                    </div>
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

@endsection