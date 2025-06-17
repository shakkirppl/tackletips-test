@extends('layouts.layout')
@section('content')

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container">
      
            <div class="card mb-4">
                <div class="d-flex justify-content-end">
    <a href="{{ route('order.invoice', $order->id) }}" target="_blank" class="btn btn-primary">
        <i class="fa fa-print"></i> PrintA4
    </a>
    <a href="{{ route('order.invoicethermal', $order->id) }}" target="_blank" class="btn btn-primary">
        <i class="fa fa-print"></i> Thermal
    </a>
</div>

                <div class="card-header"><h4>Order Details</h4></div>
                <div class="card-body">
                    
                    <p><strong>Amount:</strong> {{ $order->total_amnt }}</p>
                    <p><strong>Ordered Date:</strong> {{ \Carbon\Carbon::parse($order->date)->format('d-m-Y H:i:s') }}</p>
                    <p><strong>Delivery Partner:</strong> {{ $order->delivery_partner ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header"><h4>Customer Details</h4></div>
                <div class="card-body">
                    <p><strong>Name:</strong> {{ $order->customer_name ?? 'N/A' }}</p>
                    <p><strong>Email:</strong> {{ $order->customer_email ?? 'N/A' }}</p>
                    <p><strong>Contact:</strong> {{ $order->customer_mob ?? 'N/A' }}</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header"><h4>Payment Address</h4></div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $order->payment_name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong> {{ $order->customer_email ?? 'N/A' }}</p>
                            <p><strong>Contact:</strong> {{ $order->customer_mob ?? 'N/A' }}</p>
                            <p><strong>Address:</strong> {{ $order->payment_address ?? 'N/A' }}</p>
                            <p><strong>City:</strong>{{ $order->customer->customerState->name ?? 'N/A' }}</p>
                            <p><strong>Zip Code:</strong> {{ $order->customerRegistration->customer_pincode ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-header"><h4>Shipping Address</h4></div>
                        <div class="card-body">
                            <p><strong>Name:</strong> {{ $order->shipping_name ?? 'N/A' }}</p>
                            <p><strong>Email:</strong> {{ $order->customer_email ?? 'N/A' }}</p>
                            <p><strong>Contact:</strong> {{ $order->customer_mob ?? 'N/A' }}</p>
                            <p><strong>Address:</strong> {{ $order->shipping_address ?? 'N/A' }}</p>
                            <p><strong>City:</strong> {{ $order->customer->shippingState->name ?? 'N/A' }}</p>
                            <p><strong>Zip Code:</strong> {{ $order->customerRegistration->shipping_pin ?? 'N/A' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order List -->
            <div class="card">
                <div class="card-header"><h4>Order List</h4></div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody>
    @foreach ($order->orderDetails as $detail)
        <tr>
            <td>{{ $detail->product->name ?? 'N/A' }}</td>
            <td>{{ $detail->quantity }}</td>
            <td>{{ $detail->price }}</td>
            <td>{{ $detail->quantity * $detail->price }}</td>
        </tr>
    @endforeach
</tbody>
<tfoot>
    <tr>
        <td colspan="3" style="text-align: right; font-weight: bold;">Shipping Charge</td>
        <td>₹ {{ number_format($order->shipping_charge, 2) }}</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right; font-weight: bold;">Rod Packing Charge</td>
        <td>₹ {{ number_format($order->rod_packing_charge, 2) }}</td>
    </tr>
    <tr>
        <td colspan="3" style="text-align: right; font-weight: bold;">Total Amount</td>
        <td>₹ {{ number_format($order->total_amnt, 2) }}</td>
    </tr>
</tfoot>

                    </table>
                </div>
            </div>

            <!-- Order Status Update Section -->
          

            <!-- Courier Information Section -->
            <div class="card mt-4">
                <div class="card-header"><h4>Courier Information</h4></div>
                <div class="card-body">
                    <form action="{{ route('orders.update-courier', $order->id) }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="mb-3">
                            <label for="courier_number" class="form-label">Courier Number</label>
                            <input type="text" name="courier_number" id="courier_number" class="form-control" value="{{ $order->courier_number ?? '' }}">
                        </div>
                        <div class="mb-3">
                            <label for="remarks" class="form-label">Remarks</label>
                            <textarea name="courier_remarks" id="remarks" class="form-control">{{ $order->remarks ?? '' }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Courier Info</button>
                    </form>
                </div>
            </div>
            <div class="card mt-4">
                <div class="card-header"><h4>Order Status</h4></div>
                <div class="card-body">
                <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
    @csrf
    @method('PATCH')  <!-- Change POST to PATCH -->
    <div class="mb-3">
        <label for="order_status" class="form-label">Order Status</label>
        <select name="order_status_id" id="order_status" class="form-control">
            @foreach ($orderStatuses as $status)
                <option value="{{ $status->id }}" {{ $order->order_status_id == $status->id ? 'selected' : '' }}>
                    {{ $status->name }}
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Update Status</button>
</form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
