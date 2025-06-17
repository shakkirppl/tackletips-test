@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>STOCK</h1>

                    <div class="actions">
                        <a href="#" class="actions__item zmdi zmdi-trending-up"></a>
                        <a href="#" class="actions__item zmdi zmdi-check-all"></a>

                        <div class="dropdown actions__item">
                            <i data-toggle="dropdown" class="zmdi zmdi-more-vert"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a href="#" class="dropdown-item">Refresh</a>
                                <a href="#" class="dropdown-item">Manage Widgets</a>
                                <a href="#" class="dropdown-item">Settings</a>
                            </div>
                        </div>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

{{-- <span class="icons_head"><a href="{{url('/add-stock')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-stock')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>Stock List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Price</th>
                                        
                                        <th width="15%">Remaining Quantity</th>
                                        <th width="15%">Avilability</th>
                                        <th width="15%">Added Date</th>  
                                        <th width="10%">Status</th>                                      
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>

                                    @foreach($ad_stock as $ad_stock)
                                    <tr>
                                        
                                        <td>{{ $ad_stock->product_name}}</td>

                                        <td>{{ $ad_stock->normal_price}}</td>
                                       
                                        <td>{{ $ad_stock->remaining_qty}}</td>
                                         <td><?php if($ad_stock->remaining_qty>0){?>
<p style="color: green">--Avilable--</p>
                                        <?php }else{?>

<h5 style="color: red"> Out of Stock</h5>
                                    <?php    } ?></td>
                                        <td>{{ $ad_stock->added_date}}</td>
                                        <?php  
                                        $stat = $ad_stock->stock_status;
                                        if ($stat=='0') { ?>

                                            <td><button type="button" class="btn btn-outline-danger">Disabled</button></td>

                                       <?php }else{ ?>

                                        <td><button type="button" class="btn btn-outline-success">Enabled</button></td>

                                     <?php  }
                                        ?>

                                        <td><a href="{{url('edit-stock/'.$ad_stock->stock_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        {{-- <a href="{{url('delete-stock/'.$ad_stock->stock_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a> --}}</td>
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

@endsection