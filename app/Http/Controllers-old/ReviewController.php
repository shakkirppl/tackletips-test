<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;
class ReviewController extends Controller
{
    //
    
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                // 'product_id' => 'required|exists:items,product_id',
                'rating' => 'required|integer|min:1|max:5', // Ensure rating is valid
                'author' => 'required|string',
                'text' => 'required|string',
            ]);
        //     if (!auth()->check()) {
        //       return redirect()->back()->with('error', 'You must be logged in to submit a report.');
        //   }
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }

            DB::transaction(function () use ($request,&$review) {
                $review = new Review();
                $review->in_date = Carbon::now()->toDateString();
                $review->in_time = date('H:i:s');
                $review->product_id = $request->product_id;
                $review->user_id = $request->user()->id;
                $review->text = $request->text;
                $review->author_name = $request->author;
                $review->rating = $request->rating; // Store the rating
                $review->status = 'Pending';
                $review->save();
            });
    
             return response()->json($review, 200);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    
    public function view(Request $request)
    {
      
        try {
     
           $review=Review::find($request->id);
           return response()->json($review);
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_pending(Request $request)
    {
      
        try {
     
           $review=Review::with('product','user')->where('status','Pending')->orderBy('created_at', 'desc')->get();
          return view('reviews.pending',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_active(Request $request)
    {
      
        try {
     
           $review=Review::with('product','user')->where('status','Active')->orderBy('created_at', 'desc')->get();
          return view('reviews.active',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function review_block(Request $request)
    {
      
        try {
     
           $review=Review::with('product','user')->where('status','Block')->orderBy('created_at', 'desc')->get();
          return view('reviews.block',compact('review'));
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function active($id)
    {
      
        try {
     
           $review=Review::find($id);
           $review->status='Active';
           $review->save();
           return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }

    public function block($id)
    {
      
        try {
     
           $review=Review::find($id);
           $review->status='Block';
           $review->save();
           return back();
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }

    public function view_review($id)
{
    $review = Review::findOrFail($id);
    return view('reviews.view-review', compact('review'));
}

    
}
