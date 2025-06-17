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
                       
<h1>Edit Stock</h1>
                        <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                        <a class="btn btn-primary float-right" data-toggle="collapse" href=".a" role="button" aria-expanded="false" aria-controls="collapseExample">
                                   Arabic
                                </a>  
                    </div>

                   
  

                    </header>

                    <!-- arabic -->



 <!-- arabic end -->



                    <div class="card">
                        <div class="card-body">
                            

                         <form action="{{url('/update-stock')}}" method="post" enctype="multipart/form-data">
                            @foreach($edit_stock as $edit_stock)
                           {{csrf_field()}}

                            <div class="form-group">
                                <input type="hidden" name="stock_id" value="{{ $edit_stock->stock_id }}">
                                <select class="form-control" name="select_product" placeholder="Select Product" required="" data-toggle="tooltip" title="Select Product">
                                    <?php
                                        $product = DB::table('products')
                                                    ->where('product_id','=',$product_id = $edit_stock->product_id)
                                                    ->get();
                                        ?>
                                    @foreach($product as $product)
                                    <option value="{{ $product->product_id }}">{{ $product->product_name }}</option>
                                    @endforeach
                                    <option value="">Select Product</option>
                                    @foreach($sel_product as $sel_product)
                                    <option value="{{ $sel_product->product_id}}">{{ $sel_product->product_name }}</option>
                                    @endforeach      
                                </select>
                                <i class="form-group__bar"></i>
                            </div> 
                            <div class="form-group">
                                <label>Remaining Qty</label>
                                <input type="number" name="rem" value="{{ $edit_stock->total_qty }}" class="form-control" placeholder="Enter Total Quantity" required="" data-toggle="tooltip" title="Total Quantity">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <label>Add</label>
                                <input type="number" name="total_quantity"  class="form-control" placeholder="Add more" required="" data-toggle="tooltip" title="Total Quantity">
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

@endsection