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
 @foreach($view_guest as $view_guest)
                        <div class="actions">
                        <a href="{{ url('/order_invoice/'. $view_guest->order_id)}}" class="actions__item zmdi zmdi-local-printshop" data-toggle="tooltip" title="Print Invoice"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

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
                                <li><i class="zmdi zmdi-card-travel zmdi-hc-fw"></i> Arabian Fresh Online Store</li>
                                <li><i class="zmdi  zmdi-local-shipping zmdi-hc-fw"></i>QR {{ $view_guest->total }}</li>
                                <li><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i>{{ $view_guest->created_at}}</li>
                                <li><i class="zmdi  zmdi-local-shipping zmdi-hc-fw"></i>Cash on Delivery</li>
                            </ul>
                        </div>
                        
                    </div>

                     <div class="card profile">
                        
                        <div class="profile__info">
                          <h3>Customer Details</h3>
                            
                            <ul class="icon-list">
                             

                                <li><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i>{{ $view_guest->mobile}}</li>
                                <li><i class="zmdi zmdi-account-calendar zmdi-hc-fw"></i><?php if(!$view_guest->address){
                                  echo "Not Specified";
                                } ?>{{ $view_guest->address}}</li>
                                 
                            </ul>
                        </div>
                        
                    </div>


                <div class="card">
                    <div class="card-body">
                       

<h5>Order List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Quantity</th>
                                        <th width="10%">Addon</th>
                                        <th width="10%">Price</th>
                                        <th width="20%">Sub Total</th>                                     
                                       
                                    </tr>
                                </thead>
                              
                                  <?php
                                     
                                  $arr_product = $view_guest->products;
                                  $exp_product = json_decode($arr_product);
                                  
                                

                                      $tottal = "";
                                  ?>
                                 
                                 @foreach($exp_product as $exp_product)
                                  <?php
                                  $tottal = $tottal+ $exp_product->subtotal;
                                  ?>
                                    <tr>

                                        <td>{{ $exp_product->name }}</td>
                                        <td class="text-right">{{ $exp_product->qty }}</td>
                                        <?php
                                       $addon_id = $exp_product->options->addon;
                                        $addon_val = DB::table('addon')
                                                    ->where('addon_id','=', $addon_id)
                                                    ->get();
                                        ?>
                                        @foreach($addon_val as $addon_val)
                                       
                                         <td class="text-right">{{ $addon_val->addon_name }}</td>
                                         @endforeach
                                        <td class="text-right">{{ $exp_product->price }}</td>
                                        
                                        <td class="text-right">{{ $exp_product->subtotal }}</td>


                                       
                                    </tr>
                                  @endforeach

                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Shipping Charge
                                        </td>
                                        <td class="text-right">QR 0.00
                                        </td>
                                  </tr>
                                  <tr>
                                        <td class="text-right" colspan="4" >
                                          Total Amount
                                        </td>
                                        <td class="text-right">QR
                                          <?php
                                          echo $tottal;
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

                          <h5>Order Status</h5>
                            

                         <form action="{{url('/update-guest')}}" method="post" enctype="multipart/form-data">

                           {{csrf_field()}}

                            

   
                         
                            <div class="form-group">
                              <input type="hidden" name="guest_id" value="{{$view_guest->guest_id}}">
                                <select class="form-control" name="order_status" placeholder="Meta Tag Keywords" required="">
                                  <?php
                               $status_id =  $view_guest->order_status;
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

                               <div class="form-group">

                            <textarea class="form-control" name="shipping_address" placeholder="Shipping Address">{{ $view_guest->address}}</textarea>
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