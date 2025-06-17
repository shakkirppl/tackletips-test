@extends('layouts.admin-layout')

@section('style')




@endsection

@section('content')

<style type="text/css">
    

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

<!-- content -->
 <div class="content__inner">
                    <header class="content__title">
                       
<h1>Edit Product</h1>
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
                            

                         <form action="{{url('product/image')}}" method="post" enctype="multipart/form-data" id="theform">
            
                           {{csrf_field()}}

    <input type="hidden" name="id" value="{{$items->id}}">
 

                     <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Image1</label>

                    <div class="col-sm-4">
             <input name="image_url"  class="file-name input-flat ui-autocomplete-input" type="file" readonly="readonly" placeholder="Browses photo" autocomplete="off">

                    </div>
                    @if(count($ProductImages)>0)
                      <div class="col-sm-4">
             <image src="{{url('uploads/product/thumb_images/'.$ProductImages[0]->images)}}"width="100px" height="100px"></image>
             <a href="{{url('product_image_delete/'.$ProductImages[0]->image_id)}}" class="pull-right delete_form">Delete</a>
<input type="hidden" name="img1" value="{{$ProductImages[0]->image_id}}">
                    </div>
                
     @endif
             </div>
                
                 <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Image2</label>

                    <div class="col-sm-4">
              <input name="image_more1"  class="file-name input-flat ui-autocomplete-input" type="file" readonly="readonly" placeholder="Browses photo" autocomplete="off">

                    </div>
                     @if(count($ProductImages)>1)
                                <div class="col-sm-4">
             <image src="{{url('uploads/product/thumb_images/'.$ProductImages[1]->images)}}"width="100px" height="100px"></image>
             <a href="{{url('product_image_delete/'.$ProductImages[1]->image_id)}}" class="pull-right delete_form">Delete</a>
                    </div>
        <input type="hidden" name="img2" value="{{$ProductImages[1]->image_id}}">
               @endif
               </div>
                   <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Image3</label>

                    <div class="col-sm-4">
              <input name="image_more2"  class="file-name input-flat ui-autocomplete-input" type="file" readonly="readonly" placeholder="Browses photo" autocomplete="off">

                    </div>
                     @if(count($ProductImages)>2)
                                <div class="col-sm-4">
            <image src="{{url('uploads/product/thumb_images/'.$ProductImages[2]->images)}}"width="100px" height="100px"></image>
             <a href="{{url('product_image_delete/'.$ProductImages[2]->image_id)}}" class="pull-right delete_form">Delete</a>
<input type="hidden" name="img3" value="{{$ProductImages[2]->image_id}}">
                    </div>
                
               @endif
               </div>
                <div class="form-group">
                    <label class="col-sm-4 control-label no-padding-right" for="form-field-1"> Image4</label>

                    <div class="col-sm-4">
              <input name="image_more3"  class="file-name input-flat ui-autocomplete-input" type="file" readonly="readonly" placeholder="Browses photo" autocomplete="off">

                    </div>
                     @if(count($ProductImages)>3)
                                <div class="col-sm-4">
            <image src="{{url('uploads/product/thumb_images/'.$ProductImages[3]->images)}}"width="100px" height="100px"></image>
             <a href="{{url('product_image_delete/'.$ProductImages[3]->image_id)}}" class="pull-right delete_form">Delete</a>
<input type="hidden" name="img4" value="{{$ProductImages[3]->image_id}}">
                    </div>
              
               @endif
              </div>
            
                            


                            <input type="submit" class="btn btn-primary btn-block" value"Update" id="btnsubmit">

                          
                 
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

        <script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#stock").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 44 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
       <script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg1").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
       <script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#price_arabic").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
  <script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#offer").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg3").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
  <script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#offer_arabic").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        //display error message
        $("#errmsg4").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
});</script>
        <script>
    
  $(function()
  {
  
    $('#theform').submit(function(){
    
    $("input[type='submit']", this)
      
    .val("Please Wait...")
      
    .attr('disabled', 'disabled');
    
    return true;
  
    });
  
});
    

</script>

@endsection