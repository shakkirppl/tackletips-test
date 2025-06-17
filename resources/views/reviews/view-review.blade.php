@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body text-center">
                    <h3 class="card-title mb-4">Review Details</h3>
                    
                    <div class="mb-3">
                        <strong>Author Name:</strong>
                        <p class="text-primary fs-5">{{ $review->author_name }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Product ID:</strong>
                        <p class="text-success fs-5">{{ $review->product_id }}</p>
                    </div>

                    <div class="mb-3">
                        <strong>Review:</strong>
                        <p>Rating: {!! str_repeat('⭐', $review->rating) !!} </p>
                        <p class="text-muted fs-5">{{ $review->text ?? 'No Review Provided' }}</p>
                    </div>

                    <a href="{{ route('reviews.pending') }}" class="btn btn-secondary mt-3">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
