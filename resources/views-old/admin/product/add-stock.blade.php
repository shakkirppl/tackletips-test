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
                            
                         
                         <form action="{{url('/add-stock-product')}}" method="post" enctype="multipart/form-data" id="theform">

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
                              <label>Add Stock (Current Stock: {{$item->web_stock}})</label>
                              <input type="number" name="product_qty" min="0" max="100" class="form-control"  required=""> 
                              <i class="form-group__bar"></i>
                              </div>
                            </div>
                            
                            
                            
                     


                

                           
                            

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