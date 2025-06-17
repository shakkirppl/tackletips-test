@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Normal Customer</h4>
                        </div>
                        <div class="col-md-6 text-right">
                            <form action="" method="GET">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search by Name, Email, or Mobile" value="{{ request('search') }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-hover" id="customer-table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($customers as  $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->customer_name }}</td>
                                        <td>{{ $customer->customer_email }}</td>
                                        <td>{{ $customer->customer_mobile }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-center">
                            {{ $customers->appends(['search' => request('search')])->links() }}
                        </div>
                    </div>

                    <div class="col-md-6 text-right">
                        <p>Showing {{ $customers->currentPage() }} to {{ $customers->lastPage() }} of {{ $customers->total() }} entries</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
