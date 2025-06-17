@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Normal Customers</h1>

                    <div class="actions">
                       <p>STORE</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

{{-- <span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>Normal Customers List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >      
                                        <th  width="3%">Id</th>
                                        <th width="15%">Name</th>
                          
                                        <th width="10%">Email</th>
                                        <th width="10%">Mobile</th>
                                        <th width="10%"> Password</th>
                                        <th width="5%">Status</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
<?php $i='0'; ?>
                                    @foreach($customers as $customers)
                                     <?php $i++; ?>
                                    <tr>
                                        <td>{{ $customers->id }}</td>
                                        <td>{{ $customers->customer_name}}</td>
                                     
                                        <td>{{ $customers->customer_email}}</td>
                                        <td>{{ $customers->customer_mobile}}</td>
                                  
                                      <td>{{ Crypt::decryptString($customers->password) }}</td>
                                        <?php  
                                        $stat = $customers->status;
                                        if ($stat=='0') { ?>

                                            <td><img src="{{url('/uploads/images/disable.png') }}" alt="" width="30px" height="30px"></td>

                                       <?php }else{ ?>

                                        <td><img src="{{url('/uploads/images/enable.png') }}" alt="" width="30px" height="30px"></td>

                                     <?php  }
                                        ?>


                                        

                                         <td>

                                        <a href="{{url('view-ad-customer/'.$customers->id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-eye zmdi-hc-fw"></i></a>
                                         <?php  
                                        $stat = $customers->status;
                                        if ($stat=='0') { ?>

                                           <a href="{{url('unblock-customer/'.$customers->id)}}" onclick="return confirm('Are you sure you want to unblock this User');"><i class="btn btn-success">Unblock</i></a>

                                       <?php }else{ ?>

                                      <a href="{{url('block-customer/'.$customers->id)}}" onclick="return confirm('Are you sure you want to block this User');"><i class="btn btn-danger">Block</i></a>

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