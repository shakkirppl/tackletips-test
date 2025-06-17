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
                       
<h1>Edit/Add Attributes & Price</h1>
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
                            

                         <form action="{{url('update-attr-amnt')}}" method="post" enctype="multipart/form-data">
                            @foreach($ed_attr as $ed_attr)
                           {{csrf_field()}}

                            <div class="form-group">
                                <label>Select Product</label>
                                <input type="hidden" name="attr_amnt_id" value="{{ $ed_attr->products_attributes_id}}">
                               <select class="form-control" name="sel_product">
                                <?php 
                                        $pro_name = DB::table('products')
                                                    ->where('product_id','=',$ed_attr->product_id)
                                                    ->get();
                                    ?>
                                    @foreach($pro_name as $pro_name)
                                    <option selected="" value="{{ $pro_name->product_id }}" style="color: #32c787;">{{ $pro_name->product_name }} (selected)</option>
                                    @endforeach
                                <option value="0">---Select---</option>
                                  @foreach($products as $products)
                                  <option value="{{ $products->product_id }}">{{ $products->product_name }}</option>
                                  @endforeach   
                                </select>
                                <i class="form-group__bar"></i>
                                 
                            </div>

                            <div class="form-group">
                                <label>Select Attribute</label>
                                <select class="form-control" name="attribute" id="attribute" >

                                  <?php 
                                        $attr_name = DB::table('attributes')
                                                    ->where('attribute_id','=',$ed_attr->attrbute_type)
                                                    ->get();
                                    ?>
                                    @foreach($attr_name as $attr_name)
                                    <option selected="" value="{{ $attr_name->attribute_id }}" style="color: #32c787;">{{ $attr_name->attribute_name }} (selected)</option>
                                    @endforeach
                                  
                                    <option value="0">---Select---</option>
                                    @foreach($attr as $attr)
                                    <option value="{{$attr->attribute_id}}">{{$attr->attribute_name}}</option>
                                    @endforeach
                                   
                                </select>
                                <i class="form-group__bar"></i>
                            </div>


                            <div class="form-group">
                                <label>Attribute Value</label>
                                <select class="form-control" name="value" id="value" >
                                  <?php 
                                        $attr_value = DB::table('attributes_value')
                                                    ->where('attribute_value','=',$ed_attr->attribute_value)
                                                    ->get();
                                    ?>
                                    @foreach($attr_value as $attr_value)
                                    <option selected="" value="{{ $attr_value->attribute_value }}" style="color: #32c787;">{{ $attr_value->attribute_value }} (selected)</option>
                                    @endforeach
                                    <option>---Select---</option>
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Add Price</label>
                                <input type="text" name="price" placeholder="" value="{{ $ed_attr->attribute_price }}" class="form-control"  required="">
                                <i class="form-group__bar"></i>
                            </div>

                            

                            <div class="form-group">
                                <label>Image</label>
                                <input type="file" name="image" value="{{ $ed_attr->attribute_image }}" data-toggle="tooltip" title="Image" id="dropzone-upload" class="dropzone dz-clickable" placeholder="Meta Tag Keywords">
                                <span><img src="{{url('/uploads/product/thumb_images/'.$ed_attr->attribute_image) }}" alt="" width="100px" height="100px"></span>
                                <i class="form-group__bar"></i>
                            </div>

                             <div class="form-group">
                                <label>Add Quantity</label>
                                <input type="text" name="rem" required=""  placeholder="Add Total Stock" class="form-control">
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

        <script src="{{url('assets/vendors/bower_components/autosize/dist/autosize.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>
        <script src="{{url('assets/js/bootstrap-wysiwyg.js')}}"></script>

           <script type="text/javascript">

$(document).ready(function(){


$('#attribute').change(function(){

var attr = $(this).val();
if(attr){
    $.ajax({

               type:'GET',
               url:'/get-attr-val/',
               data:({attr_id:attr}),
                 success:function(res){               
            if(res){
               $("#value").empty();
                $("#value").append('<option value="">Select Value</option>');

                $.each(res,function(attribute_value_id,attribute_value){
                    $("#value").append('<option value="'+attribute_value+'">'+attribute_value+'</option>');
                });
           
            }else{
               $("#value").empty();
            }
           }

    });
     }

});


});

</script>
@endsection