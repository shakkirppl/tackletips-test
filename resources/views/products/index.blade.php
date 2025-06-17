@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Products</h4>
                        </div>
                        <div class="col-6 text-end">
                            <a href="{{ route('product.create') }}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>
                    </div>

                    <!-- Success Message -->
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
           
           @if ($errors->any())
           <div class="alert alert-danger">
             <ul>
               @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
               @endforeach
             </ul>
           </div><br />
           @endif
           
         </div>

                    <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search " value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-hover" id="value-table">
                            <thead>
                                <tr>
                                    <th>Sl.NO</th>
                                    <th>Code</th>
                                    <th>Name</th>
                                     <th>Price</th>
                                     <th>Stock</th>
                                     <th>Status</th>
                                     
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($products as $key => $product)
                                    <tr>
                                        <td>{{ $products->firstItem() + $key }}</td>
                                        <td>{{ $product->product_id }}</td>
                                        <td>{{ $product->name }} {{$product->sub_name}}</td>
                                      
                                        <td>
                                        {{ number_format($product->product_price_offer, 3, '.', ',') }}<br>
                                       <strike>{{ number_format($product->product_price, 3, '.', ',') }}</strike>
                                        </td>
                                        <td>{{ App\Models\StockTransactions::getcurrentstock($product->id) }}</td>

                                        <td>
                                          @if ($product->status == '0')
                                           <span style="color: red; font-weight: bold;">Deactive</span>
                                         @else
                                        <span style="color: green; font-weight: bold;">Active</span>
                                        @endif
                                       </td>

                                       <td>
                                       <a href="{{ route('products.view', $product->id) }}" class="btn btn-info">View</a>
                                       <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning">Edit</a>
                                       <a href="{{ route('product.addon', $product->id) }}" class="btn btn-info">Add-On</a>
                                       <a href="{{ route('edit.images', $product->id) }}" class="btn btn-warning btn-sm">
                                       Image Change
                                       </a>
                                      </td>
                                      


                                       
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="mt-3 d-flex justify-content-center">
    {!! $products->appends(['search' => request('search')])->links('vendor.pagination.bootstrap-5') !!}
</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#value-table').DataTable({
            paging: false, // Disable DataTables pagination (use Laravel pagination)
            searching: false // Disable built-in search (use Laravel search)
        });
    });
</script>
@endsection
