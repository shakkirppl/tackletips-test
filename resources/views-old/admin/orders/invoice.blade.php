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
           @foreach($print_invoice as $print_invoice)             
<h1>INVOICE No #{{$print_invoice->order_id}}</h1>

                     
                   
  

                    </header>

                    <!-- arabic -->
                    
 <div class="invoice">

        <p style="font-size: 20px;" text-align="right">Date:  {{date('d/m/Y',strtotime($print_invoice->created_at))}}</p>
          <p style="font-size: 20px;" text-align="right">Remark:  {{$print_invoice->remarks}}</p>
                        <div class="invoice__header">
                            <img class="invoice__logo" src="{{url('front-end/assets/img/logoone.png')}}" width="150px" height="100px" alt="">
                        </div>

                        <div class="row invoice__address">
                            <div class="col-6">
                                <div class="text-right">
                                    <p style="font-size: 20px;">Invoice From</p>

                                    <h4 style="font-size: 20px;"> Tackle Tips Fishing Tackle Store</h4>

                                    <address style="font-size: 20px;">
                                       
                                       
1st Floor, 11/893-J,<br>
Nadakavu,Tanur,<br>
Kerala-676302<br>,india
                                    </address>

                                    <p style="font-size: 20px;">+91 070129 01159</p><br/>
                                    <p style="font-size: 20px;"> salestackletips@gmail.com</p><br>
                                   <a href="https://tackletips.in/"></a><p style="font-size: 20px;"> www.tackletips.in </p></a>
                                </div>
                            </div>
                            <?php
                          $cust_id = $print_invoice->customer_id;
                          $cust_det = DB::table('customer_registration')->where('id','=',$cust_id)->get();
                          
                     ?>
                      @foreach($cust_det as $cust_detail)
                            <div class="col-6">
                                <div class="text-left">
                                    <p style="font-size: 20px;">Invoice to</p>

                                    <h4 style="font-size: 20px;">{{$cust_detail->customer_name}}</h4>

                                    <address style="font-size: 20px;">
                                        Block Number: {{$cust_detail->customer_address}}<br> House/Building No:{{$cust_detail->customer_pincode}}, Place/area: {{$cust_detail->customer_state}} <br>
                                        Address(street/Avenue number): {{$cust_detail->customer_dist}} <br>
                                       Kuwait
                                    </address>

                                   <p style="font-size: 20px;"> {{ $cust_detail->customer_mobile}}</p><br/>
                                   <p style="font-size: 20px;">{{ $cust_detail->customer_email}} </p> 
                                    <br><br>
                                    @endforeach
                                    <h4 style="color:green;">ORDER ID : {{ $print_invoice->order_number}}</h4>
                                </div>
                            </div>
                            
                            
                        </div>

                        


                        <table class="table table-bordered invoice__table " style="font-size: 20px;">
                            <thead>
                                <tr class="text-uppercase">
                                    <th>ITEM DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                   
                                    <th>UNIT PRICE</th>
                                    <th colspan="2">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                 <?php


                                      $product_details = $print_invoice->purchase_id;
                                      $products_det = DB::table('purchase')
                                                  ->where('purchase_id','=',$product_details)
                                                  
                                                  ->get();

                                                     

                                      foreach ($products_det as $products_det) {
                                        $order_history = $products_det->products;
                                      }



                                      $exp_product = json_decode($order_history);
                                        


                                      $tottal ="0";
                                  ?>
                                 
                                 @foreach($exp_product as $exp_product)
                                  <?php
                                  $tottal = $tottal+ $exp_product->subtotal;
                                  ?>
                                    <tr>

                                        <td>{{ $exp_product->name }}</td>
                                        <td >{{ $exp_product->qty }}</td>
                                        
                                       
                                        <td > ₹{{ number_format($exp_product->price, 2, '.', ',')  }}</td>
                                        
                                        <td > ₹{{ number_format($exp_product->subtotal, 2, '.', ',') }}</td>


                                       
                                    </tr>
                                  @endforeach

                                
                                <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
  
<?php $a=$print_invoice->shipping_charge; ?>
                                        <td class="text-right"> ₹{{ $print_invoice->shipping_charge}} </td>

                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">
                                          ₹<?php
                                          echo number_format($tottal+$a, 3, '.', ',');
                                          ?>
                                        </td>
                                  </tr>
                            </tbody>
                        </table>
                        @endforeach

                        <footer class="invoice__footer">
                            
                            <a href="#">www.tackletips.in</a>
                        </footer>
                    </div>

                    <button class="btn btn-danger btn--action btn--fixed " data-ma-action="print"><i class="zmdi zmdi-print"></i></button>
                </div>

    
            </section>


 <!-- arabic end -->


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