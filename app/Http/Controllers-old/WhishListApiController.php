<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Review;
use DB;
use App\Models\WishList;
use Illuminate\Support\Facades\Validator;
class WhishListApiController extends Controller
{
    //
    public function get_wish_list(Request $request)
    {
        $userId = $request->user()->id;

        $cart = WishList::where('user_id', $userId)->with('product')->get();
        return response()->json($cart);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:items,id',
        ]);
  // Return validation errors if validation fails
  if ($validator->fails()) {
    return response()->json([
        'success' => false,
        'errors' => $validator->errors()
    ], 422); // HTTP 422 Unprocessable Entity
}
        $wishList =new  WishList;
        $wishList->user_id=$request->user()->id;
        $wishList->product_id=$request->product_id;
        $wishList->save();
        return response()->json($wishList, 200);
    }
    public function remove_from_wish_list(Request $request)
    {
        // Validate the request input
        $request->validate([
            'product_id' => 'required|exists:items,id',
        ]);
    
        // Retrieve the wishlist item for the user and specified product
        $wishList = WishList::where('user_id', $request->user()->id)
            ->where('product_id', $request->product_id)
            ->first();
    
        // Check if the wishlist item exists before attempting to delete
        if ($wishList) {
            $wishList->delete();
            return response()->json([
                'data' => [],
                'success' => true,
                'messages' => ['Wishlist item removed successfully'],
            ]);
        }
    
        // If the wishlist item does not exist, return an appropriate response
        return response()->json([
            'data' => [],
            'success' => false,
            'messages' => ['Wishlist item not found'],
        ]);
    }

    public function clear_wish_list(Request $request)
    {
        // Delete all wishlist items for the authenticated user
        $deleted = WishList::where('user_id', $request->user()->id)->delete();
    
        // Check if any items were deleted and respond accordingly
        if ($deleted) {
            return response()->json([
                'data' => [],
                'success' => true,
                'messages' => ['All wishlist items removed successfully'],
            ]);
        }
    
        // If no items were deleted, respond with a message
        return response()->json([
            'data' => [],
            'success' => false,
            'messages' => ['No wishlist items found to remove'],
        ]);
    }
    
}
