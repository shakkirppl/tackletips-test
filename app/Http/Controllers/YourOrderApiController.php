<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\GoodsOutOnline;
use App\Models\GoodsOutDetailOnline;
use App\Models\User;
class YourOrderApiController extends Controller
{
    //
    public function viewOrder(Request $request)
    {
      
        try {
            
           if($results=GoodsOutDetailOnline::where('order_prime_id',$request->id)->get())
           {
            $data['vieworder']=$results;
            return response()->json($results);
           }
           else{
            $data['vieworder']=[];
            return response()->json(['data'=>[],'success'=>false,'messages'=>['No data Found']]);
           }
          
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }

    public function yourOrder(Request $request)
    {
      
        try {
            $userId=$request->user()->id;
           $user=User::find($userId);
           if( $results=Orders::where('customer_id',$user->customer_id)->get())
           {
            $data['orders']=$results;
            return response()->json($results);
           }
           else{
            $data['orders']=[];
            return response()->json(['data'=>[],'success'=>false,'messages'=>['No data Found']]);
           }
          
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
}
