<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Brands;
use App\Models\Category;
use App\Models\SubCategory;
use DB;
class CategoryController extends Controller
{
    //
    public function index(Request $request,$id){
        
try {
         $thisCate=Category::where('slug','=',$id)->first(); 
         $cat_id = $thisCate->id;
         $sort = $request->get('sort', 'newest');
         $data['pagename']=$thisCate->name; 
         $query =Item::query();
          $query->join('sub_category','sub_category.id','=','items.sub_category')
           ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
         ->where('items.status','=','1')
         ->where('items.category_id','=',$cat_id)
         ->distinct(); 
if ($request->has('min_price') && $request->has('max_price')) {
    $query->whereBetween('product_price_offer', [
        $request->min_price,
        $request->max_price
    ]);
}
if ($sort == 'price_low_high') {
   $query->orderBy('items.product_price_offer', 'asc');
} elseif ($sort == 'price_high_low') {
   $query->orderBy('items.product_price_offer', 'desc');
} else {
   $query->orderBy('items.created_at', 'desc');
}
           
        $data['product']  =$query->paginate(80);      
        $data['category']=  Category::with('subcategories:id,name,parent_id,slug')->get();
        $data['brands']=Brands::get();
      //   if ($request->ajax()) {
      
      //       return view('front-end.include.product-list', ['product' => $data['product']])->render();
      
      // }
        
            return view('front-end.product-categories',$data);
            } catch (\Exception $e) {
            
            return $e->getMessage();
          }
        
        
        }
        public function subCategoryIndex(Request $request,$id){
        
          try {
                 
                   $sort = $request->get('sort', 'newest');
                   $subCategory=SubCategory::where('slug','=',$id)->first(); 
                   $data['pagename']=$subCategory->name; 
                   $cat_id = $subCategory->id;
                   $query =Item::query();
                    $query->join('sub_category','sub_category.id','=','items.sub_category')
                     ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                   ->where('items.status','=','1')
                  ->where('items.sub_category','=',$cat_id)
                   ->distinct(); 
  if ($request->has('min_price') && $request->has('max_price')) {
    $query->whereBetween('product_price_offer', [
        $request->min_price,
        $request->max_price
    ]);
}
        if ($sort == 'price_low_high') {
   $query->orderBy('items.product_price_offer', 'asc');
} elseif ($sort == 'price_high_low') {
   $query->orderBy('items.product_price_offer', 'desc');
} else {
   $query->orderBy('items.created_at', 'desc');
}
                     
                  $data['product']  =$query->paginate(80);      
                  $data['category']=  Category::with('subcategories:id,name,parent_id,slug')->get();
                  $data['brands']=Brands::get();
                //   return   $data['product'] ;
                //   if ($request->ajax()) {
                  
                  
                //       return view('front-end.include.product-list', ['product' => $data['product']])->render();
                  
                // }
                      return view('front-end.product-categories',$data);
                      } catch (\Exception $e) {
                      
                      return $e->getMessage();
                    }
                  
                  
                  }

                  public function new_arrivals(Request $request){
                    try {
                    $data['product']=Item::join('sub_category','sub_category.id','=','items.sub_category')
                                      ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                                       ->where('items.category_id','=','1')
                                   ->where('items.status','=','1')
                                   ->where('items.prime_id','=','0')
                                   ->orderby('items.id','desc')
                                   ->distinct() 
                                   ->limit('15') 
                                   ->get();
                   
                            
                 //   new reel
            $data['new_real']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','1')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
            //   new rod
            $data['new_rod']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','2')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
             //   new line
            $data['new_line']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','3')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
            //   new lure
            $data['new_lure']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','4')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
            //   new accesories
            $data['new_accesories']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','5')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
            //   new terminal tackle
            $data['new_terminal']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','6')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
             //   new apparel
            $data['new_apparel']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','7')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();
             //   new spare
            $data['new_spare']=Item::select('id','product_id','name','sub_name','product_image','product_price','product_price_offer','total_stock_count as web_stock','offer_product','product_slug')
            ->where('status','=','1')->where('category_id','=','8')  
            ->distinct()
            ->orderby('id','desc')
            ->limit('12') 
           ->get();

                   $data['category']=  Category::with('subcategories:id,name,parent_id,slug')->get();
                   $data['brands']=Brands::get();
                   
                   
                           return view('front-end.new-arrivals',$data);
                   
                           } catch (\Exception $e) {
                          
                           return $e->getMessage();
                         } 
                     }
                     public function new_arrivals_category(Request $request,$id){
                      try {
                        $thisCate=Category::where('slug','=',$id)->first(); 
                        $cat_id = $thisCate->id;
                        $sort = $request->get('sort', 'newest');
                        $data['cat']=$thisCate; 
                          $data['pagename']=$thisCate->name; 
                        $query =Item::query();
                        $query->join('sub_category','sub_category.id','=','items.sub_category')
                         ->select('items.id','items.product_id','items.name','items.sub_name','items.product_image','items.product_price','items.product_price_offer','items.total_stock_count as web_stock','items.offer_product','items.product_slug')
                       ->where('items.status','=','1')
                       ->where('items.category_id','=',$cat_id)
                       ->distinct(); 
              if ($sort == 'price_low_high') {
               $query->orderBy('items.product_price_offer', 'asc');
              } elseif ($sort == 'price_high_low') {
               $query->orderBy('items.product_price_offer', 'desc');
              } else {
               $query->orderBy('items.created_at', 'desc');
              }  
                         
                      $data['product']  =$query->paginate(80);   
                      $data['category']=  Category::with('subcategories:id,name,parent_id,slug')->get();
                      $data['brands']=Brands::get(); 
                               return view('front-end.product-categories',$data);
                 } catch (\Exception $e) {
                    
                     return $e->getMessage();
                   } 
                 }
        
}
