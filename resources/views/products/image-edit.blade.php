@extends('layouts.layout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Edit Product Images</h4>
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

                    <form action="{{ route('update.images', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('POST')

    @foreach ($product->images as $image)
    <div class="mb-3">
        <label class="form-label"> Image {{ $loop->iteration }}</label>
        <br>
        <img src="{{ asset('uploads/product/thumb_images/' . $image->images) }}" width="100">
        <input type="file" name="images[{{ $image->image_id }}]" class="form-control mt-2">
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Update Images</button>
</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
