<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use Carbon\Carbon;
class OrderDashboardController extends Controller
{
    //
    public function index()
    {
        // Today's Orders
        $todayOrders = Orders::whereDate('created_at', Carbon::today())->count();
        
        // This Week's Orders
        $weekOrders = Orders::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->count();
        
        // This Month's Orders
        $monthOrders = Orders::whereMonth('created_at', Carbon::now()->month)->count();
        
        // Till Date Orders
        $totalOrders = Orders::count();
        
        // Pending Orders
        $pendingOrders = Orders::where('order_status_id', '1')->count();

        return view('orders.dashboard', compact(
            'todayOrders', 
            'weekOrders', 
            'monthOrders', 
            'totalOrders', 
            'pendingOrders', 
           
        ));
    }
}
