@extends('layouts.admin-layout')

@section('style')

@endsection

@section('content')




<!-- content -->
                <header class="content__title">
                    <h1>Products</h1>

                    <div class="actions">
                       <p>Tackle</p>
                    </div>
                </header>
                
                <div class="card">
                    <div class="card-body">
                       

<span class="icons_head"><a href="{{url('/add-product')}}" class="btn btn-primary btn--icon"><i class="zmdi zmdi-plus" style="padding-top: 11px;"></i></a>
                        <a href="{{url('/add-product')}}" class="btn btn-danger btn--icon"><i class="zmdi zmdi-delete" style="padding-top: 11px;"></i></a>
                        </span><br>
                       
<h5>Product List</h5>
                        <div class="table-responsive">
                            <table id="data-table" class="table table-bordered">
                                <thead class="thead-default">
                                    <tr >
                                        <th width="2%">Id</th>
                                        <th width="5%">sl.No</th>
                                        <!--<th width="5%">Sort</th>-->
                                        <th width="10%">Name</th>
                                        <th width="10%">Image</th> 
                                        <th width="3%">Price</th> 
                                        <th width="5%">Stock</th>                          
                                        <th width="5%">Status</th>
                                        <th width="5%">Featured</th>                                     
                                        <th>Action</th>
                                    </tr>
                                </thead>
                              
                                <tbody>
                                <?php $i='0'; ?>
                                    @foreach($products as $products)
                                    <?php $i++; ?>
                                    <tr>
                                       <td>{{$i}}</td>
                                       <td>{{$products->product_id}}</td>
                                        <!--<td>{{$products->web_sort_order}}</td>-->
                                           <td>{{$products->name}}{{$products->sub_name}}</td>
                                  
                                       
                                        <td><img src="{{url('/uploads/product/thumb_images/'.$products->product_image) }}" alt="" width="80px" height="80px"></td>
                                        
                                       
                                        <td>
                                            {{number_format($products->product_price_offer, 3, '.', ',')}}<br>
                                            <strike>{{number_format($products->product_price, 3, '.', ',')}}</strike>
                                        
                                        
                                        </td>
                                       <td>{{App\Models\StockTransactions::getcurrentstock($products->id)}}</td>


                                        <?php  
                                        $stat = $products->status;
                                        if ($stat=='0') { ?>

                                            <td><img src="{{url('/uploads/images/disable.png') }}" alt="" width="30px" height="30px"></td>

                                       <?php }else{ ?>

                                        <td><img src="{{url('/uploads/images/enable.png') }}" alt="" width="30px" height="30px"></td>

                                     <?php  }
                                        ?>
                                        <td>
                                            <?php
                                            $feat = $products->featured;
                                            if ($feat=='0') { ?>
                                                 <a class="btn btn-danger btn-sm" href="{{url('set-featured/'.$products->id)}}" onclick="return confirm('Are you sure you want to make this product featured');">Unfeatured</a>
                                          <?php   }else { ?> 
                                            <a href="{{url('set-unfeatured/'.$products->id)}}" onclick="return confirm('Are you sure you want to remove this product from featured list');" class="btn btn-success btn-sm">Featured</a>
                                         <?php }
                                            ?>

                                        </td>

                                        <td>
                                        
                                        <a href="{{url('view-product/'.$products->id)}}" class="btn bg-pink btn-sm" style="width:70px;margin:2px">View</a>
                                        <a href="{{url('edit-product/'.$products->id)}}" class="btn bg-pink btn-sm" style="width:70px;margin:2px">Edit</a>

@if($products->measurement_id!=1)
                                        <a href="{{url('add-addon/'.$products->id)}}" class="btn bg-amber btn-sm" style="width:70px;margin:2px">Add Addon</a>
@endif

                                        <?php
                                         $seas = $products->sessonal;
                                            if ($seas=='0') { ?>
                                                 <a class="btn btn-danger btn-sm" href="{{url('set-sessonal/'.$products->id)}}" onclick="return confirm('Are you sure you want to make this product sessonal');">Unsessonal</a>
                                          <?php   }else { ?> 
                                            <a href="{{url('set-unsessonal/'.$products->id)}}" onclick="return confirm('Are you sure you want to remove this product from sessonal list');" class="btn btn-success btn-sm">Sessonal</a>
                                         <?php }
                                            ?>
                                              <a href="{{url('items_image/edit/'.$products->id)}}" class="btn bg-amber btn-sm" style="width:70px;margin:2px">Image Change</a>
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