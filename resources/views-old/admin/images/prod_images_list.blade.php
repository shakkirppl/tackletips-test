@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Products</h1>

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
                       

<span class="icons_head"><a href="{{url('/add-more-images')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-more-images')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br>
                       
<h5>Product List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        <th width="10%">Id</th>
                                        <th width="30%">Product Name</th>
                                        <th width="30%">Image</th>                                              
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                @foreach($prod_img as $prod_img)
                                    <tr> 
                                        <td>{{ $prod_img->image_id}}</td>
                                        <td>{{ $prod_img->product_name}}</td>
                                        <td><img src="{{url('/uploads/product/thumb_images/'.$prod_img->images) }}" alt="" width="100px" height="100px"></td>
                                        

                                        <td>

                                        <a href="{{url('delete-images/'.$prod_img->image_id) }}""  onclick="return confirm('Are you sure you want to delete');" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a></td>
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