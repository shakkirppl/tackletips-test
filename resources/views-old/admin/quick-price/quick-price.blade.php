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
                       

<br>
                       
<h5>Quick Price</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        <th width="2">No</th>
                                        <th width="15%">Product Name</th>
                                        <th width="10%">Image</th>
                                        <th width="15%">Normal Price</th>
                                        <th width="15%">Offer Price</th>
                                        <th width="15%">Normal(Whole sale)</th>
                                        <th width="15%">Offer(Whole sale)</th>
                                                                            
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
<?php $i='0'; ?>
                                    @foreach($products as $products)
                                    <?php $i++; ?>

                <form action="{{url('quick-price-update')}}" method="post">
                    {{csrf_field()}}
                                    <tr>
                                        <td>{{$i}}</td>
                                        <td><?php echo substr($products->product_name,0,100); ?></td>
                                        <td><img src="{{url('/uploads/product/thumb_images/'.$products->product_image) }}" alt="" width="50px" ></td>
                                        <td><input type="number" class="form-control" name="normal_price" required="" value="{{ $products->normal_price }}"></td>
                                         <td><input type="number" class="form-control" name="offer_price" required="" value="{{ $products->offer_price }}"></td>
                                         <td><input type="number" class="form-control" name="wholesale_price" required="" value="{{ $products->wholesale_price }}"></td>
                                       <td><input type="number" class="form-control" name="wholesale_offer_price" required="" value="{{ $products->wholesale_offer_price }}"></td> 

                                       <input type="hidden" name="price_id" value="{{ $products->price_id }}">
                                       

                                        <td><button type="submit" >Update</button></td>
                                    </tr>
                                    </form>
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
        <!-- <script src="{{url('assets/vendors/bower_components/popper.js/dist/umd/popper.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery.scrollbar/jquery.scrollbar.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jquery-scrollLock/jquery-scrollLock.min.js')}}"></script> -->

        <!-- Vendors: Data tables -->
       <!--  <script src="{{url('assets/vendors/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/jszip/dist/jszip.min.js')}}"></script>
        <script src="{{url('assets/vendors/bower_components/datatables.net-buttons/js/buttons.html5.min.js')}}"></script> -->

        <!-- App functions and actions -->
        <script src="{{url('assets/js/app.min.js')}}"></script>

@endsection