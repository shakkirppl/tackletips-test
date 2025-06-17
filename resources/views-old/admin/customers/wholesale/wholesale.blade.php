@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Wholesale Customers</h1>

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
                       

{{-- <span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>Wholesale Customers List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >      
                                        <th width="15%">Customer Name</th>
                                        <th width="15%">Type</th>
                                        <th width="15%">Email</th>
                                        <th width="10%">Mobile</th>
                                        <th width="10%">Added Date</th>
                                        <th width="5%">Status</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>

                                    @foreach($wholesale_group as $wholesale_group)
                                    <tr>

                                        <td>{{ $wholesale_group->customer_name}}</td>
                                        <td>{{ $wholesale_group->group_name}}</td>
                                        <td>{{ $wholesale_group->customer_email}}</td>
                                        <td>{{ $wholesale_group->customer_mobile}}</td>
                                        <td>{{ $wholesale_group->created_at}}</td>
                                       <?php  
                                        $stat = $wholesale_group->status;
                                        if ($stat=='0') { ?>

                                            <td><button type="button" class="btn btn-outline-danger">Disabled</button></td>

                                       <?php }else{ ?>

                                        <td><button type="button" class="btn btn-outline-success">Enabled</button></td>

                                     <?php  }
                                        ?>


                                        <td>

                                        <a href="{{url('view-ad-customer/'.$wholesale_group->customer_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                         <?php  
                                        $stat = $wholesale_group->status;
                                        if ($stat=='0') { ?>

                                           <a href="{{url('approve-wholesale-customer/'.$wholesale_group->customer_id)}}" onclick="return confirm('Are you sure you want to approve this User');"><i class="btn btn-success">Approve</i></a>

                                       <?php }else{ ?>

                                      <a href="{{url('disapprove-wholesale-customer/'.$wholesale_group->customer_id)}}" onclick="return confirm('Are you sure you want to disapprove this User');"><i class="btn btn-danger">DisApprove</i></a>

                                     <?php  }
                                        ?>
                                        

                                        
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

@endsection