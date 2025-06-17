<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use DB;
class CustomerAddressApiController extends Controller
{
    //
    public function store(Request $request)
    {
// return $request->all();
        try {
     
            $request->validate([
                'customer_name' => 'required',
                'customer_mobile'=> 'required',
            ]);
    
        DB::transaction(function () use ($request,&$address) {
          $address=new CustomerAddress;
          $address->customer_name=$request->customer_name;
          $address->customer_mobile=$request->customer_mobile;
          $address->customer_pincode=$request->customer_pincode;
          $address->user_id=$request->user()->id;
          $address->customer_dist=$request->customer_dist;
          $address->customer_state=$request->customer_state;
          $address->customer_address=$request->customer_address;
          $address->remarks=$request->remarks;
          $address->deafult=0;
          $address->save();
        }); 
        return response()->json($address, 200);
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function view(Request $request)
    {
      
        try {
     
           $results=CustomerAddress::find($request->id);
           return response()->json($results);
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function list(Request $request)
    {
      
        try {
     
           $results=CustomerAddress::with('district','state')->where('user_id',$request->user()->id)->get();
           return response()->json($results);
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function update(Request $request)
    {
      
        try {
     
            $request->validate([
                'id' => 'required|exists:customer_address,id',
                'customer_name' => 'required',
                'customer_mobile'=> 'required',
            ]);
    
        DB::transaction(function () use ($request,&$address) {
          $address=CustomerAddress::find($request->id);
          $address->customer_name=$request->customer_name;
          $address->customer_mobile=$request->customer_mobile;
          $address->customer_pincode=$request->customer_pincode;
          $address->user_id=$request->user()->id;
          $address->customer_dist=$request->customer_dist;
          $address->customer_state=$request->customer_state;
          $address->customer_address=$request->customer_address;
          $address->remarks=$request->remarks;
          $address->save();
        }); 
        return response()->json($address, 200);
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function delete(Request $request)
    {
      
        try {
     
            $request->validate([
                'id' => 'required|exists:customer_address,id',
            ]);
    
        DB::transaction(function () use ($request,&$address) {
          $address=CustomerAddress::find($request->id);
          $address->delete();
        }); 
        return response()->json($address, 200);
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function deafult(Request $request)
    {
      
        try {
     
            $request->validate([
                'id' => 'required|exists:customer_address,id',
            ]);
    
        DB::transaction(function () use ($request,&$address) {
          $address=CustomerAddress::find($request->id);
          $address->deafult=1;
          $address->save();
          CustomerAddress::where('id', '!=', $request->id)
            ->where('user_id', $address->user_id)
            ->update(['deafult' => 0]);
        }); 
        return response()->json($address, 200);
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
}
