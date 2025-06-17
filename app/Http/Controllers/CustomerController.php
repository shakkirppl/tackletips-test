<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerRegistration;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $query = CustomerRegistration::query();
    
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where('customer_name', 'LIKE', "%{$search}%")
                  ->orWhere('customer_email', 'LIKE', "%{$search}%")
                  ->orWhere('customer_mobile', 'LIKE', "%{$search}%");
        }
    
        $customers = $query->paginate(15);
    
        return view('customers.index', compact('customers'));
    }
    

}
