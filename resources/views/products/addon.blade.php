@extends('layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Add On</h4>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                    </div>
    <h6class="mb-4"> {{$product->name}}</h6>

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
    <form action="{{ route('product.updateAddon', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
      

    <input type="hidden" name="item_id" value="{{ $product->id }}">

        <div class="mb-3">
        <label class="form-label">Unit (Color, Size, etc...)</label>
        <select name="measurement_id" class="form-control select2" required>
            <option value="">Select</option>
            @foreach($Measurements as $Measurement)
                <option value="{{ $Measurement->id }}" {{ $product->measurement_id == $Measurement->id ? 'selected' : '' }}>
                    {{ $Measurement->name }}
                </option>
            @endforeach
        </select>
    </div>
        <div class="mb-3">
            <label class="form-label">Bar Code</label>
            <input type="text" name="barcode" id="bar_code" class="form-control" value="{{ $product->barcode }}" required readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">HSN Code</label>
            <input type="text" name="hsncode" class="form-control" value="{{ $product->hsncode }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Min Stock</label>
            <input type="text" name="min_stock" class="form-control" value="{{ $product->min_stock }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Max Stock</label>
            <input type="text" name="max_stock" class="form-control" value="{{ $product->max_stock }}" required>
        </div>
        <div class="mb-3">
    <label class="form-label">Product Main Image</label>
    <input type="file" name="image_url" class="form-control">
</div>

        <div class="mb-3">
    <label class="form-label">Product Image 1</label>
    <input type="file" name="image_more1" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Product Image 2</label>
    <input type="file" name="image_more2" class="form-control">
</div>

<div class="mb-3">
    <label class="form-label">Product Image 3</label>
    <input type="file" name="image_more3" class="form-control">
</div>


        <div class="mb-3">
            <label class="form-label">Purchase Price</label>
            <input type="text" name="net_rate" class="form-control" value="{{ $product->net_rate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Retail Price</label>
            <input type="text" name="mrp_price" class="form-control" value="{{ $product->mrp_price }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Wholesale Price</label>
            <input type="text" name="wholesale_rate" class="form-control" value="{{ $product->wholesale_rate }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Quotation Price</label>
            <input type="text" name="quotation_price" class="form-control" value="{{ $product->quotation_price }}">
        </div>
  

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea id="editor" name="description">{{ $product->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/40.1.0/classic/ckeditor.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.select2').select2({
            width: '100%',  // Ensures it fits the container
            placeholder: "Select an option",
            allowClear: true
        });
    });
</script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            toolbar: [
                'undo', 'redo', '|', 'bold', 'italic', 'underline', '|',
                'fontFamily', 'fontSize', 'fontColor', 'highlight', '|',
                'bulletedList', 'numberedList', '|', 'insertTable', 'link', 
                'imageUpload', 'mediaEmbed', 'codeBlock', 'sourceEditing'
            ],
      
        });
</script>
<script>
   $(document).ready(function() {
    // Populate subcategory when category is changed
    $('#category').on('change', function() {
        var category_id = $(this).val();
        if (category_id) {
            $.get("{{ url('/get-subcategories') }}/" + category_id, function(data) {
                $('#subcategory').empty().append('<option value="">Select</option>');
                $.each(data, function(key, value) {
                    $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                });
            });
        } else {
            $('#subcategory').empty().append('<option value="">Select</option>');
        }
    });

    // Fetch subcategories when the page loads (Edit Mode)
    var selectedCategory = $('#category').val();
    var selectedSubCategory = "{{ $product->sub_category }}"; // Get stored subcategory ID

    if (selectedCategory) {
        $.get("{{ url('/get-subcategories') }}/" + selectedCategory, function(data) {
            $('#subcategory').empty().append('<option value="">Select</option>');
            $.each(data, function(key, value) {
                $('#subcategory').append('<option value="' + value.id + '"' + 
                    (value.id == selectedSubCategory ? 'selected' : '') + '>' + value.name + '</option>');
            });
        });
    }
});

</script>

@endsection
