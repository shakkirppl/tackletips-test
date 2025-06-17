<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class WishListReviewWebController extends Controller
{
    //
     // Add to wishlist
     public function addToWishList(Request $request)
     {
         if (!Auth::check()) {
             return response()->json(['success' => false, 'message' => 'You must be logged in to add to the wishlist.'], 401);
         }
 
         // Check if product is already in wishlist
         $exists = WishList::where('user_id', Auth::id())
             ->where('product_id', $request->product_id)
             ->exists();
 
         if ($exists) {
             return response()->json(['success' => false, 'message' => 'This product is already in your wishlist.'], 409);
         }
 
         $wishList = new WishList();
         $wishList->user_id = Auth::id();
         $wishList->product_id = $request->product_id;
         $wishList->save();
 
         return response()->json(['success' => true, 'message' => 'Product added to wishlist!']);
     }
 
     // Remove from wishlist
     public function removeFromWishList($id)
     {
         if (!Auth::check()) {
             return redirect()->back()->with('error', 'You must be logged in.');
         }
 
         WishList::where('user_id', Auth::id())
             ->where('product_id', $id)
             ->delete();
 
         return redirect()->back()->with('success', 'Product removed from wishlist.');
     }
 
     // Show wishlist page
     public function index()
     {
         if (!Auth::check()) {
             return redirect()->route('login')->with('error', 'You must be logged in.');
         }
 
         $wishlist = WishList::where('user_id', Auth::id())->with('product')->get();
         return view('front-end.view-wishlist', compact('wishlist'));
     }
    public function addReview(Request $request)
    {
    //  return $request->all();
        try {
     
            $request->validate([
                'product_id' => 'required|exists:items,product_id',
            ]);
    
        DB::transaction(function () use ($request,&$review) {
            if(Auth::user()){
          $review=new Review;
          $review->in_date=Carbon::now()->toDatestring();
          $review->in_time=date('H:i:s');
          $review->product_id=$request->product_id;
          $review->user_id=Auth::user()->id;
          $review->text=$request->text;
          $review->author_name=$request->author;
          $review->rating=4;
          $review->status='Pending';
          $review->save();
            }
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
}
