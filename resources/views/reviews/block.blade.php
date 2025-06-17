@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Pending Reviews</h4>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="value-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Product ID</th>
                                    <th>User Name</th>
                                    <th>Author Name</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Submitted At</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($review as $review)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $review->product_id }}</td>
                                        <td>{{ $review->user->name ?? 'N/A' }}</td>
                                        <td>{{ $review->author_name }}</td>
                                        <td>{{ $review->rating ?? 'N/A' }}</td>
                                        <td><span class="badge bg-warning">{{ $review->status }}</span></td>
                                        <td>{{ $review->created_at->format('Y-m-d H:i:s') }}</td>
                                        <td>
                                            <!-- View Button -->
                                            <a href="{{ route('reviews.show', $review->id) }}" class="btn btn-info btn-sm">View Review</a>

                                            <!-- Approve Button -->
                                            <form action="{{ route('reviews.activate', $review->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-success btn-sm">Approve</button>
                                            </form>

                                            <!-- Block Button -->
                                            <form action="{{ route('reviews.block', $review->id) }}" method="POST" style="display:inline-block;">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-danger btn-sm">Block</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">No Pending Reviews</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
