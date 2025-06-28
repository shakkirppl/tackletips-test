@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Add Home Slider Image </h4>
                    <div class="col-md-12 text-right">
            <a href="{{ route('home_slider.index') }}" class="backicon"><i class="mdi mdi-backburger"></i></a>
          </div>
          @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


                    <form action="{{ route('home_slider.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- img_for --}}
                        <div class="form-group">
                            <label for="img_for">Choose Platform</label>
                            <select name="img_for" class="form-control" required>
                                <option value="">----Select----</option>
                                <option value="web">Web (Size 1388*400)</option>
                                <option value="app">App (Size 708*369)</option>
                                <option value="mobile">Mobile (Size 768px *400px)</option> {{-- Added Mobile --}}
                            </select>
                        </div>

                        {{-- img_name --}}
                        <div class="form-group">
                            <label for="img_name">Upload Image</label>
                            <input type="file" name="img_name" class="form-control" accept="image/*" required>
                        </div>
<div class="form-group">
    <label for="url">Select Ad URL Link</label>
    <select name="url" class="form-control select2" required>
        <option value="">-- Select Product --</option>
        @foreach($items as $item)
            <option value="{{ $item->product_id }}">{{ $item->name }}</option>
        @endforeach
    </select>
    @error('url')
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>





                        {{-- Submit --}}
                        <div class="">
                            <button type="submit" class="btn btn-primary">
                                <i class="mdi mdi-content-save"></i> Save
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.5.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2({
            theme: 'bootstrap4', // Optional, for Bootstrap 4 look
            placeholder: 'Select Product',
            allowClear: true,
            width: '100%'
        });
    });
</script>


@endsection


