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
                       
<h1>Edit Quantity & Price</h1>
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
                            

                         <form action="{{url('/update-qtyprice')}}" method="post" enctype="multipart/form-data">
                            @foreach($edit_qtyprice as $edit_qtyprice)
                           {{csrf_field()}}

                              <div class="form-group">
                                <input type="hidden" name="price_id" value="{{ $edit_qtyprice->price_id }}">
                                    <select class="form-control" name="select_product" placeholder="Meta Tag Keywords" required="" data-toggle="tooltip" title="Select Product">
                                        <?php
                                        $product = DB::table('products')
                                                    ->where('product_id','=',$product_id = $edit_qtyprice->product_id)
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
                                <input type="number" name="normal_price" value="{{ $edit_qtyprice->normal_price }}" class="form-control" placeholder="Normal Price" required="" data-toggle="tooltip" title="Normal Price">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="collapse mt-2 a arabic_div" id="collapseExample">
                                <input type="text" name="normal_price_arabic" value="{{ $edit_qtyprice->normal_price_arabic }}" class="form-control arabic_color_txt" placeholder="Normal Price (ARABIC)" data-toggle="tooltip" title="Normal Price (ARABIC)">
                                <i class="form-group__bar"></i>
                            </div> 

                             <div class="form-group">
                                <input type="number" name="offer_price" value="{{ $edit_qtyprice->offer_price}}" class="form-control" placeholder="Offer Price" required="" data-toggle="tooltip" title="Offer Price">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="collapse mt-2 a arabic_div" id="collapseExample">
                                <input type="text" name="offer_price_arabic" value="{{ $edit_qtyprice->offer_price_arabic}}" class="form-control arabic_color_txt" placeholder="Offer Price (ARABIC)" data-toggle="tooltip" title="Offer Price (ARABIC)">
                                <i class="form-group__bar"></i>
                            </div> 

                            <div class="form-group">
                                <select class="form-control" name="tax_percentage" placeholder="Tax Percentage" required="" data-toggle="tooltip" title="Tax Percentage">
                                    <option value="{{ $edit_qtyprice->tax_percentage }}">{{ $edit_qtyprice->tax_percentage }}</option>
                                    <option value="">Tax  Percentage</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="20">20%</option>
                                    <option value="30">30%</option>
                                    <option value="40">40%</option>
                                    <option value="50">50%</option>
                                    <option value="60">60%</option>
                                    <option value="70">70%</option>
                                    <option value="80">80%</option>
                                    <option value="90">90%</option>
                                    <option value="100">100%</option>        
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="number" name="min_quantity" value="{{ $edit_qtyprice->min_qty }}" class="form-control" placeholder="Minimum Quantity" required="" data-toggle="tooltip" title="Minimum Quantity">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="collapse mt-2 a arabic_div" id="collapseExample">
                                <input type="text" name="min_quantity_arabic" value="{{ $edit_qtyprice->min_qty_arabic }}" class="form-control arabic_color_txt" placeholder="Minimum Quantity (ARABIC)" data-toggle="tooltip" title="Minimum Quantity (ARABIC)">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                                <input type="number" name="wholesale_price" value="{{ $edit_qtyprice->wholesale_price }}" class="form-control" placeholder="Wholesale Price" required="" data-toggle="tooltip" title="Wholesale Price">
                                <i class="form-group__bar"></i>
                            </div>
                        
                            <!-- arabic -->
                            <div class="collapse mt-2 a arabic_div" id="collapseExample">
                                <input type="text" name="wholesale_price_arabic" value="{{ $edit_qtyprice->wholesale_price_arabic }}" class="form-control arabic_color_txt" placeholder="Whole Sale Price (ARABIC)" data-toggle="tooltip" title="WholeSale Price (ARABIC)">
                                <i class="form-group__bar"></i>
                            </div> 

                            <!-- arabic -->

                            <div class="form-group">
                                <input type="number" name="wholesale_offer_price" value="{{ $edit_qtyprice->wholesale_offer_price }}" class="form-control" placeholder="Wholesale Offer Price" required="" data-toggle="tooltip" title="Wholesale Offer Price">
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="collapse mt-2 a arabic_div" id="collapseExample">
                                <input type="text" name="wholesale_offer_price_arabic" value="{{ $edit_qtyprice->wholesale_offer_price_arabic }}" class="form-control arabic_color_txt" placeholder="Whole Sale Offer Price (ARABIC)" data-toggle="tooltip" title="Whole Sale Offer Price (ARABIC)">
                                <i class="form-group__bar"></i>
                            </div> 
                            

                            <div class="form-group">
                                <input type="number" class="form-control" value="{{ $edit_qtyprice->wholesale_min_qty }}" name="wholesale_min_quantity" placeholder="Wholesale Minimum Quantity" data-toggle="tooltip" title="Wholesale Minimum Quantity">
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