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
                            

                         <form action="{{url('/update-product')}}" method="post" enctype="multipart/form-data" id="theform">
                            @foreach($ed_prod as $ed_prod)
                           {{csrf_field()}}

    <input type="hidden" name="item_id" value="{{ $ed_prod->id}}" class="form-control"  required="">
 

                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" name="product_name" data-toggle="tooltip" title="Product Name" value="{{ $ed_prod->name}}" class="form-control" placeholder="Product Name" required="">
                                <i class="form-group__bar"></i>
                            </div>

                   

                            <div class="form-group">
                                <label>Brand</label>
                                <select  name="product_brand" class="form-control" required="">
                                    <?php 
                                        $brand_name = DB::table('brands')
                                                    ->where('id','=',$ed_prod->brand_id)
                                                    ->get();
                                    ?>
                                    @foreach($brand_name as $brand_name)
                                    <option selected="" value="{{ $brand_name->id }}" style="color: #32c787;">{{ $brand_name->name }}</option>
                                    @endforeach
                                    <option>---Select---</option>
                                     @foreach($brands as $brands)
                                    <option value="{{$brands->id}}">{{$brands->name}}</option>
                                    @endforeach
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                
                                <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" name="barcode" value="{{ $ed_prod->barcode }}" id="price" class="form-control"  required=""/>&nbsp;<span id="errmsg1"></span>
                                <i class="form-group__bar"></i>
                            </div>
                            <div class="col-md-12">
                             <div class="form-group">
                                <label>HSN Code</label>
                                <input type="text"  name="hsncode" class="form-control" value="{{ $ed_prod->hsncode }}"  >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                             <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="product_desc" data-toggle="tooltip" title="Description" id="summernote" placeholder="Description">{{ $ed_prod->description}}</textarea>
                                <i class="form-group__bar"></i>
                            </div>

                  <div class="col-md-12">
                             <div class="form-group">
                                <label>Min Stock</label>
                                <input type="text"  name="min_stock" class="form-control"  value="{{ $ed_prod->min_stock }}" >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                           <div class="col-md-12">
                             <div class="form-group">
                                <label>Max Stock</label>
                                <input type="text"  name="max_stock" class="form-control" value="{{ $ed_prod->max_stock }}"  >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                     
                  
                               
                   

                   
                            <div class="form-group">
                                <label>Product Image</label>
                                <input type="file" name="image" value="{{ $ed_prod->product_image }}" data-toggle="tooltip" title="Image" id="dropzone-upload" class="dropzone dz-clickable" placeholder="Meta Tag Keywords">
                                <span><img src="{{url('/uploads/product/thumb_images/'.$ed_prod->product_image) }}" alt="" width="100px" height="100px"></span>
                                <i class="form-group__bar"></i>
                            </div>

                            
                        
                            

                           
                            


                            <input type="submit" class="btn btn-primary btn-block" value"Update" id="btnsubmit">

                          
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