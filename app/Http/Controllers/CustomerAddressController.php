<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerAddress;
use App\Models\State;
use App\Models\District;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use DB;
class CustomerAddressController extends Controller
{
    //
    public function address_new(Request $request)
    {
        try {
            $data['state']=State::get();
            $data['mode']='profile';
            return view('front-end.address-new',$data);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function address_edit(Request $request,$id)
    {
        try {
            $data['state']=State::get();
            $data['mode']='profile';
            $data['customerAddress']=CustomerAddress::find($id);
            $data['district']=District::where('state_id',$data['customerAddress']->customer_state)->get();
            return view('front-end.address-edit',$data);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function add_new_shipping_address(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_address' => ['required', 'string', 'max:255'],
            'customer_mobile' => ['required', 'string', 'max:15'],
            'customer_pincode' => ['required', 'string', 'max:15'],
            'customer_city' => ['required', 'string', 'max:255'],
            'customer_dist' => ['required','integer'],
            'customer_state' => ['required','integer']


        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors to Blade
                ->withInput(); // Retain form input
        }
        try {
        $id=Auth::id();
        DB::transaction(function () use ($request, $id) {
            CustomerAddress::where('user_id',$id)
            ->update(['deafult' => 0]);
            $customer=new CustomerAddress;
            $customer->user_id=$id;
            $customer->customer_name=$request->customer_name;
            $customer->customer_mobile=$request->customer_mobile;
            $customer->customer_pincode=$request->customer_pincode;
            $customer->customer_city=$request->customer_city;
            $customer->customer_dist=$request->customer_dist;
            $customer->customer_state=$request->customer_state;
            $customer->customer_address=$request->customer_address;
            $customer->remarks='';
            $customer->deafult=1;
            $customer->save();
          
    }); 
    if ($request->mode === 'checkout') 
    {
        return redirect('checkout');
    }
    else{
        return redirect('my-order');
    }
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update_shipping_address(Request $request)
    {
        //   return $request->all();
        $validator = Validator::make($request->all(),[
            'id' => ['required', 'integer', 'exists:customer_address,id'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_address' => ['required', 'string', 'max:255'],
            'customer_mobile' => ['required', 'string', 'max:15'],
            'customer_pincode' => ['required', 'string', 'max:15'],
            'customer_city' => ['required', 'string', 'max:255'],
            'customer_dist' => ['required','integer'],
            'customer_state' => ['required','integer']


        ]);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator) // Pass validation errors to Blade
                ->withInput(); // Retain form input
        }
        try {
        
        DB::transaction(function () use ($request) {
            $customer= CustomerAddress::find($request->id);
            $customer->customer_name=$request->customer_name;
            $customer->customer_address=$request->customer_address;
            $customer->customer_mobile=$request->customer_mobile;
            $customer->customer_pincode=$request->customer_pincode;
            $customer->customer_city=$request->customer_city;
            $customer->customer_dist=$request->customer_dist;
            $customer->customer_state=$request->customer_state;
            $customer->remarks='';
            $customer->save();
    }); 
        return redirect('my-order');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function address_remove(Request $request,$id)
    {
        try {
            $customerAddress=CustomerAddress::find($id);
            $customerAddress->delete();
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function address_set_default(Request $request,$id)
    {
        try {
            $customerAddress=CustomerAddress::find($id);
            $customerAddress->deafult=1;
            $customerAddress->save();
            CustomerAddress::where('id', '!=', $id)
            ->where('user_id', $customerAddress->user_id)
            ->update(['deafult' => 0]);
            return back();
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function getDeliveryCharge(Request $request)
{
    $address = CustomerAddress::find($request->id);

    if (!$address) {
        return response()->json(['success' => false, 'message' => 'Address not found']);
    }

    $delivery = State::where("id", $address->customer_state)->first();

    if (!$delivery) {
        return response()->json(['success' => false, 'message' => 'State not found']);
    }

    return response()->json([
        'success' => true,
        'deliveryCharge' => $delivery->delivery_charge
    ]);
}
}
