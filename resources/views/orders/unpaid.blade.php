@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12">
                            <h4 class="card-title">Unpaid Orders</h4>
                        </div>
                        <div class="col-6 col-md-6 col-sm-6 col-xs-12 heading" style="text-align:end;">
                            <!-- Optional right-side controls -->
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" class="btn btn-primary mb-2" id="myexel" target="_blank" onclick="exportTableToExcel('value-table', 'Unpaid Orders Report')">
                                <i class="fa fa-file-excel-o"></i> Export
                            </button>
                        </div>
                    </div>

                    @if($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table" id="value-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>OrderID</th>
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
        $('#value-table').DataTable();
    });

    function exportTableToExcel(tableID, reportName) {
        let table = document.getElementById(tableID);
        let clonedTable = table.cloneNode(true);

        let actionColIndex = -1;
        const headerCells = clonedTable.rows[0].cells;

        for (let i = 0; i < headerCells.length; i++) {
            if (headerCells[i].innerText.trim().toLowerCase() === 'actions') {
                actionColIndex = i;
                break;
            }
        }

        if (actionColIndex !== -1) {
            for (let row of clonedTable.rows) {
                if (actionColIndex < row.cells.length) {
                    row.deleteCell(actionColIndex);
                }
            }
        }

        for (let header of clonedTable.rows[0].cells) {
            header.style.fontWeight = 'bold';
        }

        for (let row of clonedTable.rows) {
            for (let cell of row.cells) {
                if (cell.innerText.toLowerCase().includes('total') || cell.innerText.toLowerCase().includes('grand total')) {
                    cell.style.textAlign = 'right';
                    cell.style.fontWeight = 'bold';
                }
            }
        }

        let workbook = XLSX.utils.table_to_book(clonedTable, { sheet: "Sheet 1" });
        XLSX.writeFile(workbook, `${reportName}.xlsx`);
    }
</script>
@endsection
