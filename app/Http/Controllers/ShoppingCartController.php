<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\CustomerAddress;
use App\Models\State;
use Illuminate\Http\Request;

class ShoppingCartController extends Controller
{
    // Get all cart items for a user
    public function index(Request $request)
    {
      
        $userId = $request->user()->id;

    // Fetch cart with associated product details
    $cart = ShoppingCart::where('user_id', $userId)->with('product')->get();

    // Fetch the default customer address or the first address
    $customerAddress = CustomerAddress::where('deafult', 1)->where('user_id', $userId)->first();
    if (!$customerAddress) {
        $customerAddress = CustomerAddress::where('user_id', $userId)->first();
    }

    // Calculate delivery charge
    $deliveryCharge = 0;
    if ($customerAddress) {
        $state = State::find($customerAddress->customer_state);
        if(count($cart)>0){
            $deliveryCharge = $state ? $state->delivery_charge : 0;
        }
       else{
        $deliveryCharge = 0;
       }
    }

    // Calculate rod packing charges
    $rodPackingCharge = 0;
   
foreach ($cart as $cartItem) {
    $product = $cartItem->product; // Since it's a belongsTo relationship, directly access it.
    
    if ($product && $product->category_id == 2) {
        $rodPackingCharge += 150;
    }
}

    // Prepare response data
    $data = [
        'deliveryCharge' => $deliveryCharge,
        'rodPackingCharge' => $rodPackingCharge,
    ];

    // Return JSON response
    return response()->json([
        'cart' => $cart,
        'charges' => $data,
    ]);
    
    }

    // Add an item to the cart
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:items,id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
        ]);

        $cart = ShoppingCart::create([
            'user_id' => $request->user()->id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return response()->json($cart, 201);
    }

    // Update the quantity of an item
    public function update(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
            'id' => 'required|integer|min:1',
        ]);
        $id=$request->id;
        $cart = ShoppingCart::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
        $cart->update(['quantity' => $request->quantity]);

        return response()->json($cart);
    }

    // Remove an item from the cart
    public function destroy(Request $request)
    {
        $id=$request->id;
        $cart = ShoppingCart::where('id', $id)->where('user_id', $request->user()->id)->firstOrFail();
        $cart->delete();

        return response()->json(['message' => 'Item removed successfully']);
    }

    // Clear the entire cart
    public function clearCart(Request $request)
    {
        ShoppingCart::where('user_id', $request->user()->id)->delete();

        return response()->json(['message' => 'Cart cleared successfully']);
    }
}
