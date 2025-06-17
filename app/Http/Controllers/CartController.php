<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Darryldecode\Cart\Facades\CartFacade as Cart;
class CartController extends Controller
{
    //
public function addToCart(Request $request)
{
    try {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity', 1);

        $pro = Item::find($productId);
        if (!$pro) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        \Cart::add([
            'id' => $productId,
            'name' => $pro->name . ' ' . $pro->sub_name,
            'price' => $pro->product_price_offer,
            'quantity' => $quantity,
            'attributes' => [
                'image' => $pro->product_image,
                'product_slug' => $pro->product_slug,
            ]
        ]);

        // Convert to indexed array
        $cartItems = array_values(\Cart::getContent()->toArray());

        return response()->json(['cartItems' => $cartItems]);

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

        
        public function my_cart(){
            try {
              $data['cart']= Cart::getContent();
              
               return view('front-end.view-cart',$data);
                } catch (\Exception $e) {
                  
                   return $e->getMessage();
                 }
             }
public function cartCount()
{
    return response()->json(['count' => \Cart::getTotalQuantity()]);
}
      
         
             // Remove item from cart
             public function remove($id)
             {
                 Cart::remove($id);
                 return redirect()->back()->with('success', 'Item removed from cart.');
             }

             public function update(Request $request)
{
    $rowId = $request->rowId;
    $quantity = $request->quantity;

    \Cart::update($rowId, [
        'quantity' => array(
            'relative' => false,
            'value' => $quantity
        ),
    ]);

    $item = \Cart::get($rowId);
    $itemTotal = $item->price * $item->quantity;
    $grandTotal = \Cart::getTotal();

    return response()->json([
        'success' => true,
        'item_total' => $itemTotal,
        'grand_total' => $grandTotal,
    ]);
}

           
}
