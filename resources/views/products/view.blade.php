@extends('layouts.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Products Details</h4>
                        </div>
                       
                    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
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
    <div class="container">

    <div style="text-align: center;">
    <h4>{{ $product->name }}</h4>
    <img src="{{ asset('uploads/product/thumb_images/' . $product->product_image) }}" width="200px" height="150px" style="display: block; margin: 0 auto;">
</div>
<table class="table table-dark mb-0">
                            
                            <tbody>
                           
                            <tr>
                                <th scope="row">Product Name </th>
                                <td>{{ $product->name }}</td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Category</th>
                               <td>{{ $product->category->name ?? 'N/A' }}</td>
                                
                            </tr>
                            <tr>
                              <th scope="row">Brand Name </th>
                             
                              <td>{{ $product->brand->name ?? 'N/A' }}</td>
                             
                              </tr>
                            
                             <tr>
                                <th scope="row">Product Price </th>
                                <td>{{ $product->product_price }}</td>
                                
                            </tr>
                            
                            <tr>
                                <th scope="row">Product Price Offer </th>
                                <td>{{ $product->product_price_offer }} </td>
                                
                            </tr>
                            <tr>
                                <th scope="row">Current Status </th>
                                <td>  @if ($product->status == '0')
                                           <span style="color: red; font-weight: bold;">Deactive</span>
                                         @else
                                        <span style="color: white; font-weight: bold;">Active</span>
                                        @endif</td>
                                
                            </tr>
                          
                             
                            </tbody>
                        </table>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

