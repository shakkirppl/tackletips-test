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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />
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


<script>
    
  $(function()
  {
  
    $('#theform').submit(function(){
    
    $("input[type='submit']", this)
      
    .val("Please Wait...")
    
    .css("cursor", "not-allowed")
      
    .attr('disabled', 'disabled');
    
    return true;
  
    });
  
});
    

</script>

<script>

$(document).ready(function () {
  //called when key is pressed in textbox
  $("#product_price").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 46 || e.which > 57)) {
        //display error message
        $("#errmsg").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   

   
    $("#product_price_offer").keypress(function (e) {
     //if the letter is not digit then display error and don't type anything
     if (e.which != 8 && e.which != 0 && (e.which < 46 || e.which > 57)) {
        //display error message
        $("#errmsg2").html("Digits Only").show().fadeOut("slow");
               return false;
    }
   });
   

   
});

</script>


<!-- content -->
 <div class="content__inner">
                    <header class="content__title">
                       
<h1>Add Addon</h1>
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
                            
                                               <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          
        </div>
                         <form action="{{url('/add-addon-product')}}" method="post" enctype="multipart/form-data" id="theform">

                           {{csrf_field()}}
                           <div class="row">
                           
                           
                        

                          <div class="col-md-12">
                             <div class="form-group">
                                <label ><strong> {{$item->name}}</strong></label>
                              <input type="text" name="item_id" id="item_id" class="form-control" value="{{$item->id}}" hidden="">
                               
                            </div>
                          </div>
            
                
           

                                   <div class="col-md-12">
                            <div class="form-group">
                                <label>Unit (Color,Size,etc...)</label>
                                 <input class="typeahead form-control" id="search" type="text">
                                      <input type="hidden" name="measurement_id" id="measurement_id" >
                             
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                                <div class="col-md-12">
                            <div class="form-group field_wrapper">
                                <label>HSN Code</label><br>
                             <input type="text"  name="hsncode" required="" class="form-control" value="{{$item->hsncode}}"/>
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                             
                                                      <div class="col-md-12">
                             <div class="form-group">
                                <label>Min Stock</label>
                                <input type="text"  name="min_stock" class="form-control"  value="{{$item->min_stock}}" >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                           <div class="col-md-12">
                             <div class="form-group">
                                <label>Max Stock</label>
                                <input type="text"  name="max_stock" class="form-control" value="{{$item->max_stock}}"  >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                            
                                    <div class="col-md-12">
                             <div class="form-group">
                                <label>Barcode</label>
                                <input type="text"  name="barcode" value="{{$barcode}}" class="form-control"  >
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                          
   
                          
                             <div class="col-md-12">
                            <div class="form-group field_wrapper">
                                <label>Product Main Images</label><br>
                             <input type="file"  name="image_url" required="" value=""/>
                                <i class="form-group__bar"></i>
                            </div>
                          </div>
                          
                            <div class="col-md-12">
                            <div class="form-group field_wrapper">
                                <label>Product Images 1</label><br>
                             <input type="file"  name="image_more1"  value=""/>
                                <i class="form-group__bar"></i>
                            </div>
                          </div>

                            <div class="col-md-12">
                            <div class="form-group field_wrapper">
                                <label>Product Images 2</label><br>
                             <input type="file"  name="image_more2"  value=""/>
                                <i class="form-group__bar"></i>
                            </div>
                          </div>

                           <div class="col-md-12">
                            <div class="form-group field_wrapper">
                                <label>Product Images 3</label><br>
                             <input type="file"  name="image_more3"  value=""/>
                                <i class="form-group__bar"></i>
                            </div>
                          </div>

    <div class="col-md-12">
                             <div class="form-group">
                                <label>Purchase Price</label>
                                <input type="number" name="net_rate" id="net_rate" class="form-control"   required="" value="{{$item->net_rate}}">
                                <i class="form-group__bar"></i>
                            </div>
                            </div>

                
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Retail Price</label>
                                <input type="text" name="mrp_price" id="mrp_price" class="form-control"   required="" value="{{$item->mrp_price}}">
                                <i class="form-group__bar"></i>
                              </div>
                            </div>
                            
                                       <div class="col-md-12">
                             <div class="form-group">
                                <label>Wholesale Price</label>
                                <input type="text" name="wholesale_rate" id="wholesale_rate" class="form-control"   required="" value="{{$item->wholesale_rate}}">
                                <i class="form-group__bar"></i>
                            </div>
                            </div>

                
                            <div class="col-md-12">
                              <div class="form-group">
                                <label>Quataion Price</label>
                                <input type="text" name="quotation_price" id="quotation_price" class="form-control"   required="" value="{{$item->quotation_price}}">
                                <i class="form-group__bar"></i>
                              </div>
                            </div>

                               <div class="col-md-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" required="" id="summernote" >{{$item->description}}</textarea>
                                <i class="form-group__bar"></i>
                            </div></div>
                            







                           
                            

                            <input type="submit" class="btn btn-primary btn-block" value="Save" id="btnsubmit">

                          
                           </div>
                          </form>
                     
                      
                        </div>

                    </div>

                 

                </div>


<!-- content-end -->


 

@endsection

@section('script')


  <!-- Vendors -->
  <script>
ClassicEditor
.create( document.querySelector( '#body' ) )
.catch( error => {
console.error( error );
} );
</script>
<script src="https://code.jquery.com/ui/1.10.2/jquery-ui.js" ></script>
<script type="text/javascript">
    var path = "{{ route('autocomplete') }}";
  
    $( "#search" ).autocomplete({
        source: function( request, response ) {
          $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            data: {
               search: request.term
            },
            success: function( data ) {
               response( data );
            }
          });
        },
        select: function (event, ui) {
           $('#search').val(ui.item.label);
            $('#measurement_id').val(ui.item.id);
           
           console.log(ui.item); 
           return false;
        }
      });
  
</script>
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

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

 <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


@endsection