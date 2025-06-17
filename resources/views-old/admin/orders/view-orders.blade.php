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
                       
<h1>View Orders</h1>
 @foreach($view_orders as $view_orders)
  <div class="actions btn-demo">
  <a href="{{ url('/order_invoice/'. $view_orders->order_id)}}" class="actions__item zmdi zmdi-local-printshop" data-toggle="tooltip" title="Print Invoice"></a>
  <a href="#" class="actions__item zmdi zmdi-local-shipping " data-toggle="tooltip" title="Print Shipping List"></a>


  <div class="dropdown actions__item">
  <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
  <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                               
                            </div>
                        </div>

                        {{-- <a class="btn btn-primary float-right" data-toggle="collapse" href=".a" role="button" aria-expanded="false" aria-controls="collapseExample">
                                   Arabic --}}
                                </a>  
                    </div>

                   
  

                    </header>

                    <!-- arabic -->



 <!-- arabic end -->



                    <div class="card profile">
                       
                        <div class="profile__info">
                          <h3>Order Details</h3>
                            
                            <ul class="icon-list">
                                <li><i class="zmdi zmdi-card-travel zmdi-hc-fw"></i> Store</li>
                                <li><i class="zmdi zmdi-money zmdi-hc-fw"></i>Amount: ₹ {{ $view_orders->total_amnt }}</li>
                                <li><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i>Ordered Date: {{ $view_orders->created_at}}</li>
                                <li><i class="zmdi  zmdi-local-shipping zmdi-hc-fw"></i>Delivery Partner: {{ $view_orders->delivery_partner}}</li>
                                  <?php $orderid = Crypt::encryptString($view_orders->order_id); ?>
                                    <li><i class="zmdi  zmdi-local-shipping zmdi-hc-fw"></i><a href="https://tackletips.in/shipment-tracking/{{$orderid}}">https://tackletips.in/shipment-tracking/{{$view_orders->order_number}}</a></li>
                            </ul>
                        </div>
                        
                    </div>

                     <div class="card profile">
                        
                        <div class="profile__info">
                          <h3>Customer Details</h3>
                            
                            <ul class="icon-list">
                             

                                <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>{{ $view_orders->customer_name}}</li>
                       
                                <li><i class="zmdi zmdi-email-open zmdi-hc-fw"></i>{{ $view_orders->customer_email}}</li>
                                <li><i class="zmdi zmdi-phone-ring zmdi-hc-fw"></i>{{ $view_orders->customer_mob}}</li>
                                 <li><i class="zmdi zmdi-phone-ring zmdi-hc-fw"></i>{{ $view_orders->remarks}}</li>
                            </ul>
                        </div>
                        
                    </div>
                <?php
                          $cust_id = $view_orders->customer_id;
                          $cust_det = DB::table('customer_registration')->where('id','=',$cust_id)->get();
                          
                     ?>
                   <div class="row">
                       @foreach($cust_det as $cust_detail)
                        <?php
                          $state_id = $cust_detail->shipping_state;
                          $cust_state = DB::table('state')->where('id','=',$state_id)->first();
                          
                     ?>
                   <div class="col-md-6">
                    <div class="card profile">
                        <div class="profile__info">
                          <h3>Payment Address</h3>
                            
                            <ul class="icon-list">
                             

                                <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>Name: {{$cust_detail->customer_name}}</li>

                                <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Email: {{$cust_detail->customer_email}}</li>
                                  <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Contact: {{$cust_detail->customer_mobile}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Address: {{$cust_detail->shipping_address}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>City: {{$cust_detail->shipping_city}} </li>
                             <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Zip/Postal Code: {{$cust_detail->shipping_pin}} </li>
                              <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>State: {{$cust_state->name}} </li>
                          
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>INDIA</li>
                               
                               
                            </ul>
                        </div>
                       
                    </div>
                    </div>
                   
                    
                    <div class="col-md-6">
                     <div class="card profile">
                        
                        <div class="profile__info">
                          <h3>Shipping Address</h3>
                            
                            <ul class="icon-list">
                             
                              <li><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>Name: {{$cust_detail->customer_name}}</li>

                                <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Email: {{$cust_detail->customer_email}}</li>
                                  <li> <i class="zmdi zmdi-email-open zmdi-hc-fw"></i>Contact: {{$cust_detail->customer_mobile}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Address: {{$cust_detail->shipping_address}}</li>
                                
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>City: {{$cust_detail->shipping_city}} </li>
                             <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>Zip/Postal Code: {{$cust_detail->shipping_pin}} </li>
                              <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>State: {{$cust_state->name}} </li>
                          
                                <li><i class="zmdi zmdi-pin zmdi-hc-fw"></i>INDIA</li>
                               
                              
                               
                            </ul>
                        </div>
                      
                    </div>
                   </div>
                    @endforeach
                   </div>

                <div class="card">
                    <div class="card-body">
                       

{{-- <span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>Order List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered table-dark mb-0">
                                <thead class="thead-default">
                                    <tr>                                        
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Quantity</th>
                                        <th>Unit Price</th>
                                      
                                        <th>Sub Total</th>                                     
                                       
                                    </tr>
                                </thead>
                              
                                <tbody>
                                 
                                  <?php


                                      $product_details = $view_orders->purchase_id;
                                      $products_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->get();
                            $pu_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->first();
                                                     

                                      foreach ($products_det as $products_det) {
                                        $order_history = $products_det->products;
                                      }



                                      $exp_product = json_decode($order_history);



                                      $tottal ="0";
                                  ?>
                                  <?php  $b=0; ?>
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
                                       
<?php $a=$pu_det->shipping_charge; ?>
                                        <td class="text-right">₹ {{$pu_det->shipping_charge}} </td>

                                      
                                  </tr>
      <tr>
                                        <td class="text-right" colspan="4" >
                                          Rod Packing Charge
                                        </td>
                                       
<?php $c=$pu_det->rod_packing_charge; ?>
                                        <td class="text-right">₹ {{$pu_det->rod_packing_charge}} </td>

                                      
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
                        </div>
                    </div>
                </div>


         <div class="card">
                        <div class="card-body">

                          <!--<h5>Order Status</h5>-->
                            

                         <form action="{{url('/update-order-courier-detail')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

   
                         
                            <div class="form-group">
                              <input type="hidden" name="order_id" value="{{$view_orders->order_id}}">
                              
                              <lable>Courier Number</lable>
                                
                                <input type="text" class="form-control" name="courier_number">
                                
                                
                                <i class="form-group__bar"></i>
                            </div>
                            
                             <div class="form-group">
                              <lable>Remarks</lable>
                                <textarea name="remarks" class="form-control"></textarea>
                                <i class="form-group__bar"></i>
                            </div>

                            


                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> update</button>

                          

                          </form>
                      
                      
                        </div>

                    </div> 
                    
       

         <div class="card">
                        <div class="card-body">

                          <h5>Order Status</h5>
                            

                         <form action="{{url('/update-order-status')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

   
                         
                            <div class="form-group">
                              <input type="hidden" name="order_id" value="{{$view_orders->order_id}}">
                                <select class="form-control" name="order_status" placeholder="Meta Tag Keywords" required="">
                                  <?php
                               $status_id =  $view_orders->order_status_id;
                               $status = DB::table('order_status')
                                          ->where('order_status_id','=',$status_id)
                                          ->get();
                              ?>

                                 @foreach($status as $status)
                                    <option value="{{$status->order_status_id}}">{{$status->name}}</option>
                                    @endforeach  
                                    <option value="">Select a Status</option>
                                    @foreach($order_stat as $order_stat)
                                    <option value="{{$order_stat->order_status_id}}">{{ $order_stat->name }}</option>
                                    @endforeach  
                                </select>
                                <i class="form-group__bar"></i>
                            </div>

                            


                            <button type="submit" class="btn btn-primary btn-block"><i class="zmdi zmdi-floppy zmdi-hc-fw"></i> update</button>

                          

                          </form>
                      
                      
                        </div>

                    </div>         

 @endforeach  
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