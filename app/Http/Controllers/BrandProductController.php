<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
class BrandProductController extends Controller
{
    //
    public function index(Request $request,$id){

        try {
        $cat_id = $id;
         $sort = $request->get('sort', 'newest');
         $data['cat']=Brands::where('url_word','=',$id)->first(); 
         $data['pagename']=$data['cat']->name; 
        $query=Item::query();
              $query->join('brands','brands.id','=','items.brand_id')
                        ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                        ->where('items.status','=','1')
                        ->where('items.prime_id','=','0')
                        ->where('brands.url_word','=',$cat_id)
                        ->distinct();
           if ($request->has('min_price') && $request->has('max_price')) {
    $query->whereBetween('product_price_offer', [
        $request->min_price,
        $request->max_price
    ]);
}
            //       if ($sort == 'price_low_high') {
            //     $query->orderBy('items.product_price_offer', 'asc');
            // } elseif ($sort == 'price_high_low') {
            //     $query->orderBy('items.product_price_offer', 'desc');
            // } else {
            //     $query->orderBy('items.created_at', 'desc');
            // }  
             $data['product']=$query->paginate(80);
        $data['category']=Category::with('subcategories:id,name,parent_id')->get();
        $data['brands']=Brands::get();
        
        
                return view('front-end.product-categories',$data);
        } catch (\Exception $e) {
            
            return $e->getMessage();
          }
        
        
        }
}
