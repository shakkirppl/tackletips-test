@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Processing Orders</h4>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn btn-primary mb-2" id="exportExcel" onclick="exportTableToExcel('processing-table', 'Processing Orders Report')">
                                <i class="fa fa-file-excel-o"></i> Export
                            </button>
                        </div>
                    </div>

                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="processing-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Delivery</th>
                                    <th>Amount</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td><label class="badge badge-info">{{ $order->orderStatus->name ?? 'N/A' }}</label></td>
                                        <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                                        <td>{{ $order->order_number }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->customer_mob }}</td>
                                        <td>{{ $order->delivery_partner }}</td>
                                        <td>{{ $order->total_amnt }}</td>
                                        <td>
                                            <a href="{{ route('orders.view', $order->id) }}" class="btn btn-warning">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $orders->links() }} Total {{ $orders->total() }} entries
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    $(document).ready(function () {
        $('#processing-table').DataTable();
    });

    function exportTableToExcel(tableID, reportName) {
        let table = document.getElementById(tableID);
        let workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
        XLSX.writeFile(workbook, `${reportName}.xlsx`);
    }
</script>
@endsection
