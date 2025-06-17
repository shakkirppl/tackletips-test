@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Reviews</h1>

                    <div class="actions">
                       <p>STORE</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

{{-- <span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br> --}}
                       
<h5>User Reviews</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        
                                        <th width="15%">Author</th>
                                        <th width="10%">Product</th>
                                        <th width="30%">Review Text</th>
                                        <th width="10%">Status</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>

                                    @foreach($review as $review)
                                    <tr>

                                        <td>{{ $review->author_name }}</td>
                                        <td>{{ $review->product_id }}</td>
                                        <td>{{ $review->text }}</td>
                                       
                                        <?php  
                                        $stat = $review->review_status;
                                        if ($stat=='0') { ?>

                                            <td><button type="button" class="btn btn-outline-danger">Disabled</button></td>

                                       <?php }else{ ?>

                                        <td><button type="button" class="btn btn-outline-success">Enabled</button></td>

                                     <?php  }
                                        ?>

                                        <td><a href="{{url('edit-review-stat/'.$review->review_id)}}" class="btn btn-light btn--icon"><i class="zmdi zmdi-edit zmdi-hc-fw"></i></a>

                                        <a href="{{url('delete-review-stat/'.$review->review_id)}}" onclick="return confirm('Are you sure you want to delete);" class="btn btn-light btn--icon"><i class="zmdi zmdi-delete zmdi-hc-fw"></i></a></td>
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