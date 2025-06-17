@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <h4 class="card-title">Orders Tracking</h4>
                        </div>
                    </div>

                    @if($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                    @endif

                    <!-- Filter Form -->
                    <form method="GET" action="{{ route('orders.tracking') }}">
                        <div class="row mb-12">
                            <div class="col-md-3">
                                <label>Delivery Status</label>
                                <select name="delivery_status" id="order_status" class="form-control">
                                      <option value="">Select Status</option>
                                         @foreach ($orderStatuses as $status)
                                           <option value="{{ $status->id }}" {{ request('delivery_status') == $status->id ? 'selected' : '' }}>
                                           {{ $status->name }}
                                      </option>
                                         @endforeach
                               </select>
                            </div>
                            <div class="col-md-2">
                                <label>Order No</label>
                                <input type="text" name="order_number" class="form-control" value="{{ request('order_number') }}">
                            </div>
                            <div class="col-md-3">
                                <label>Customer Name</label>
                                <input type="text" name="customer_name" class="form-control" value="{{ request('customer_name') }}">
                            </div>
                            <div class="col-md-3">
                                <label>Phone Number</label>
                                <input type="text" name="customer_mob" class="form-control" value="{{ request('customer_mob ') }}">
                            </div>
                            <div class="col-md-3">
                                <label>From Date</label>
                                <input type="date" name="from_date" class="form-control" value="{{ request('date') }}">
                            </div>
                            <div class="col-md-3">
                                <label>To Date</label>
                                <input type="date" name="to_date" class="form-control" value="{{ request('date') }}">
                            </div>
                            <div class="col-md-3">
            <label>Product</label>
            <select name="product_id" class="form-control select2" >
            <option value="">Select Product</option>
            @foreach ($products as $product)
                <option value="{{ $product->id }}">{{ $product->name }}</option>
            @endforeach
        </select>
        </div>

    
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{ route('orders.tracking') }}" class="btn btn-secondary">Reset</a>
                    </form>
                    <!-- End Filter Form -->
                    <div class="d-flex justify-content-end">
    <button type="button" class="btn btn-primary mb-2" id="myexel" target="_blank" onclick="exportTableToExcel('value-table-old', 'Order Report')">
        <i class="fa fa-file-excel-o"></i> Export
    </button>
</div>
<form id="printForm" action="{{ route('orders.print') }}" method="POST">
    @csrf
                    <div class="table-responsive mt-3">
                        <table class="table" id="value-table-old">
                            <thead>
                                <tr>
                                <th><input type="checkbox" id="select-all"></th> <!-- Select All Checkbox -->
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>OrderID</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Total amount</th>
                                    
                                    <th>Actions</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                    <td><input type="checkbox" class="order-checkbox" name="order_ids[]" value="{{ $order->id }}"></td>
                                    <td><label class="badge badge-info">{{ $order->orderStatus->name ?? 'N/A' }}</label></td>
                                    <td>{{ \Carbon\Carbon::parse($order->date)->format('d-m-Y') }}</td>
                                     <td>{{ $order->order_number}}</td>
                                    <td>{{ $order->customer_name}}</td>
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
                    </div>
<!-- Button to trigger bulk printing -->
<button type="submit" id="print-selected" class="btn btn-primary mt-2">Print Selected Invoices</button>
</form>
                    <!-- {{ $orders->appends(request()->query())->links() }} -->

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

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
    $(document).ready(function () {
        $('#value-table').DataTable();
    });
</script>
<script>
    // function exportTableToExcel(tableID, filename = 'invoice-report.xlsx') {
    //     let table = document.getElementById(tableID);
    //     let workbook = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
    //     XLSX.writeFile(workbook, filename);
    // }
    function exportTableToExcel(tableID, reportName) {
    // Get the table element by ID
    let table = document.getElementById(tableID);

    // Clone the table to avoid altering the original table in the DOM
    let clonedTable = table.cloneNode(true);

    // Find the "Action" column index by matching the header text
    let actionColIndex = -1;
    const headerCells = clonedTable.rows[0].cells;

    for (let i = 0; i < headerCells.length; i++) {
        if (headerCells[i].innerText.trim().toLowerCase() === 'action') {
            actionColIndex = i;
            break;
        }
    }

    // Remove the "Action" column if it exists
    if (actionColIndex !== -1) {
        for (let row of clonedTable.rows) {
            if (actionColIndex < row.cells.length) {
                row.deleteCell(actionColIndex);
            }
        }
    } else {
        console.warn("Action column not found. No column removed.");
    }

    // Style headers and right-align "Total" and "Grand Total" columns
    for (let header of clonedTable.rows[0].cells) {
        header.style.fontWeight = 'bold'; // Make headers bold
    }

    // Iterate over rows to style the "Total" and "Grand Total" cells
    for (let row of clonedTable.rows) {
        for (let cell of row.cells) {
            // Align "Total" and "Grand Total" cells to the right and bold them
            if (cell.innerText.toLowerCase().includes('total') || cell.innerText.toLowerCase().includes('grand total')) {
                cell.style.textAlign = 'right'; // Align text to the right
                cell.style.fontWeight = 'bold'; // Make bold
            }
        }
    }

    // Convert the styled cloned table to a workbook
    let workbook = XLSX.utils.table_to_book(clonedTable, { sheet: "Sheet 1" });

    // Use the report name as the filename for the Excel file
    XLSX.writeFile(workbook, `${reportName}.xlsx`);
}

    </script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select All functionality
    document.getElementById("select-all").addEventListener("change", function() {
        let checkboxes = document.querySelectorAll(".order-checkbox");
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Bulk Print Function
    document.getElementById("print-selected").addEventListener("click", function() {
        let selectedOrders = [];
        document.querySelectorAll(".order-checkbox:checked").forEach(checkbox => {
            selectedOrders.push(checkbox.value);
        });

        if (selectedOrders.length === 0) {
            alert("Please select at least one order.");
            return;
        }

    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    // Select All functionality
    document.getElementById("select-all").addEventListener("change", function() {
        let checkboxes = document.querySelectorAll(".order-checkbox");
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    // Ensure at least one checkbox is selected before submitting the form
    document.getElementById("print-selected").addEventListener("click", function(event) {
        let selectedOrders = document.querySelectorAll(".order-checkbox:checked");
        if (selectedOrders.length === 0) {
            alert("Please select at least one order to print.");
            event.preventDefault(); // Stop form submission
        }
    });
});
</script>

@endsection
