@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Newsletter - Registered Emails</h1>

                    <div class="actions">
                       <p>STORE</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

{{-- <span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>Newsletter - Registered Emails</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        
                                        <th width="50%">Email Id</th>
                                        <th width="30%">Date</th>
                                                                            
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>

                                    @foreach($whatsapp as $whatsapps)
                                    <tr>

                                        <td>{{ $whatsapps->mobile }}</td>
                                        <td>{{ $whatsapps->created_at }}</td>
                                       
                                       

                                        <td>
                                        <a href="{{url('delete-whatsapp/'.$whatsapps->id)}}" onclick="return confirm('Are you sure you want to delete);" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a></td>
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