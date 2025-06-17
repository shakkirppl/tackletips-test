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
                       
<h1>View Purchase</h1>
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
                            

                         <form action="" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}
                           @foreach($view_purchase as $view_purchase)

                           {{--  <div class="form-group">
                                <label>Purchase Id</label>
                                <h5>{{ $view_purchase->purchase_id}}</h5>
                                <i class="form-group__bar"></i>
                            </div> --}}

                            <div class="form-group">
                                <label>Customer Id</label>
                                <?php
                                $customer = DB::table('customer_registration')
                                            ->where('id',$view_purchase->customer_id)
                                            ->get();
                                ?>
                                @foreach($customer as $customer)
                                <h5>{{ $customer->customer_name}}</h5>
                                @endforeach
                                <i class="form-group__bar"></i>
                            </div>

                            <div class="form-group">
                        
                             
                              
                                <i class="form-group__bar"></i>
                            </div>

                             <table class="table table-bordered invoice__table">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>ITEM DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                   
                                    <th>UNIT PRICE</th>
                                    <th>TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php
                                     
                                  $arr_product = $view_purchase->products;

                                  $exp_product = json_decode($arr_product);
                                  $dat = gettype($exp_product);
                                 $tottal ="0";
                                    
                                  ?>
                                 
                                 @foreach($exp_product as $exp_product)
                                 <?php
                                  $tottal = $tottal+ $exp_product->subtotal;
                                  

                                  ?>


                                    <tr>

                                        <td>{{ $exp_product->name }}</td>
                                        <td class="text-right">{{ $exp_product->qty }}</td>
                                       
                                     

                                        <td class="text-right">{{ $exp_product->price }}</td>
                                        
                                        <td class="text-right">{{ $exp_product->qty*$exp_product->price }}</td>
                                        <?php  $b = str_replace( ',', '', $tottal ); ?>


                                       
                                    </tr>
                                  @endforeach

                                
                                <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
                                          <?php
                                  $a = $view_purchase->shipping_charge;
                                  

                                  ?>
                                        <td class="text-right">₹ {{ $view_purchase->shipping_charge}} </td>

                                      
                                  </tr>
                                   <tr>
                                        <?php
                                  $c = $view_purchase->rod_packing_charge;
                                  

                                  ?>
                                        <td class="text-right" colspan="4" >
                                          Rod packing Charge
                                        </td>
                                        <td class="text-right">₹ {{ $view_purchase->rod_packing_charge}} </td>

                                      
                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">₹
                                          <?php
                                          echo $b+$a+$c;
                                          ?>
                                        </td>
                                  </tr>
                            </tbody>
                        </table>
                            <div>
                                <h5></h5>
                                <i class="form-group__bar"></i>
                            </div>

                            

                             <div class="form-group">
                                <label>Purchase Date</label>
                                <h5>{{ $view_purchase->purchase_date}}</h5>
                                <i class="form-group__bar"></i>
                            </div>

                            

                            

                           {{--  <button type="submit" class="btn btn-info btn-block"><a href="{{ url('/ad_customers')}}" class=""></a>Back</button> --}}

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