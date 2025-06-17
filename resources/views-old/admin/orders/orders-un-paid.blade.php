@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Orders</h1>

                    <div class="actions">
                        <p>STORE</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       


                       
<h5>Order List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        <th width="5%">Id</th>
                                        <th width="14%">Order Number</th>
                                        <th width="19%">Customer Name</th>
                                        <th width="10%">Mobile</th>
                                        <th width="3%">Delivery</th>
                                        <th width="12%">Payment</th>
                                        <th width="8%">Amount</th>
                                        <th width="9%">Status</th>
                                        <th width="20%">Added Date</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
<?php $i='0'; ?>
            @foreach($ad_orders as $ad_orderss)  
          
     <?php $i++; ?>                                <tr>
                                       <td>{{$i}}</td>
                                        <td>{{ $ad_orderss->order_number}}</td>
                                        <td>{{ $ad_orderss->customer_name}}</td>
                                        <td>{{ $ad_orderss->customer_mob}}</td>
                                        <td>{{ $ad_orderss->delivery_partner}}</td>
                                         <td>@if($ad_orderss->paid==0)<span style="color:red;">Not Paid</span>@elseif($ad_orderss->paid==1)<span style="color:green;">Paid @else <span style="color:blue;">Error</span>@endif</span></td>
                                        <td>{{ $ad_orderss->total_amnt}}</td>
                                        <td>@if($ad_orderss->name=='Canceled') <span style="color:red;">Canceled</span> @elseif($ad_orderss->name=='Complete') <span style="color:green;">Complete</span> @else <span style="color:blue;">{{ $ad_orderss->name }}</span>  @endif</td>
                                        <td>{{ $ad_orderss->created_at}}</td>


                                        

                                        <td>
                                            
                                    <a href="{{url('view-order-list/'.$ad_orderss->order_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>

                                    {{-- <a href="" class="btn btn-light btn--icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                    <a href="" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a> --}}                                            
                                        </td>
                                    </tr>
                                   
                                    @endforeach
                                   
                                </tbody>
                            </table>
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

        <!-- Vendors: Data tables -->
        <script src="{{url('assets/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>

<style>
.pagination li span {
border: solid 1px #e8e8e8;
padding: 0px 10px;
color: #32c787;
font-size: 22px;
margin: 4px;
}    
    
.pagination li a {
border: solid 1px #e8e8e8;
padding: 0px 10px;
color: #32c787;
font-size: 22px;
margin: 4px;
}  



.active span{
color: #fbf6f6 !important;
background:#32c787;
}

</style>

@endsection






