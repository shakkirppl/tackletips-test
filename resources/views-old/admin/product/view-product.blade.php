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
<style>
/*body {font-family: Arial, Helvetica, sans-serif;}*/

/*#myImg {*/
/*    border-radius: 5px;*/
/*    cursor: pointer;*/
/*    transition: 0.3s;*/
/*}*/

/*#myImg:hover {opacity: 0.7;}*/

/* The Modal (background) */
/*.modal {*/
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
/*    left: 0;*/
/*    top: 0;*/
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
/*}*/

/* Modal Content (image) */
/*.modal-content {*/
/*    margin: auto;*/
/*    display: block;*/
/*    width: 80%;*/
/*    max-width: 700px;*/
/*}*/

/* Caption of Modal Image */
/*#caption {*/
/*    margin: auto;*/
/*    display: block;*/
/*    width: 80%;*/
/*    max-width: 700px;*/
/*    text-align: center;*/
/*    color: #ccc;*/
/*    padding: 10px 0;*/
/*    height: 150px;*/
/*}*/

/* Add Animation */
/*.modal-content, #caption {    */
/*    -webkit-animation-name: zoom;*/
/*    -webkit-animation-duration: 0.6s;*/
/*    animation-name: zoom;*/
/*    animation-duration: 0.6s;*/
/*}*/

/*@-webkit-keyframes zoom {*/
/*    from {-webkit-transform:scale(0)} */
/*    to {-webkit-transform:scale(1)}*/
/*}*/

/*@keyframes zoom {*/
/*    from {transform:scale(0)} */
/*    to {transform:scale(1)}*/
/*}*/

/* The Close Button */
/*.close {*/
/*    position: absolute;*/
/*    top: 15px;*/
/*    right: 35px;*/
/*    color: #f1f1f1;*/
/*    font-size: 40px;*/
/*    font-weight: bold;*/
/*    transition: 0.3s;*/
/*}*/

/*.close:hover,*/
/*.close:focus {*/
/*    color: #bbb;*/
/*    text-decoration: none;*/
/*    cursor: pointer;*/
/*}*/

/* 100% Image Width on Smaller Screens */
/*@media only screen and (max-width: 700px){*/
/*    .modal-content {*/
/*        width: 100%;*/
/*    }*/
/*}*/
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
                       
<h1>Product</h1>
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
                        <h4 class="card-title">Product Details</h4>
                         @foreach($view_prod as $view_prod)
                         <center>
                          <h5>{{ $view_prod->name }}</h5>
                          <span><img src="{{url('/uploads/product/thumb_images/'.$view_prod->product_image) }}" alt="" width="130px" height="130px"></span>
                          <h5>${{ $view_prod->product_price }}</h5>
                        </center><br>
                      
                        <table class="table table-dark mb-0">
                            
                            <tbody>
                            <tr>
                                <th scope="row">Product Name </th>
                                <td>{{ $view_prod->name }}</td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Category</th>
                              <td>
                              <?php
                                $category = $view_prod->category_id;
                                $exp_ct = explode(',', $category);
                                $ct = DB::table('categories')
                                    ->whereIn('id',$exp_ct)
                                    ->get();
                                ?>
                                
                                @foreach($ct as $ct)
                                {{ $ct->name }},
                                @endforeach
                                </td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Brand Name </th>
                              <?php
                              $brand = $view_prod->brand_id;
                              $brand_name = DB::table('brands')
                                          ->where('id','=',$brand)
                                          ->get();

                              ?>
                              @foreach($brand_name as $brand_name)
                              <td>{{ $brand_name->name }}</td>
                              @endforeach
                                
                            </tr>
                            <tr>
                                <th scope="row">Product Description </th>
                                <td>{!! $view_prod->product_desc !!}</td>
                                
                            </tr>
                             <tr>
                                <th scope="row">Product Price </th>
                                <td>{{ $view_prod->product_price }}</td>
                                
                            </tr>
                            
                            <tr>
                                <th scope="row">Product Price Offer </th>
                                <td>{{ $view_prod->product_price_offer }} %</td>
                                
                            </tr>
                            <tr>
                                <th scope="row"> Current Status </th>
                                <?php
                                 $stat = $view_prod->status;
                                        if ($stat=='0') { ?>
                                <td>Disabled</td>
                                <?php }else{ ?>
                                   <td>Enabled</td>
                               <?php  } ?>
                            </tr>
                             
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                </div>
                
            <div class="center">
                <div class="table-responsive">
                <table id="simple-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Item</th>
                            <th>Sub Name</th>
                           
                       </tr>
                    </thead>

                    <tbody>
                        @if(count($items_addon))
                        @foreach($items_addon as $key=>$item)
                        <tr id="{{$item->id}}">
                            <td>{{$key+1}}</td>
                            <td class="name">{{$item->name}}</td>
                            <td class="sub_name">{{$item->sub_name}}</td>
                           
                            
                        </tr>
                        @endforeach
                        @else
                        <tr><td colspan="9">Sorry, No Records found!</td></tr>
                        @endif
                    </tbody>
                </table>
                </div>
                {{$items_addon->appends(Request::all())->links()}}
            </div>

                </div>




                 

                </div>

  <!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
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
        
        <script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>

@endsection