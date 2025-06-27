<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\OrderStatus;
use App\Models\Item;

use Illuminate\Support\Facades\Auth;
class AllOrderController extends Controller
{

    public function index()
    {
        $orders = Orders::with('orderStatus','customer')->paginate(10); 
        return view('orders.index', compact('orders'));
    }

    public function view($id)
    {
       $order = Orders::with('detail', 'status','customerRegistration')->findOrFail($id);
        $orderStatuses = OrderStatus::all();
        return view('orders.order-view', compact('order','orderStatuses'));
    }

    
   


    public function updateCourier(Request $request, $orderId)
{
    $order = Orders::findOrFail($orderId);
    $order->courier_number = $request->courier_number;
    $order->courier_remarks = $request->courier_remarks;
    $order->save();

    return redirect()->back()->with('success', 'Courier information updated successfully!');
}

public function updateStatus(Request $request, $orderId)
{
    
    $request->validate([
        'order_status_id' => 'required|exists:order_status,id',
    ]);

    $order = Orders::findOrFail($orderId);
    $order->update(['order_status_id' => $request->order_status_id]);

    return redirect()->back()->with('success', 'Order status updated successfully!');
}

public function processing()
{
    $orders = Orders::with('orderStatus', 'customer')
        ->where('order_status_id', 1)
        ->paginate(10);
    
    return view('orders.processing-order', compact('orders'));
}

public function orders_tracking(Request $request)
{
    $query = Orders::query();

    // Filter by delivery status
    if ($request->filled('delivery_status')) {
        $query->where('order_status_id', $request->delivery_status);
    }

    // Filter by Order No
    if ($request->filled('order_number')) {
        $query->where('order_number', 'LIKE', '%' . $request->order_number . '%');
    }

    // Filter by Customer Name
    if ($request->filled('customer_name')) {
        $query->where('customer_name', 'LIKE', '%' . $request->customer_name . '%');
    }

    // Filter by Phone Number
    if ($request->filled('customer_mob')) {
        $query->where('customer_mob', 'LIKE', '%' . $request->customer_mob . '%');
    }

    // Filter by Date Range
    if ($request->filled('from_date') && $request->filled('to_date')) {
        $query->whereBetween('created_at', [$request->from_date, $request->to_date]);
    }

    // Filter by Product ID (Order Details)
    if ($request->filled('product_id')) {
        $query->whereHas('detail', function ($q) use ($request) {
            $q->where('order_details.product_id', $request->product_id);
        });
    }

    // Fetch orders with relationships
    $orders = $query->with(['detail', 'orderStatus'])->orderBy('id', 'DESC')->paginate(5000);

    // Fetch dropdown data
    $products = Item::all();
    $orderStatuses = OrderStatus::all();

    return view('orders.order-tracking', compact('orders', 'products', 'orderStatuses'));
}
public function printInvoiceA4($id)
{
    $order = Orders::with('details.product')->findOrFail($id);
    
    $currency = $order->currency ; 

    return view('orders.print-invoice', compact('order', 'currency'));
}
public function printInvoicethermal($id)
{
    $order = Orders::with('details.product')->findOrFail($id);
    
    $currency = $order->currency ; 

    return view('orders.thermal-print', compact('order', 'currency'));
}

public function printSelected(Request $request)
{
    $orderIds = $request->input('order_ids');

    if (!$orderIds) {
        return back()->with('error', 'No orders selected!');
    }

    $orders = Orders::with('details.product', 'customer.customerState', 'customer.shippingState')
                    ->whereIn('id', $orderIds)
                    ->get();

                    $currencies = $orders->pluck('currency')->unique();
    return view('orders.multi-print', compact('orders', 'currencies'));
}


public function unpaid()
{
    $orders = Orders::with('orderStatus', 'customer')
        ->where('paid', 0)
        ->paginate(10);

    return view('orders.unpaid', compact('orders'));
}

}
