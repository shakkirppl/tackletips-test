@extends('layouts.layout')

@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Add Product</h4>
                        </div>
                        <div class="col-6 text-end">
                        </div>
                    </div>
    
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

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label class="form-label">Product Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="mb-3">
    <label class="form-label">Product Category</label>
    <select name="category_id" id="category" class="form-control" required>
        <option value="">Select</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Sub Category</label>
    <select name="sub_category" id="subcategory" class="form-control" required>
        <option value="">Select</option>
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Brands</label>
    <select name="brand_id" class="form-control select2" required>
        <option value="">Select</option>
        @foreach($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label">Tax</label>
    <select name="tax_id" class="form-control " required>
        <option value="">Select</option>
        @foreach($taxs as $tax)
            <option value="{{ $tax->id }}">{{ $tax->name }}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label class="form-label">Unit (Color,Size,etc...)</label>
    <select name="measurement_id" class="form-control select2" required>
        <option value="">Select</option>
        @foreach($Measurements as $Measurement)
            <option value="{{ $Measurement->id }}">{{ $Measurement->name }}</option>
        @endforeach
    </select>
</div>

       
        <div class="mb-3">
             <label class="form-label">Bar Code</label>
              <input type="text" name="barcode" id="bar_code" class="form-control" required readonly>
        </div>

        <div class="mb-3">
            <label class="form-label">HSN Code</label>
            <input type="text" name="hsncode" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Min Stock</label>
            <input type="text" name="min_stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Max Stock</label>
            <input type="text" name="max_stock" class="form-control" required>
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
<label for="editor">Description</label>
<textarea id="editor" name="description" ></textarea>
</div>





<div class="mb-3">
    <label class="form-label">Purchase Price</label>
    <input type="text" name="net_rate" class="form-control" value="0">
</div>

<div class="mb-3">
    <label class="form-label">Retail Price</label>
    <input type="text" name="mrp_price" class="form-control" value="0">
</div>

<div class="mb-3">
    <label class="form-label">Wholesale Price</label>
    <input type="text" name="wholesale_rate" class="form-control" value="0">
</div>

<div class="mb-3">
    <label class="form-label">Quotation Price</label>
    <input type="text" name="quotation_price" class="form-control" value="0">
</div>


<div class="col-md-12">
     <div class="form-group">
            @foreach($Tag as $key=>$tag)
                <input type="checkbox" id="tag[]" name="tag[]" value="{{$tag->tag_name}}"><label for="vehicle1">{{$tag->tag_name}}</label>
                @endforeach
    </div>
</div>


        <button type="submit" class="btn btn-primary">Add Product</button>
    </form>
    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $('#category').on('change', function() {
            var parent_id = $(this).val();
            
            if (parent_id) {
                $.ajax({
                    url: "{{ url('/get-subcategories') }}/" + parent_id, 
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $('#subcategory').empty().append('<option value="">Select</option>');
                        $.each(data, function(key, value) {
                            $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory').empty().append('<option value="">Select</option>');
            }
        });
    });
</script>
<script>
    $(document).ready(function() {
    // Generate a random barcode number between 10001 and 999999
    var randomBarcode = Math.floor(Math.random() * (999999 - 10001 + 1)) + 10001;
    
    // Set the generated barcode to the input field
    $('#bar_code').val(randomBarcode);
});
</script>


@endsection
