<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as Requests;
use DB;
use Hash;
use Image;
use File;
use Mail;
use Illuminate\Support\Facades\Crypt;
use Session;
use Redirect;
use Charts;
use App\Models\Orders;
use Carbon\Carbon;
use App\Models\Item;
use App\Models\ProductImages;
use App\Models\Measurement;
use App\Models\StockTransactions;
use App\Models\GoodsOutOnline;
use App\Models\GoodsOutDetailOnline;
class ShoppingController extends Controller
{
    public function test(Request $request){
try {


return StockTransactions::getstocktest(4427);

     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}
    
   public function autocomplete(Request $request)
    {
        $data = Measurement::select("name as value", "id")
                    ->where('name', 'LIKE', '%'. $request->get('search'). '%')
                    ->get();
    
        return response()->json($data);
    }
    
public function login(){


        return view('admin/login');

    }

    public function check_login(Request $request){
try {

        $username=$request->input('username');
$password=$request->input('password');


$result=DB::table('admins')->where('email','=',$username)->where('password','=',$password)->get();

if(!$result->isEmpty()){

    $request->session()->put('adminusername',$username);
    return redirect('admin/dash-board');
}else{

    $request->session()->flash('logerror','1');
    return redirect('/my-admin');
   
 
}
    } catch (\Exception $e) {
       
        return $e->getMessage();
      }
    }

public function myadmin_logout(Request $request){


    $request->session()->forget('adminusername');
    return redirect('/my-admin');
}



public function dash_board(){
try {
if (session('adminusername')) {

    $data['orders'] = 0;
    $data['purchase'] = 0;
    $data['customers'] = 0;
    $data['products'] = 0;
    // $data['chart'] = Charts::database(Order::all(), 'bar', 'highcharts')
    //                         ->title("Order History Graph")
    //                         ->elementLabel("Orders")
    //                          ->colors(['#C5CAE9','#283593'])
                           
    //                         ->dimensions(1000, 500)
    //                         ->responsive(false)
    //                         ->groupByMonth();
    $data['latest_orders'] = DB::table('orders')
                            ->orderBy('id','desc')
                            ->limit(5)
                            ->get();
    $data['recent_reg'] = DB::table('customer_registration')
                        ->orderBy('id','desc')
                        ->limit(5)
                        ->get();
    return view('admin/dash-board',$data);

    }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function list_category(Request $request){
try {
if (session('adminusername')) {

$data['category']=DB::table('sub_category')
                ->orderBy('id', 'desc')  
                ->get();
return view('admin/category/list-category',$data);

 }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }

}

public function add_category(Request $request){
try {
if (session('adminusername')) {
$data['category']=DB::table('categories')
                ->get();
return view('admin/category/add-category',$data);
 }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}
public function add_new_category(Request $request){
    
   try {   
    $data = request()->validate([
            'category' => 'required',
            'parent_category' => 'required|numeric|not_in:0',
         
        ]);
DB::table('sub_category')->insert([

'name'=>$request->input('category'),
'parent_id'=>$request->input('parent_category')
    ]);

 $request->session()->flash('succ','Successfully Added New Category');
    return back();
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function edit_category($id)
{
    try {
    if (session('adminusername')) {
    $data['ed_cat'] = DB::table('sub_category')
                    ->where('id','=',$id)
                    ->get();
    $data['category']=DB::table('categories')
    ->get();
    return view('admin.category.edit-category',$data);
    }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function update_category(Request $request)
{
    try {
    $cid = $request->input('category_id');
    $category = $request->input('category');
  
    $parent_category = $request->input('parent_category_ed');


                 DB::table('sub_category')
                    ->where('id', '=', $cid)
                    ->update([
                        'name' => $category, 
                        'parent_id' => $parent_category
                   
                            ]);  

                              $request->session()->flash('succ','Succesfully Updated!');    

                        return redirect('category/categories');  

 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function delete_category($id, Request $request)
{
    try {
        DB::table('sub_category')->where('id','=',$id)->delete();       
       
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('category/categories');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}


public function list_products()
{
    try {
        if (session('adminusername')) {
            $data['products'] = DB::table('items')
                ->orderBy('items.id', 'desc')
                ->paginate(500); // Fetches 150 products per page

            return view('admin.product.list-product', $data);
        } else {
            return redirect('/my-admin');
        }
    } catch (\Exception $e) {
        return $e->getMessage(); // Returns the exception message
    }
}

public function add_product()
{
    try {
    if (session('adminusername')) {
    $data['maincategory'] = Db::table('categories')                      
                        ->get();
 $data['subcategory'] = Db::table('sub_category')                      
                        ->get();
    $data['brands'] = Db::table('brands')
                ->get();
    $data['taxes'] = Db::table('taxes')
                ->get();
 $data['Tag'] = Db::table('product_tag')
                ->get();
    $data['measurement_unit'] = Db::table('measurement_unit')
                ->get();
         
               
             $data['barcode'] =  rand(10001, 999999);
    return view('admin.product.add-product',$data);
     }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_new_product(Request $request)
{
    // return $request->all();
            //
        //   return $request->all();
   $this->validate($request, [
          'name' => 'required',
          'sub_category' => 'required|numeric',
          'tax_id' => 'required|numeric',
          'brand_id' => 'required|numeric',
          'category_id' => 'required|numeric',
          'min_stock' => 'required|numeric', 
          'max_stock' => 'required|numeric',
          'image_url'=>'required',
          'net_rate' => 'required|numeric',
          'wholesale_rate' => 'required|numeric',
          'mrp_price' => 'required|numeric',
          'quotation_price' => 'required|numeric'
       ]);
       

   try {
         if (session('adminusername')) {
       
             if( $file = $request->file('image_url') ) {
             
        $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        }else{$storyimagename='defalut.jpg';}
   
 if($request->input('tag')){
            $tag = implode(',', $request->input('tag'));

        }else{
            $tag ="";
        }
        
                $prod_slug = preg_replace('~[^\pL\d]+~u', '-',$request->input('name'));  
                
                $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
                $prod_slug = preg_replace('~[^-\w]+~', '', $prod_slug);
                $prod_slug = trim($prod_slug, '-');  
                $prod_slug = preg_replace('~-+~', '-', $prod_slug);  
                $prod_slug = strtolower($prod_slug);
        
      DB::transaction(function () use ($request,$storyimagename,$tag,$prod_slug)  {
             $measurementaddon=Measurement::where('id',$request->input('measurement_id'))->first();
            $items = new Item;
            $items->product_slug=$prod_slug;
            $items->name = $request->input('name');
            $items->sub_name = $measurementaddon->name;
            $items->category_id = $request->input('category_id');
            $items->item_type ='FinishedGoods';
            $items->sub_category =$request->input('sub_category');
            $items->brand_id = $request->input('brand_id');
            $items->tax_id = $request->input('tax_id');
            $items->tax_included = 1;
            $items->description = $request->input('description');
            $items->barcode = $request->input('barcode');
            $items->hsncode = $request->input('hsncode');
            $items->measurement_id = $request->input('measurement_id');
            $items->min_stock = $request->input('min_stock');
            $items->max_stock = $request->input('max_stock');
            $items->profit_amount = 0;
            $items->profit_percentage = 0;
            $items->net_rate = $request->input('net_rate');
            $items->wholesale_rate = $request->input('wholesale_rate');
            $items->mrp_price = $request->input('mrp_price');
            $items->quotation_price = $request->input('quotation_price');
            $items->product_image = $storyimagename;
            $items->convertion_qty = 1;
            $items->prime_id = 0;
            $items->sord_order = 1;
            $items->user_id = 1;
            $items->group_id = 0;
            $items->web_sort_order = 0;
            $items->status = 1;
            $items->product_price = $request->input('mrp_price');
            $items->product_price_offer=$request->input('mrp_price');
            $items->offer_product=0;
            $items->save();
            $items_data = Item::find($items->id);
            $items_data->product_id='PRDC'.$items->id;
            $items_data->tag_name=$tag;
            $items_data->save();
            
            $path = 'uploads/product/thumb_images';
            
            if( $file = $request->file('image_url') ) {
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            
            if( $file = $request->file('image_more1') ) {
                    $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            if( $file = $request->file('image_more2') ) {
                       $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            if( $file = $request->file('image_more3') ) {
                        $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }

        
    });   
         }

    return back();
 
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function view_product($id)
{
    try {
    $data['view_prod'] = DB::table('items')
                    ->where('id','=',$id)
                    ->get();
    $data['items_addon'] = Item::where('group_id',$id)->where('prime_id',1)->paginate(25);
    $data['img']=DB::table('product_images')->where('product_id','=',$id)->get();

    return view('admin.product.view-product',$data);
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_addon_product(Request $request)
{

             $this->validate($request, [
          'measurement_id' => 'required|numeric',
           'min_stock' => 'required|numeric', 
          'max_stock' => 'required|numeric',
          'image_url'=>'required',
          'net_rate' => 'required|numeric',
          'wholesale_rate' => 'required|numeric',
          'mrp_price' => 'required|numeric',
          'quotation_price' => 'required|numeric', 
          
       ]);
    try {
        
        
             if( $file = $request->file('image_url') ) {
             
              $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        }else{$storyimagename='defalut.jpg';}
        
 
   $id=$request->input('item_id');
   
 DB::transaction(function () use ($request,$storyimagename,$id)  {
   
            $items_data = Item::find($id);
            $group_id=$items_data->id;
            $measurement=Measurement::where('id',$items_data->measurement_id)->first();
            $items_data->product_slug=Item::getitemslug($items_data->name.$measurement->name);
            $items_data->group_id =$group_id;
            $items_data->measurement_name = $measurement->name;
            $items_data->sub_name = $measurement->name;
            $items_data->is_multiple = 'yes';
            $items_data->save();
   
   $measurementaddon=Measurement::where('id',$request->input('measurement_id'))->first();
            $items = new Item;
            $items->name = $items_data->name;
            $items->product_slug=Item::getitemslug($items_data->name.$measurementaddon->name);
            $items->sub_name = $measurementaddon->name;
            $items->category_id = $items_data->category_id;
            $items->item_type = $items_data->item_type;
            $items->sub_category =$items_data->sub_category;
            $items->brand_id = $items_data->brand_id;
            $items->tax_id = $items_data->tax_id;
            $items->tax_included = $items_data->tax_included;
            $items->description = $request->input('description');
            $items->barcode = $request->input('barcode');
            $items->hsncode = $request->input('hsncode');
            $items->measurement_id = $request->input('measurement_id');
            $items->min_stock = $request->input('min_stock');
            $items->max_stock = $request->input('max_stock');
            $items->profit_amount = 0;
            $items->profit_percentage = 0;
            $items->net_rate = $request->input('net_rate');
            $items->wholesale_rate = $request->input('wholesale_rate');
            $items->mrp_price = $request->input('mrp_price');
            $items->quotation_price = $request->input('quotation_price');
            $items->product_image = $storyimagename;
            $items->convertion_qty =1;
            $items->prime_id = 1;
            $items->sord_order = 1;
            $items->user_id = 1;
            $items->group_id = $group_id;
            $items->web_sort_order = 0;
            $items->status = 1;
            $items->product_price = $request->input('mrp_price');;
            $items->product_price_offer=$request->input('mrp_price');;
            $items->offer_product=0;
            $items->tag_name=$items_data->tag_name;
            $items->save();
            $items_data = Item::find($items->id);
            $items_data->product_id='PRDC'.$items->id;
            $items_data->save();
            
            $path = 'uploads/product';
            if( $file = $request->file('image_url') ) {
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            if( $file = $request->file('image_more1') ) {
             $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            if( $file = $request->file('image_more2') ) {
             $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }
            if( $file = $request->file('image_more3') ) {
            $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        
            $p_image = new ProductImages;
            $p_image->product_id=$items_data->product_id;
            $p_image->images=$storyimagename;
            $p_image->save();
            }

      });
    return back();
 
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}


public function edit_product($id)
{
    try {
 if (session('adminusername')) {
    $data['ed_prod'] = DB::table('items')
                    ->where('id','=',$id)
                    ->get();
    $data['category']=DB::table('categories')
                     ->where('id','!=',0)
    ->get();
    $data['brands'] =  DB::table('brands')
                    ->get();
    return view('admin.product.edit-product',$data);
     }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function reset_stock($id)
{
    try {
 if (session('adminusername')) {
    $data['item'] = DB::table('items')
                    ->where('id','=',$id)
                    ->first();

    return view('admin.product.add-stock',$data);
     }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_stock_product(Request $request)
{
    try {
    $item_id = $request->input('item_id');
    $product_qty = $request->input('product_qty');
    $quantity = DB::table('items')
                    ->where('id','=',$item_id)
                    ->first();
    $total = $quantity->web_stock;
    $remaning_stock = $total+$product_qty;

        DB::table('items')->where('id','=',$item_id)->update([

        'web_stock' => $remaning_stock,
       
        'updated_at' => \Carbon\Carbon::now()
    ]);
            return redirect('/products');
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}
     public function image_edit($id)
    {
          try {
    $items=Item::find($id);
    $ProductImages=ProductImages::where('product_id',$items->product_id)->get();

    return view('admin.product.image_edit',['items'=>$items,'ProductImages'=>$ProductImages]);

              
          } catch (\Exception $e) {

    return $e->getMessage();
  }
        
    }
     public function product_delete_image($id)
     {
          $p_image =ProductImages::where('image_id', $id)->delete();
           return back();
    }
         public function product_post_image(Request $request)
    {
    
          $path = 'uploads/product';
            $items=Item::find($request->id);
                  
            if( $file = $request->file('image_url') ) {
            $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
            $p_image =ProductImages::where('image_id', $request->img1)->update(['images' => $storyimagename]);
            $items_image=Item::find($request->id);
             $items_image->product_image=$storyimagename;
              $items_image->save();
            // $p_image->product_id=$items->product_id;
            // $p_image->images=$storyimagename;
            // $p_image->save();
            // $ProductImages=ProductImages::where('image_id',$request->img1)->first();
            // if($ProductImages)
            // $ProductImages->delete();
            }
             if( $file = $request->file('image_more1') ) {
            $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        $p_image =ProductImages::where('image_id', $request->img2)->update(['images' => $storyimagename]);
            // $p_image =new ProductImages;
            // $p_image->product_id=$items->product_id;
            // $p_image->images=$storyimagename;
            // $p_image->save();
            // $ProductImages=ProductImages::where('image_id',$request->img2)->first();
            //  if($ProductImages)
            // $ProductImages->delete();
            }
            if( $file = $request->file('image_more2') ) {
            $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        $p_image =ProductImages::where('image_id', $request->img3)->update(['images' => $storyimagename]);
        //   $p_image =new ProductImages;
        //      $p_image->product_id=$items->product_id;
        //     $p_image->images=$storyimagename;
        //     $p_image->save();
            //  $ProductImages=ProductImages::where('image_id',$request->img3)->first();
            //   if($ProductImages)
            // $ProductImages->delete();
            }
            if( $file = $request->file('image_more3') ) {
           $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        $p_image =ProductImages::where('image_id', $request->img4)->update(['images' => $storyimagename]);
            //  $p_image =new ProductImages;
            //  $p_image->product_id=$items->product_id;
            // $p_image->images=$storyimagename;
            // $p_image->save();
            //  $ProductImages=ProductImages::where('image_id',$request->img4)->first();
            //   if($ProductImages)
            // $ProductImages->delete();
            }
             return back();
    }
public function update_product(Request $request)
{
    
    
    //   return $request->all();
            //
        //   return $request->all();
   $this->validate($request, [
          'item_id' => 'required|numeric',
          'product_name' => 'required',
          'product_brand' => 'required|numeric',
          'product_desc' => 'required',
          'product_price' => 'required', 
          'product_offer' => 'required'
          
       ]);
       

   try {
         if (session('adminusername')) {
       
       
         $old_items = Item::find($request->item_id);
             if($request->file('image')) {
                 $file = $request->file('image');
         
        $randomId       =   rand(1000,9000);
        $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($file->getRealPath())->resize(700,600);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        }else{$storyimagename=$old_items->product_image;}
  
      DB::transaction(function () use ($request,$storyimagename)  {
            $items = Item::find($request->item_id);
            $items->name = $request->input('product_name');
            $items->brand_id = $request->input('product_brand');
            $items->description = $request->input('product_desc');
            $items->barcode = $request->input('barcode');
            $items->hsncode = $request->input('hsncode');
            $items->min_stock = $request->input('min_stock');
            $items->max_stock = $request->input('max_stock');
            $items->product_image = $storyimagename;
            $items->product_price = $request->input('product_price');
            $items->product_price_offer=$request->input('product_offer');
            $items->save();
    });   
         }

    return back();
 
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }

}

public function delete_product($id, Request $request)
{
    try {
       
        $catimage=DB::select('select * from items where id = ?',[$id]);
                            foreach ($catimage as $key => $value) 
                            {
                                $proimg=$value->product_image;
                                
                            }
         DB::table('items')->where('id','=',$id)->delete();             
        

        unlink('uploads/product/single-product/'.$proimg);
                            unlink('uploads/product/thumb_images/'.$proimg);
                            unlink('uploads/product/single-product/small/'.$proimg);
        
        return redirect('/products');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}


public function reset_product_stock($id, Request $request)
{
    
    DB::table('items')->where('id','=',$id)->update([
        
        
        'web_stock' => '0'
        ]);
       
        
        return redirect('/products');
}

public function add_addon($id, Request $request)
{
    try {
     $data['barcode'] =  rand(10001, 999999);
   $data['item']= DB::table('items')->where('id','=',$id)->first();
   $data['addon']= DB::table('items')->where('group_id','=',$id)->get();
$addong= DB::table('items')->select('items.group_id')->where('group_id','=',$id)->get();


   $data['measurement_unit'] = Db::table('measurement_unit')->whereNotIn('id',[$data['item']->measurement_id,1])
                ->get();    
        
        return view('admin.product.addon-product',$data);
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}




public function quantity_price()
{
    try {
    if (session('adminusername')) {
    $data['qp_product'] =  DB::table('products_price_list')
                        ->join('products','products.product_id','products_price_list.product_id')
                        ->get();
    return view('admin.quantity.qty-price',$data);
      }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_product_quantity_price(){
try {
    if (session('adminusername')) {
    $data['sel_product'] = DB::table('items')
    ->get();

    return view('admin.quantity.add-quantity',$data);
    }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_new_qtyprice(Request $request)
{
    try {
    $select_product = $request->input('select_product');
    $normal_price = $request->input('normal_price');
    $offer_price = $request->input('offer_price');
    $tax_percentage = $request->input('tax_percentage');
    $min_quantity = $request->input('min_quantity');
   


    DB::table('products_price_list')->insert([

        'product_id' => $select_product,
        'normal_price' => $normal_price,
        'offer_price' => $offer_price,
        'tax_percentage' => $tax_percentage,
        'min_qty' => $min_quantity,
        'created_at' => \Carbon\Carbon::now()

    ]);

    DB::table('product_stock_list')->insert([
        'product_id' => $select_product,

    ]);

    return back();

 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function edit_qty_price($id)
{
    try {
    if (session('adminusername')) {
    $data['edit_qtyprice'] = DB::table('products_price_list')
                            ->where('price_id','=',$id)
                            ->get();
    $data['sel_product'] = DB::table('products')
                            ->get();
    return view('admin.quantity.edit-quantity', $data);
    }
    else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}



public function update_qtyprice(Request $request)
{
    try {
    $price_id = $request->input('price_id');
    $select_product = $request->input('select_product');
    $normal_price = $request->input('normal_price');
    $offer_price = $request->input('offer_price');
    $tax_percentage = $request->input('tax_percentage');
    $min_quantity = $request->input('min_quantity');
   

    DB::table('products_price_list')->where('price_id','=',$price_id)->update([

        'product_id' => $select_product,
        'normal_price' => $normal_price,
        'offer_price' => $offer_price,
        'tax_percentage' => $tax_percentage,
        'min_qty' => $min_quantity,
        'updated_at' => \Carbon\Carbon::now()

    ]);

    return redirect('quantity_price');
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function delete_qtyprice($id, Request $request)
{
try {
        DB::table('products_price_list')->where('price_id','=',$id)->delete();
        DB::table('product_stock_list')->where('stock_id','=',$id)->delete();
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('quantity_price');
         } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function ad_stock()
{
    try {
    if (session('adminusername')) {
    $data['ad_stock'] = DB::table('product_stock_list')
                        ->join('items','items.product_id','product_stock_list.product_id')
                        ->join('products_price_list','products_price_list.product_id','=','product_stock_list.product_id')
                        ->get();

    return view('admin.stock.stock', $data);
    }else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_stock()
{
    try {
    if (session('adminusername')) {
    $data['prod'] = DB::table('items')
                    ->get();

    return view('admin.stock.add-stock',$data);
    }else {
         return redirect('/my-admin');
    }
     } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function add_new_stock(Request $request)
{
    try {
    $select_product = $request->input('select_product');
    $total_quantity = $request->input('total_quantity');
    $add_date = $request->input('added_date');
    $stock_status = $request->input('stock_status');
    


    DB::table('product_stock_list')->insert([

        'product_id' => $select_product,
        'total_qty' => $total_quantity,
        'added_date' => $add_date,
        'stock_status' => $stock_status,
        'created_at' => \Carbon\Carbon::now()

    ]);

    return back();
 } catch (\Exception $e) {
       
        return $e->getMessage();
      }
}

public function edit_stock($id)
{

    if (session('adminusername')) {
    $data['edit_stock'] = DB::table('product_stock_list')
                            ->where('stock_id','=',$id)
                            ->get();
    $data['sel_product'] = DB::table('items')
                            ->get();
    return view('admin.stock.edit-stock', $data);
}else {
         return redirect('/my-admin');
    }
}

public function update_stock(Request $request)
{
    $stock_id = $request->input('stock_id');
    $select_product = $request->input('select_product');
    $total_quantity = $request->input('total_quantity');
    $remaining = $request->input('rem');
    // $remaining_quantity = DB::table('product_stock_list')
    //                 ->where('stock_id','=',$stock_id)
    //                 ->get();
    // foreach($remaining_quantity as $remaining_quantity)
    // {
    //     $remaining = $remaining_quantity->remaining_qty;
    // }
    $remaning_stock = $total_quantity+$remaining;

    $add_date = $request->input('added_date');
    $stock_status = $request->input('stock_status');


    DB::table('product_stock_list')->where('stock_id','=',$stock_id)->update([

        'product_id' => $select_product,
        'total_qty' => $remaning_stock,
        'remaining_qty' => $remaning_stock,
        'added_date' => $add_date,
        'stock_status' => $stock_status,
        'updated_at' => \Carbon\Carbon::now()

    ]);

    return redirect('ad_stock');
}

public function user_reviews()
{
     if (session('adminusername')) {
    $data['review'] = DB::table('review')
                    ->orderBy('created_at', 'desc')      
                        ->get();
    return view('admin.review.review',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function edit_review_status($id)
{
    if (session('adminusername')) {
    $data['edit_review'] = DB::table('review')
                        ->where('id','=',$id)
                        ->get();
    return view('admin.review.edit-review',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function update_review(Request $request)
{
    $review_id = $request->input('review_id');
    $status = $request->input('re_status');

    DB::table('review')->where('id','=',$review_id)->update([
        'review_status' => $status

    ]);

    return redirect('/user_reviews');
}

public function delete_review($id)
{

        DB::table('review')->where('id','=',$id)->delete();
        return redirect('user_reviews');

}

public function list_customers(Request $request){
if (session('adminusername')) {
$request->session()->flash('customers','navigation__sub--active navigation__sub--toggled');
$request->session()->flash('adcustomers','navigation__active');
$request->session()->flash('custgroup','navigation__active');
$request->session()->flash('wholesale_cust','navigation__active');
   
$data['customers']=DB::table('customer_registration')
               
                ->orderBy('id', 'desc')  
                ->get();
           
return view('admin.customers.customers',$data);
}else {
         return redirect('/my-admin');
    }
}

public function customer_groups()
{
    if (session('adminusername')) {
    $data['cust_groups'] =  DB::table('customer_group')
                            ->get();
    return view('admin.customers.customer_group.customer-group',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function add_customer_group()
{
    if (session('adminusername')) {
    return view('admin.customers.customer_group.add-customer-group');
    }else {
         return redirect('/my-admin');
    }
}

public function add_new_cust_group(Request $request)
{
    $group_name = $request->input('group_name');
    $group_desc = $request->input('group_desc');
   
    


    DB::table('customer_group')->insert([

        'group_name' => $group_name, 
        'group_desc' => $group_desc,
        'created_at' => \Carbon\Carbon::now()

    ]);

    return redirect('customer_groups');

}

public function edit_customer_group($id)
{
    if (session('adminusername')) {
    $data['edit_cust'] = DB::table('customer_group')
                        ->where('group_id','=',$id)
                        ->get();
    return view('admin.customers.customer_group.edit-customer-group',$data);
    }else {
         return redirect('/my-admin');
    }
}


public function update_customer_group(Request $request)
{
    $group_id = $request->input('group_id');
    $group_name = $request->input('group_name');
    $group_desc =  $request->input('group_desc');
   


    DB::table('customer_group')->where('group_id','=',$group_id)->update([

        'group_id' => $group_id,
        'group_name' => $group_name,
        'group_desc' => $group_desc,
        'updated_at' => \Carbon\Carbon::now()

    ]);

    return redirect('customer_groups');
}

public function delete_customer_group($id)
{
     DB::table('customer_group')->where('group_id','=',$id)->delete();
        return redirect('customer_groups');
}

public function view_ad_customer($id)
{
    if (session('adminusername')) {
    $data['view_cust'] = DB::table('customer_registration')
                    ->where('id','=',$id)
                    ->get();
    return view('admin.customers.view-customers',$data);
     }else {
         return redirect('/my-admin');
    }
}


public function ad_purchase(Request $request)
{
    if (session('adminusername')) {
$request->session()->flash('sales','navigation__sub--active navigation__sub--toggled');
$request->session()->flash('purchase','navigation__active');
$request->session()->flash('orders','navigation__active');
$request->session()->flash('guest','navigation__active');



   
$data['purchase']=DB::table('purchase')
                ->join('customer_registration','customer_registration.id','=','purchase.customer_id')
            
            ->orderBy('purchase.purchase_id','desc')
                ->get();
return view('admin.purchase.purchase',$data);
 }else {
         return redirect('/my-admin');
    }
}

public function view_purchase_list($id)
{
    if (session('adminusername')) {
    $data['view_purchase'] = DB::table('purchase')
                        ->where('purchase_id','=',$id)
                        ->get();

    return view('admin.purchase.view-purchase',$data);
     }else {
         return redirect('/my-admin');
    }
}

public function ad_orders()
{
    if (session('adminusername')) {
    $data['ad_orders'] =  DB::table('orders')
    
     ->join('order_status','order_status.id','=','orders.order_status_id')
    ->select('orders.*','order_status.name')
    ->where('orders.paid',1)
    ->orderBy('orders.id', 'desc')
    ->get();
  
    
    return view('admin.orders.orders',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function ad_orders_unpaid()
{
    if (session('adminusername')) {
    $data['ad_orders'] =  DB::table('orders')
    
     ->join('order_status','order_status.id','=','orders.order_status_id')
    ->select('orders.*','order_status.name')
    ->where('orders.paid',0)
    ->orderBy('orders.id', 'desc')
    ->get();
  
    
    return view('admin.orders.orders-un-paid',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function view_orders_list($id)
{
    if (session('adminusername')) {

    $aa=$data['view_orders'] = Orders::with('customer')->where('order_id','=',$id)
                            ->get();



    $bb=$data['order_stat'] = DB::table('order_status')
                            ->get();

    return view('admin.orders.view-orders',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function update_order_status(Request $request)
{
    $order_id = $request->input('order_id');
   
    $order_status = $request->input('order_status');

    DB::table('orders')->where('order_id','=',$order_id)
        ->update([

            'order_status_id' => $order_status


        ]);

    return redirect('ad_orders');
   
}
public function update_order_courier_detail(Request $request)
{
    $order_id = $request->input('order_id');
   
    $courier_number = $request->input('courier_number');
     $remarks = $request->input('remarks');

    DB::table('orders')->where('order_id','=',$order_id)
        ->update([

            'courier_remarks' => $remarks,
             'courier_number' => $courier_number


        ]);

    return redirect('ad_orders');
   
}

public function order_invoice($id)
{
    if (session('adminusername')) {
    $data['order_id'] = $id;
    $data['print_invoice'] = DB::table('orders')
                        ->where('order_id','=',$id)
                        ->get();
                        
     $data['goods_out']=GoodsOutOnline::with('customer','detail')->where('order_prime_id',$id)->first();    

    return view('admin.orders.invoicea4',$data);
     }else {
         return redirect('/my-admin');
    }
}

public function wholesale_customers()
{
    if (session('adminusername')) {
    $data['wholesale_group'] = DB::table('customer_registration')
                            ->join('customer_group','customer_group.group_id','=','customer_registration.customer_type')
                            ->where('customer_type','=','3')
                            ->select('customer_registration.*','customer_group.group_name')
                            ->get();
    return view('admin.customers.wholesale.wholesale',$data);
     }else {
         return redirect('/my-admin');
    }
}

public function approve_wholesale_customer($id)
{
     DB::table('customer_registration')
            ->where('id','=',$id)
            ->update([
                   'status'=> 1 
            ]);
    return redirect('/wholesale_customers');

}

public function disapprove_wholesale_customers($id)
{
    DB::table('customer_registration')
            ->where('id','=',$id)
            ->update([
                   'status'=> 0 
            ]);
    return redirect('/wholesale_customers');
}

public function block_customer($id)

{
    if (session('adminusername')) {
    DB::table('customer_registration')
            ->where('id','=',$id)
            ->update([
                   'status'=> 0 
            ]);
    return redirect('/ad_customers');
      }else {
         return redirect('/my-admin');
    }
}

public function unblock_customer($id)
{
    DB::table('customer_registration')
            ->where('id','=',$id)
            ->update([
                   'status'=> 1 
            ]);
    return redirect('/ad_customers');
}

public function guest_orders()
{
    if (session('adminusername')) {
    $data['guest'] = DB::table('guest')
                    ->join('order_status','order_status.id','=','guest.order_status')
                    ->select('guest.*','order_status.name')
                    ->where('status','=','1')
                    ->get();
    return view('admin.orders.guest.guest',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function view_guest_orders($id)
{
    if (session('adminusername')) {
    $data['view_guest'] = DB::table('guest')
                        ->where('guest_id','=',$id)
                        ->get();
    $data['order_stat'] = DB::table('order_status')
                        ->get();
    return view('admin.orders.guest.view-guest',$data);
    }else {
         return redirect('/my-admin');
    }
}

public function update_guest(Request $request)
{
    $guest_id = $request->input('guest_id');
    $order_status = $request->input('order_status');
    $shipping_address = $request->input('shipping_address');


    DB::table('guest')->where('guest_id','=',$guest_id)
        ->update([

            'order_status' => $order_status,
            'address' => $shipping_address

        ]);

    return redirect('ad_guest_orders');
   
}

public function calender()

{
    if (session('adminusername')) {
    return view('admin.calender');
    }else {
         return redirect('/my-admin');
    }
}

public function sales_report()
{
    if (session('adminusername')) {
    $data['completed_orders'] = DB::table('orders')
            ->where('order_status_id','=','4')
            ->get();
    return view('admin.reports.sales.sales',$data);
     }else {
         return redirect('/my-admin');
    }
}



public function ad_advertisment()
{
    if (session('adminusername')) {
    $data['advertisment'] = DB::table('adds')
            ->orderby('page','asc')
            ->get();
    return view('admin.advertisment.advertisment',$data);
     }else {
         return redirect('/my-admin');
    }
}



public function add_advertisment()
{
   if (session('adminusername')) {
       $data['products']=DB::table('items')->orderby('product_name','asc')->get();
    return view('admin.advertisment.add-advertisment',$data);
    }else {
         return redirect('/my-admin');
    }
}



public function add_new_ads(Request $request){
if (session('adminusername')) {
    
     if($request->page=='app'){
if($request->file('image')){
$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = public_path('uploads/user-profile/thumb_images');

$destinationPath = 'uploads/ads';
$thumb_img = Image::make($photo->getRealPath())->resize(391,178);
// $watermark = Image::make('assets/watermark-user-profile-thumb.png')->opacity(50);
// $thumb_img->insert($watermark,  'bottom-right', 5, 5);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

}
DB::table('adds')->insert([
    'page'=>$request->input('page'),
    'image'=>$storyimagename,
    'url'=>$request->input('url')
    ]);
 return redirect('/advertisment');
        
     }
 if($request->page=='home-top-eng' || $request->page=='home-top-arabic'){   
if($request->file('image')){
$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = public_path('uploads/user-profile/thumb_images');

$destinationPath = 'uploads/ads';
$thumb_img = Image::make($photo->getRealPath())->resize(391,178);
// $watermark = Image::make('assets/watermark-user-profile-thumb.png')->opacity(50);
// $thumb_img->insert($watermark,  'bottom-right', 5, 5);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

}
DB::table('adds')->insert([
    'page'=>$request->input('page'),
    'image'=>$storyimagename,
    'url'=>$request->input('url')
    ]);
 return redirect('/advertisment');
    
 }elseif($request->page=='home-bottom-eng' || $request->page=='home-bottom-arabic'){
     
     
     
     if($request->file('image')){
$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = public_path('uploads/user-profile/thumb_images');

$destinationPath = 'uploads/ads';
$thumb_img = Image::make($photo->getRealPath())->resize(382,310);
// $watermark = Image::make('assets/watermark-user-profile-thumb.png')->opacity(50);
// $thumb_img->insert($watermark,  'bottom-right', 5, 5);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

}
DB::table('adds')->insert([
    'page'=>$request->input('page'),
    'image'=>$storyimagename,
    ]);
 return redirect('/advertisment');
     
     
     
 }elseif($request->page=='best-collection'){
     
     
     
     if($request->file('image')){
$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = public_path('uploads/user-profile/thumb_images');

$destinationPath = 'uploads/ads';
$thumb_img = Image::make($photo->getRealPath())->resize(1920,700);
// $watermark = Image::make('assets/watermark-user-profile-thumb.png')->opacity(50);
// $thumb_img->insert($watermark,  'bottom-right', 5, 5);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

}
DB::table('adds')->insert([
    'page'=>$request->input('page'),
    'image'=>$storyimagename,
    ]);
 return redirect('/advertisment');
     
     
     
 }else{
     
     
        if($request->file('image')){
$photo = $request->file('image'); 
$storyimagename = time().'.'.$photo->getClientOriginalExtension(); 
// $destinationPath = public_path('uploads/user-profile/thumb_images');

$destinationPath = 'uploads/ads';
$thumb_img = Image::make($photo->getRealPath())->resize(243,366);
// $watermark = Image::make('assets/watermark-user-profile-thumb.png')->opacity(50);
// $thumb_img->insert($watermark,  'bottom-right', 5, 5);
$thumb_img->save($destinationPath.'/'.$storyimagename,80);

}
DB::table('adds')->insert([
    'page'=>$request->input('page'),
    'image'=>$storyimagename,
    ]);
 return redirect('/advertisment');
     
     
     
 }
 
 
 
 
 
 
    
    
    }else {
         return redirect('/my-admin');
    }
}


public function delete_adds($id)
{
    $adsimage=DB::select('select * from adds where add_id = ?',[$id]);
                        foreach ($adsimage as $key => $value) 
                        {
                            $proimg=$value->image;
                            
                        }
     DB::table('adds')->where('add_id','=',$id)->delete();
      unlink('uploads/ads/'.$proimg);
            
        return redirect('/advertisment');
}

public function orders_pending(){
    if (session('adminusername')) {
    $data['orders_pending'] = DB::table('orders')
                            ->where('order_status_id','=','1')
                            ->get();
    return view('admin.reports.pending-orders',$data);

     }else {
         return redirect('/my-admin');
    }
}


public function edit_advertisment($id)
{
    if (session('adminusername')) {
    $data['ed_ads'] = DB::table('adds')
                        ->where('add_id','=',$id)
                        ->get();
    return view('admin.advertisment.edit-adv',$data);
     }else {
         return redirect('/my-admin');
    }
}

public function update_advertisment(Request $request)
{
    if (session('adminusername')) {
    $add_id = $request->input('add_id');
    $add_page = $request->input('add_page');
    if ($request->hasFile('image'))
                {
                    if ($request->file('image')->isValid()) 
                        {

                            $catimage=DB::select('select * from adds where add_id = ?',[$add_id]);
                            foreach ($catimage as $key => $value) 
                            {
                                $proimg=$value->image;
                                $name=$value->ad_name;
                                
                            }

                            unlink('uploads/ads/'.$proimg);
                            
                       
                            $photo=$request->file('image');
                            $addimagename = time().'.'.$photo->getClientOriginalExtension(); 

                                $destinationPath = 'uploads/ads';
                                if ($name=="BNR_1") {
                                $thumb_img = Image::make($photo->getRealPath())->resize(478,302);
                                }elseif ($name=="BNR_2") {
                                    $thumb_img = Image::make($photo->getRealPath())->resize(478,302);
                                }elseif ($name=="BNR_3") {
                                    $thumb_img = Image::make($photo->getRealPath())->resize(961,381);
                                }elseif ($name=="BNR_4") {
                                    $thumb_img = Image::make($photo->getRealPath())->resize(961,681);
                                }
                                $thumb_img->save($destinationPath.'/'.$addimagename,80);


                            DB::table('adds')
                                ->where('add_id', '=', $add_id)
                                ->update([ 
                                    'image' =>$addimagename
                                ]);                   
                        }
                }


                DB::table('adds')
                        ->update([

                            'page' => $add_page,
                            'updated_at' => \Carbon\Carbon::now()

                        ]);

                        return redirect('/advertisment');
                 }else {
         return redirect('/my-admin');
    }
}

public function quick_price(){

$data['products']= Db::table('items')
->join('products_price_list','products_price_list.product_id','=','products.product_id')
->get();

return view('admin/quick-price/quick-price',$data);

}


public function quick_price_update(Request $request){

$price_id=$request->input('price_id');
$normal_price=$request->input('normal_price');
$offer_price=$request->input('offer_price');
$wholesale_price=$request->input('wholesale_price');
$wholesale_offer_price=$request->input('wholesale_offer_price');

DB::table('products_price_list')->where('price_id','=',$price_id)->update([

'price_id'=>$price_id,
'normal_price'=>$normal_price,
'offer_price'=>$offer_price,
'wholesale_price'=>$wholesale_price,
'wholesale_offer_price'=>$wholesale_offer_price

]);

$request->session()->flash($price_id,'Succesfully Updated');
return back();

}

public function whatsapp(){

$data['whatsapp']=DB::table('whatsapp_mobile')->get();
    return view('admin/whatsapp/whatsapp',$data);
}

public function delete_whatsapp($id){

DB::table('whatsapp_mobile')->where('id','=',$id)->delete();
return back();

}

public function add_to_deal($id){

DB::table('deals')->insert([

'product_id'=>$id
]);
return back();

}
public function remove_from_deal($id){

DB::table('deals')->where('product_id','=',$id)->delete();
return back();

}
public function product_images()
{
      if (session('adminusername')) {
        $data['prod_img'] =  DB::table('product_images')
                            ->join('items','items.product_id','=','product_images.product_id')
                            ->get();
                           
    return view('admin.images.prod_images_list',$data);
     }else {
         return redirect('/my-admin');
    }
}




public function add_images()
{
   if (session('adminusername')) {
    $data['products'] =  DB::table('items')
                        ->get();
    return view('admin.images.add-images',$data);
    }else {
         return redirect('/my-admin');
    }
}


public function add_new_images(Request $request)
{

    
    $product_name = $request->input('product_name');
    $photo = $request->file('image');
    

     foreach ($photo as $photo) {
        $storyimagename = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($photo->getRealPath())->resize(667,542);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
        $destinationPath2 = 'uploads/images';
        $thumb_img2 = Image::make($photo->getRealPath())->resize(600,420);
        $thumb_img2->save($destinationPath2.'/'.$storyimagename,80);

        DB::table('product_images')
        ->insert([
            'product_id' => $product_name,
            'images' =>$storyimagename,
            'created_at' =>\Carbon\Carbon::now()
          ]);
    }


    return back();
 

}


public function delete_images($id, Request $request)
{
        $catimage=DB::select('select * from product_images where image_id = ?',[$id]);
                            foreach ($catimage as $key => $value) 
                            {
                                $proimg=$value->images;
                                
                            }
        DB::table('product_images')->where('image_id','=',$id)->delete();                   
        unlink('uploads/product/thumb_images/'.$proimg);
        unlink('uploads/images/'.$proimg);  
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('/prod_images');
}

public function attributes(){

    if (session('adminusername')) {
        $data['attributes']=DB::table('attributes')->get();
        return view('admin.attributes.attribute-list',$data);
     }
    else {
         return redirect('/my-admin');
    }


}

public function add_attribute(){

    if (session('adminusername')) {
    return view('admin.attributes.add-attribute');
     }
        else {
             return redirect('/my-admin');
        }

}

public function add_new_attribute(Request $request){

    if (session('adminusername')) {
        DB::table('attributes')->insert([

        'attribute_name'=>$request->attr_name,
        'created_at' => \Carbon\Carbon::now()

            ]);

       
        return back();
    }
    else {
        return redirect('/my-admin');
    }
}


public function edit_attributes($id){

    if (session('adminusername')) {
        $data['attributes']=DB::table('attributes')
                        ->where('attribute_id','=',$id)
                        ->get();
        return view('admin.attributes.edit-attribute',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function update_attributes(Request $request){

    if (session('adminusername')) {
        $attr_id=$request->input('attr_id');
        DB::table('attributes')->where('attribute_id','=',$attr_id)->update([

            'attribute_name'=>$request->attr_name,
            'created_at' => \Carbon\Carbon::now()

                    ]);

          
            return redirect('attributes');
    }
    else {
        return redirect('/my-admin');
    }

}


public function delete_attributes($id,Request $request){

    if (session('adminusername')) {

        DB::table('attributes')->where('attribute_id','=',$id)->delete();
        
        return redirect('attributes');
    }
    else {
        return redirect('/my-admin');
    }
}

public function attribute_values(){

    if (session('adminusername')) {

        $data['values']=DB::table('attributes_value')
                        ->join('attributes','attributes.attribute_id','=','attributes_value.attribute_id')
                        ->get();
        return view('admin.attributes.attribute_values.value-list',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function add_value(){

    if (session('adminusername')) {

        $data['attributes']=DB::table('attributes')
                            ->get();
        return view('admin.attributes.attribute_values.add-value',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function add_new_value(Request $request){

    if (session('adminusername')) {
        $attr_name = $request->input('attr_name');
        $attributes_value = $request->input('attr_val');
        $hex_val = $request->input('hex_val');


        DB::table('attributes_value')->insert([

        'attribute_id'=> $attr_name,
        'attribute_value'=> $attributes_value,
        'attribute_color_code' => $hex_val,
        'created_at' => \Carbon\Carbon::now()

            ]);

        return back();
    }
    else {
        return redirect('/my-admin');
    }
}

public function edit_values($id){

    if (session('adminusername')) {

        $data['attributes']=DB::table('attributes')
                            ->get();
        $data['attributes_value']=DB::table('attributes_value')
                        ->join('attributes','attributes.attribute_id','=','attributes_value.attribute_id')
                        ->where('attributes_value.attribute_value_id','=',$id)
                        ->get();
        return view('admin.attributes.attribute_values.edit-values',$data);
    }
    else {
        return redirect('/my-admin');
    }

}

public function update_values(Request $request){

    if (session('adminusername')) {
        
        $cid=$request->input('attr_value_id');
        DB::table('attributes_value')->where('attribute_value_id','=',$cid)->update([

            'attribute_id'=>$request->input('attr_name'),
            'attribute_value'=>$request->input('attr_val'),
            'attribute_color_code'=>$request->input('hex_val_ed')

            ]);

            $request->session()->flash('succ','Succesfully Updated!');

            return redirect('attribute-values');
    }
    else {
        return redirect('/my-admin');
    }


}

public function delete_values($id,Request $request){

    if (session('adminusername')) {
        DB::table('attributes_value')->where('attribute_value_id','=',$id)->delete();
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('attribute-values');
    }
    else {
        return redirect('/my-admin');
    }

}


public function ad_unit(){

    if (session('adminusername')) {
        $data['unit']=DB::table('measurement_unit')->where('id','!=',1)->get();
        return view('admin.unit.list-unit',$data);
     }
    else {
         return redirect('/my-admin');
    }


}

public function add_unit(){

    if (session('adminusername')) {
    return view('admin.unit.add-unit');
     }
        else {
             return redirect('/my-admin');
        }

}

public function add_new_unit(Request $request)
{

    $unit = $request->input('unit');
   

    DB::table('measurement_unit')->insert([
        'name' => $unit
    ]);
    
   

    return back();
 

}
public function edit_unit($id)
{
 if (session('adminusername')) {
    $data['ed_unit'] = DB::table('measurement_unit')
                    ->where('id','=',$id)
                    ->get();
   
    return view('admin.unit.edit-unit',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function update_unit(Request $request)
{
    
    $bid = $request->input('unit_id');
    $unit = $request->input('unit');

                 DB::table('measurement_unit')
                    ->where('id', '=', $bid)
                    ->update([
                        'name' => $unit, 
                                    
                            ]);  
 

                        return redirect('/unit');  
}




public function delete_unit($id,Request $request)
{
    if (session('adminusername')) {
       
        DB::table('measurement_unit')->where('id','=',$id)->delete();
        
       
        return redirect('unit');
    }
    else {
        return redirect('/my-admin');
    }
}
// end unit
public function ad_brands(){

    if (session('adminusername')) {
        $data['brands']=DB::table('brands')->get();
        return view('admin.brands.brands',$data);
     }
    else {
         return redirect('/my-admin');
    }


}

public function add_brand(){

    if (session('adminusername')) {
    return view('admin.brands.add-brand');
     }
        else {
             return redirect('/my-admin');
        }

}

public function add_new_brand(Request $request)
{

    $brand_name = $request->input('brand_name');
    $url_word = $request->input('url_word');    
    $photo = $request->file('logo'); 
        $storyimagename = time().'.'.$photo->getClientOriginalExtension();
        $destinationPath = 'uploads/brands/logo';
        $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);
 

    DB::table('brands')->insert([
        'name' => $brand_name,
        'brand_image' => $storyimagename,
        'url_word' => $url_word 
    ]);
    
   

    return back();
 

}

public function brand_set_featured($id, Request $request)
{
    if (session('adminusername')) {
    
       $checked = DB::table('brands')
        ->where('id','=',$id)
        ->update([

           'featured'=> 1

                    ]);
       
        return redirect('brands');
    }
    else {
        return redirect('/my-admin');
    }

}

public function brand_set_unfeatured($id, Request $request)
{
    if (session('adminusername')) {
    
       $checked = DB::table('brands')
        ->where('id','=',$id)
        ->update([

           'featured'=> 0

                    ]);
       
        return redirect('brands');
    }
    else {
        return redirect('/my-admin');
    }

}

public function edit_brands($id)
{
 if (session('adminusername')) {
    $data['ed_brand'] = DB::table('brands')
                    ->where('id','=',$id)
                    ->get();
   
    return view('admin.brands.edit-brand',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function update_brands(Request $request)
{
    
    $bid = $request->input('brand_id');
    $brand_name = $request->input('brand_name');
    $url_word = $request->input('url_word');

     if ($request->hasFile('logo'))
                {
                    if ($request->file('logo')->isValid()) 
                        {

                            $catimage=DB::select('select * from brands where id = ?',[$bid]);
                            foreach ($catimage as $key => $value) 
                            {
                                $proimg=$value->brand_image;
                                
                            }
                            
                           if($proimg!="") {

                            unlink('uploads/brands/logo/'.$proimg);
                          
                                $photo=$request->file('logo');
                                $logoimagename = time().'.'.$photo->getClientOriginalExtension(); 
                                $destinationPath = 'uploads/brands/logo';
                                $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
                                $thumb_img->save($destinationPath.'/'.$logoimagename,80);

                            DB::table('brands')
                                ->where('id', '=', $bid)
                                ->update([ 
                                    'brand_image' =>$logoimagename
                                ]);
                           }else{
                               
                               $photo=$request->file('logo');
                                $logoimagename = time().'.'.$photo->getClientOriginalExtension(); 
                                $destinationPath = 'uploads/brands/logo';
                                $thumb_img = Image::make($photo->getRealPath())->resize(118,55);
                                $thumb_img->save($destinationPath.'/'.$logoimagename,80);

                            DB::table('brands')
                                ->where('id', '=', $bid)
                                ->update([ 
                                    'brand_image' =>$logoimagename
                                ]);
                               
                           }
                            
                                
                        }
                }
    
                               

            
                 DB::table('brands')
                    ->where('id', '=', $bid)
                    ->update([
                        'name' => $brand_name, 
                                      
                        'url_word' => $url_word,
                        
                            ]);  
 

                        return redirect('/brands');  
}


public function view_brands($id)
{
    $data['view_brands'] = DB::table('brands')
                    ->where('id','=',$id)
                    ->get();

    return view('admin.brands.view-brand',$data);
}

public function delete_brands($id,Request $request)
{
    if (session('adminusername')) {
       
        DB::table('brands')->where('id','=',$id)->delete();
        
       
        return redirect('brands');
    }
    else {
        return redirect('/my-admin');
    }
}

public function attribute_amount(){

    if (session('adminusername')) {
        $data['attr_amnt']=DB::table('products_attributes')
                            ->join('items','items.product_id','=','products_attributes.product_id')
        ->get();
        return view('admin.product.attributes_price.attr_amnt',$data);
     }
    else {
         return redirect('/my-admin');
    }


}


public function add_attribute_amount(){

    if (session('adminusername')) {
        $data['products'] = DB::table('items')
                            ->get();
        $data['attr'] = DB::table('attributes')
                            ->get();
    return view('admin.product.attributes_price.add-attr-amnt',$data);
     }
        else {
             return redirect('/my-admin');
        }

}

public function get_attribute_value(Request $request){


$attr_id=$request->attr_id;
$attr_value = DB::table("attributes_value")
->where("attribute_id",'=',$attr_id)
->pluck("attribute_value","attribute_value_id");
return response()->json($attr_value);


}

public function add_new_attribute_amt(Request $request){

    if (session('adminusername')) {
        $sel_product = $request->input('sel_product');
        $attribute = $request->input('attribute');
        $value = $request->input('value');
        $price = $request->input('price');
        $stock_availability = $request->input('stock_availability');

       $photo = $request->file('image'); 
        $storyimagename = time().'.'.$photo->getClientOriginalExtension();

        $destinationPath = 'uploads/product/thumb_images';
        $thumb_img = Image::make($photo->getRealPath())->resize(258,401);
        // $watermark = Image::make('front-side/img/logo.png')->opacity(25);
        // $thumb_img->insert($watermark,  'bottom-right', 5, 5);
        $thumb_img->save($destinationPath.'/'.$storyimagename,80);


        $destinationPath2 = 'uploads/product/single-product';
        $thumb_img2 = Image::make($photo->getRealPath())->resize(700,700);
        // $watermark = Image::make('front-side/img/logo.png')->opacity(25);
        // $thumb_img2->insert($watermark,  'bottom-right', 5, 5);
        $thumb_img2->save($destinationPath2.'/'.$storyimagename,80);

        $destinationPath3 = 'uploads/product/single-product/small';
        $thumb_img3 = Image::make($photo->getRealPath())->resize(180,180);
        // $watermark = Image::make('front-side/img/logo.png')->opacity(25);
        // $thumb_img3->insert($watermark,  'bottom-right', 5, 5);
        $thumb_img3->save($destinationPath3.'/'.$storyimagename,80);
        

        DB::table('products_attributes')->insert([

        'product_id'=> $sel_product,
        'attrbute_type'=> $attribute,
        'attribute_value'=> $value,
        'attribute_price'=> $price,
        'attribute_image'=> $storyimagename,
        'available_qty'=> $stock_availability,
        'created_at' => \Carbon\Carbon::now()

            ]);

        return back();
    }
    else {
        return redirect('/my-admin');
    }
}


public function edit_attribute_amt($id)
{
 if (session('adminusername')) {
    $data['ed_attr'] = DB::table('products_attributes')
                    ->where('products_attributes_id','=',$id)
                    ->get();
   $data['products'] = DB::table('items')
                    ->get();
    $data['attr'] = DB::table('attributes')
                            ->get();
    return view('admin.product.attributes_price.edit-attr-amnt',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function update_attribute_amount(Request $request)
{
    if (session('adminusername')) {
        $atrid=$request->input('attr_amnt_id');
        $sel_product=$request->input('sel_product');
        $attribute=$request->input('attribute');
        $value=$request->input('value');
        $price=$request->input('price');


        $quantity = DB::table('products_attributes')
                    ->where('products_attributes_id','=',$atrid)
                    ->get();
    foreach($quantity as $quantity)
    {
        $total = $quantity->available_qty;
    }
       
       
        $remaining = $request->input('rem');
        $remaning_stock = $total+$remaining;

        if ($request->hasFile('image'))
                {
                    if ($request->file('image')->isValid()) 
                        {


                            $photo=$request->file('image');
                            $addimagename = time().'.'.$photo->getClientOriginalExtension(); 

                                $destinationPath = 'uploads/product/thumb_images';
                                $thumb_img = Image::make($photo->getRealPath())->resize(234,258);
                                $thumb_img->save($destinationPath.'/'.$addimagename,80);

                               
                            DB::table('products_attributes')
                                ->where('products_attributes_id', '=', $atrid)
                                ->update([ 
                                    'attribute_image' =>$addimagename
                                ]);                   
                        }
                }


                DB::table('products_attributes')
                            ->where('products_attributes_id', '=', $atrid)
                            ->update([
                            'product_id'=>$sel_product,
                            'attrbute_type'=>$attribute,
                            'attribute_value'=>$value,
                            'attribute_price'=>$price,
                            'available_qty' =>$remaning_stock

                        ]);

                        return redirect('/attr-amnt');
                 }else {
         return redirect('/my-admin');
    }
}

public function delete_attribute_amount($id,Request $request)
{
    if (session('adminusername')) {

        $catimage2=DB::select('select * from products_attributes where products_attributes_id = ?',[$id]);
                            foreach ($catimage2 as $key => $value) 
                            {
                                $proimg2=$value->attribute_image;
                                
                            }
        DB::table('products_attributes')->where('products_attributes_id','=',$id)->delete();
        unlink('uploads/product/thumb_images/'.$proimg2);
        return redirect('attr-amnt');
    }
    else {
        return redirect('/my-admin');
    }
}


public function blog_category()
{
    if (session('adminusername')) { 
   $data['blog_cat'] = DB::table('blog_category')
                    ->get();
    return view('admin.blog.category.category',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function add_blog_cat(Request $request)
{
    if (session('adminusername')) { 

    return view('admin.blog.category.add-blog-category');
     }
    else {
         return redirect('/my-admin');
    }
}

public function add_new_blog_cat(Request $request)
{
   
    $cat_name = $request->input('cat_name');
    
   
    

    DB::table('blog_category')->insert([

            
            'blog_cat_name' => $cat_name,
            
            'created_at'=>\Carbon\Carbon::now(),
            

        ]);

        $request->session()->flash('succ','Successfully Added New Category');
        return back();

   
}

public function admin_edit_blog_cat($id)
{
    if (session('adminusername')) { 
    $data['ed_blog_cat'] = DB::table('blog_category')                       
                            ->where('blog_category.blog_cat_id','=',$id)
                            ->get();                  
    return view('admin.blog.category.edit-blog-category',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function update_blog_cat(Request $request)
{
    $pid = $request->input('blog_cat_id');
    $cat_name = $request->input('cat_name');
   


                 DB::table('blog_category')
                                ->where('blog_cat_id', '=', $pid)
                                ->update([ 
                                    'blog_cat_name' =>$cat_name
                                ]);
                

        return redirect('/adm-blog-cat');


}
public function delete_blog_cat($id, Request $request)
{
                         
        DB::table('blog_category')->where('blog_cat_id','=',$id)->delete();
       
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('/adm-blog-cat');
}

public function admin_blog()
{
    if (session('adminusername')) { 
   $data['blog'] = DB::table('blog')
                    ->join('blog_category','blog_category.blog_cat_id','=','blog.blog_cat')
                    ->get();
    return view('admin.blog.blog',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function admin_add_blog(Request $request)
{
    if (session('adminusername')) { 
    $data['blog_category'] = DB::table('blog_category')
                        ->get();
    return view('admin.blog.add-blog',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function add_new_blog(Request $request)
{
    $category_name = $request->input('category_name');
    $blog_title = $request->input('blog_title');
    $posted_by = $request->input('posted_by');
    $blog_desc = $request->input('blog_desc');


    $photo = $request->file('bgimage'); 
                    $blogimagename = time().'.'.$photo->getClientOriginalExtension(); 
                    $destinationPath = 'uploads/blogs';
                    $thumb_img = Image::make($photo->getRealPath())->resize(667,542);
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);


    DB::table('blog')->insert([

            'blog_cat' => $category_name,
            'blog_title' => $blog_title,
            'blog_posted_by' => $posted_by,
            'blog_image' => $blogimagename,
            'blog_desc' => $blog_desc,
            'created_at'=>\Carbon\Carbon::now(),
            
        ]);

        $request->session()->flash('succ','Successfully Added New Blog');
        return back();  
}

public function admin_edit_blog($id)
{
     if (session('adminusername')) { 
    $data['ed_blog'] = DB::table('blog')                       
                            ->where('blog.id','=',$id)
                            ->get();  
    $data['cat'] =  DB::table('blog_category')                       
                            ->get();                
    return view('admin.blog.edit-blog',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function update_blog(Request $request)
{
    $pid = $request->input('blog_id');
    $category_name = $request->input('category_name');
     $blog_title = $request->input('blog_title');
      $posted_by = $request->input('posted_by');
       $blog_desc = $request->input('blog_desc');

    
    if ($request->hasFile('bgimage'))
                {
                    if ($request->file('bgimage')->isValid()) 
                        {

                            $projctimage=DB::select('select * from blog where id = ?',[$pid]);
                            foreach ($projctimage as $key => $value) 
                            {
                                $proimg=$value->blog_image;
                                
                            }
                            
                            unlink('uploads/blogs/'.$proimg);
                            

                            $photo=$request->file('bgimage');
                            $blogimagename = time().'.'.$photo->getClientOriginalExtension(); 

                                $destinationPath = 'uploads/blogs';
                                $thumb_img = Image::make($photo->getRealPath())->resize(667,542);
                                $thumb_img->save($destinationPath.'/'.$blogimagename,80);

                               

                            DB::table('blog')
                                ->where('id', '=', $pid)
                                ->update([ 
                                    'blog_image' =>$blogimagename
                                ]);                   
                        }
                }

                DB::table('blog')
                                ->where('id', '=', $pid)
                                ->update([ 
                                    'blog_cat' => $category_name,
                                    'blog_title' =>$blog_title,
                                    'blog_posted_by' =>$posted_by,
                                    'blog_desc' =>$blog_desc,
                                    'created_at'=>\Carbon\Carbon::now(),

                                ]);  
                

        return redirect('/admin/blog');


}

public function delete_blog($id, Request $request)
{
        $projctimage=DB::select('select * from blog where id = ?',[$id]);
                            foreach ($projctimage as $key => $value) 
                            {
                                $proimg=$value->blog_image;
                                
                            }
                            
                            
        DB::table('blog')->where('id','=',$id)->delete();
        unlink('uploads/blogs/'.$proimg);
        
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('/admin/blog');
}

public function admin_view_blog($id)
{
    $data['view_blog'] = DB::table('blog')
                    ->where('id','=',$id)
                    ->get();

    return view('admin.blog.view-blog',$data);
}

public function admin_testimonial()
{
    if (session('adminusername')) { 
   $data['blog'] = DB::table('testimonial')->get();
    return view('admin.testimonial.blog',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function admin_add_testimonial(Request $request)
{
    if (session('adminusername')) { 
    return view('admin.testimonial.add-blog');
     }
    else {
         return redirect('/my-admin');
    }
}

public function add_new_testimonial(Request $request)
{
    
    $blog_title = $request->input('blog_title');
    $posted_by = $request->input('posted_by');
    $blog_desc = $request->input('blog_desc');


    DB::table('testimonial')->insert([

            'testimonial_author' => $blog_title,
            'testimonial_category' => $posted_by,
            'testimonial_desc' => $blog_desc,
            'created_at'=>\Carbon\Carbon::now(),
            
        ]);

        $request->session()->flash('succ','Successfully Added New Testimonial');
        return back();  
}
public function delete_testimonial($id, Request $request)
{
        $projctimage=DB::select('select * from testimonial where testimonial_id  = ?',[$id]);
                           
                            
                            
        DB::table('testimonial')->where('testimonial_id ','=',$id)->delete();
      
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('/admin/testimonial');
}


public function daily_deals()
{
    if (session('adminusername')) { 
   $data['daily_deal'] = DB::table('items') 
                        ->where('items.offer_product','=',1)
                        ->get();
    
    return view('admin.offers.deals.index',$data);
     }
    else {
         return redirect('/my-admin');
    }
}



public function admin_add_Deal(Request $request)
{
    if (session('adminusername')) { 
    $data['product_list'] = DB::table('items')
                        ->get();
    return view('admin.offers.deals.add',$data);
     }
    else {
         return redirect('/my-admin');
    }
}

public function add_new_deal(Request $request)
{
    $sel_product    = $request->input('sel_product');
    $special_rate   = $request->input('special_rate');
   


  DB::table('items')->where('product_id','=',$sel_product)->update([

    'product_price_offer'=>$special_rate,
    'offer_product'=>1


]);

        $request->session()->flash('succ','Successfully Added New Deal');
        return back();  
}


public function delete_deal($id, Request $request)
{
       $offer=DB::table('items')->where('id','=',$id)->first();
       $pro_price=$offer->product_price;
         DB::table('items')->where('id','=',$id)->update([
            'offer_product' => 0,
            'product_price_offer' =>$pro_price
            
        ]);
        
 
                     
 

        
        $request->session()->flash('succ','Succesfully Deleted!');
        return redirect('admn-daily-deals');
}


public function set_product_sessonal($id, Request $request)
{
       
                            
        DB::table('items')->where('id','=',$id)->update([
            'sessonal' => 1
        ]);
        return back();
}


public function set_product_unsessonal($id, Request $request)
{
       
                            
        DB::table('items')->where('id','=',$id)->update([
            'sessonal' => 0
        ]);
        return back();
}


public function set_product_featured($id, Request $request)
{
       
                            
        DB::table('items')->where('id','=',$id)->update([
            'featured' => 1
        ]);
        return back();
}


public function set_product_unfeatured($id, Request $request)
{
       
                            
        DB::table('items')->where('id','=',$id)->update([
            'featured' => 0
        ]);
        return back();
}

public function all_slider_images()
{
    
    $data['slider']=DB::table('home_images')->get();
    return view('admin/home-images/slider_images_list',$data);
    
}
public function add_slider_images()
{
  $data['products']=DB::table('items')->orderby('name','asc')->get();
    return view('admin/home-images/slider-images',$data);
    
}

public function add_slider_img(Request $request){
    
      $photo = $request->file('image'); 
                    $blogimagename = time().'.'.$photo->getClientOriginalExtension(); 
                    $destinationPath = 'uploads/home-slider';
                    $thumb_img = Image::make($photo->getRealPath())->resize(1388,400);
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);
                    $thumb_img->save($destinationPath.'/'.$blogimagename,80);
                    
                    DB::table('home_images')->insert([
                        
                        'img_name'=>$blogimagename,
                        'img_for'=>$request->image_for,
                        'url'=>$request->url
                        ]);
                        
                        return redirect('slider-images');
    
    
}

public function delete_slider_image($id)
{
    $adsimage=DB::select('select * from home_images where img_id = ?',[$id]);
                        foreach ($adsimage as $key => $value) 
                        {
                            $proimg=$value->img_name;
                            
                        }
     DB::table('home_images')->where('img_id','=',$id)->delete();
      unlink('uploads/home-slider/'.$proimg);
            
        return redirect('/slider-images');
}


public function sell_on_list(){

$data['sell']=DB::table('sell_on_itcity')->get();
return view('admin/sell-on-itcity/list',$data);


}

public function delete_sell($id){

 DB::table('sell_on_itcity')->where('sell_id','=',$id)->delete();
 return back();

}

public function out_of_stock(){

$data['stock']=DB::table('categories')->get();

return view('admin/out-of-stock/list',$data);


}





public function view_out_of_stock($id){
    

$cat_id = Crypt::decryptString($id);


$cat=DB::table('categories')->where('id','=',$cat_id)->get(); 





$data['product']=DB::table('items') 
                ->join('categories','categories.id','=','items.category_id')
                ->where('items.status','=','1')
                ->where('items.category_id','=',$cat_id)
                ->orwhere('categories.id','=',$cat_id)
                ->where('items.web_stock','=','0')
                ->orderby('items.id','desc')
                
                ->get();


        return view('admin/out-of-stock/view',$data);

}













}