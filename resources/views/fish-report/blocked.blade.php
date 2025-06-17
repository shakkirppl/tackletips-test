@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
  <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                    
                     <div class="row">
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12" >
                             <h4 class="card-title">Blocked Reports</h4>
                    </div>
                    <div class="col-6 col-md-6 col-sm-6 col-xs-12  heading" style="text-align:end;">
                  
                    </div>
                    <div class="d-flex justify-content-end">
                    
                  </div>
                   
                </div>
                    
@if($message = Session::get('success'))
<div class="alert alert-sucess">
  <p>{{$message}}</p>
</div>
@endif
 
                 
                  <p class="card-description">
                
                  </p>
                  <div class="table-responsive">
              
                  <table class="table" id="value-table">
    <thead>
        <tr>
            <th>Sl. No</th>
            <th>User Name</th>
            <th>Name</th>
            <th>Place</th>
            <th>Tackle Used</th>
            <th>Status</th>
            <th>Action</th>
            <th>Image</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($fishReports as $report)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $report->user->name ?? 'N/A' }}</td>
            <td>{{ $report->name }}</td>
            <td>{{ $report->place }}</td>
            <td>{{ $report->tacke_used }}</td>
            <td>
                @if($report->status == 0)
                    <span class="badge badge-warning">Pending</span>
                @elseif($report->status == 1)
                    <span class="badge badge-success">Active</span>
                @else
                    <span class="badge badge-danger">Blocked</span>
                @endif
            </td>
            <td>
                <form action="{{ route('fishReports.updateStatus', $report->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" class="update-status" data-id="{{ $report->id }}">
                     <option value="0" {{ $report->status == 0 ? 'selected' : '' }}>Pending</option>
                    <option value="1" {{ $report->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="2" {{ $report->status == 2 ? 'selected' : '' }}>Blocked</option>
                   </select>
                   <button type="submit" class="btn btn-primary btn-sm">Update</button>
                   <td>
    @if($report->image)
        <a href="{{ route('fishingReports.viewImage', $report->id) }}" class="btn btn-info btn-sm">
            View Image
        </a>
    @else
        <span>No Image</span>
    @endif
</td>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

                        
                    
                  </div>
                </div>
              </div>
            </div>
            </div>
            </div>

            <script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.update-status').forEach(select => {
            select.addEventListener('change', function () {
                let reportId = this.getAttribute('data-id');
                let newStatus = this.value;

                fetch(`/fishReports/updateStatus/${reportId}`, {
                    method: "PUT",
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
                        "Content-Type": "application/json",
                    },
                    body: JSON.stringify({ status: newStatus })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert("Status updated successfully!");
                        location.reload(); // Reload page to reflect changes
                    } else {
                        alert("Failed to update status.");
                    }
                })
                .catch(error => console.error('Error:', error));
            });
        });
    });
</script>

            
@endsection
