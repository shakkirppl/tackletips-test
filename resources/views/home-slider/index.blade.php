@extends('layouts.layout')

@section('content')
<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Home Slider Images</h4>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                   
                     <div class="col-12 text-right">
                            <a href="{{ route('home_slider.create') }}" class="newicon"><i class="mdi mdi-new-box"></i></a>
                        </div>

                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>Platform</th>
                                    <th>URL</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($images as $index => $img)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
     <td>
    <img src="{{ asset('uploads/home-slider/' . $img->img_name) }}" style="width: 150px; height: 50px; border-radius: 0;">
</td>



                                        <td>{{ ucfirst($img->img_for) }}</td>
                                        <td>{{ $img->url }}</td>
                                        <td>
                                            <form action="{{ route('home_slider.destroy', $img->img_id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td colspan="5">No images found.</td></tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<style>
  .table-responsive {
    overflow-x: auto;
  }
  .table th, .table td {
    padding: 5px;
    text-align: center;
  }
  .btn-sm {
    padding: 3px 6px;
    font-size: 10px;
  }
  .newicon i {
    font-size: 30px;
  }
</style>
@endsection
