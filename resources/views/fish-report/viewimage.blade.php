@extends('layouts.layout')

@section('content')
<div class="container">
    <h2>Fishing Report</h2>
    <p><strong>Name:</strong> {{ $report->name }}</p>
    

    <div class="image-container">
        <img src="{{ asset($report->image) }}" alt="Fishing Report Image" style="max-width: 100%; height: auto;">
    </div>

    <a href="{{ url()->previous() }}" class="btn btn-primary mt-3">Back</a>
</div>
@endsection
