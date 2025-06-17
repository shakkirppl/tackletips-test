<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Brands;
use App\Models\SubCategory;
use App\Models\Tax;
use App\Models\Measurement;
use Illuminate\Support\Facades\DB;
use App\Models\Tag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;


use Intervention\Image\Facades\Image;
use App\Models\ProductImages;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Item::query();
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('product_id', 'LIKE', "%{$search}%")
                  ->orWhere('mrp_price', 'LIKE', "%{$search}%")
                  ->orWhere('status', 'LIKE', "%{$search}%");
        }
    
        $products = $query->latest()->paginate(10);
    
        return view('products.index', compact('products'));
    }
    
    public function create()
    {
        $categories = Category::get();        
        $brands = Brands::get(); 
        $taxs = Tax::get(); 
        $Measurements = Measurement::get(); 
        $Tag = Tag::get(); 
        return view('products.create', compact('categories','brands','taxs','Measurements','Tag'));
    }

    public function getSubcategories($parent_id)
    {
        $subcategories = SubCategory::where('parent_id', $parent_id)->get();
        return response()->json($subcategories);
    }

    public function add_new_product(Request $request)
    {
        // return $request->all();
            
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
            
            $prod_slug = preg_replace('/[^\pL\d]+/u', '-', $request->input('name'));  
            $prod_slug = iconv('utf-8', 'us-ascii//TRANSLIT', $prod_slug);  
            $prod_slug = preg_replace('/[^-\w]+/', '', $prod_slug);
            $prod_slug = trim($prod_slug, '-');  
            $prod_slug = preg_replace('/-+/', '-', $prod_slug);  
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
             
    
             return redirect()->route('product.index')->with('success', 'Product added successfully.');

            } catch (\Exception $e) {
                
        
                Log::error('product store Store Error', [
                    'error' => $e->getMessage(),
                    'request' => $request->all()
                ]);
        
                return back()->with('error', 'Something went wrong! Please try again.');
            }
    }


    public function edit($id)
{
    $product = Item::findOrFail($id); 
    $categories = Category::get();
    $brands = Brands::get();
    $taxs = Tax::get();
    $Measurements = Measurement::get();
   
    $subcategories = SubCategory::where('parent_id', $product->category_id)->get();
    

    return view('products.edit', compact('product', 'categories', 'brands', 'taxs', 'Measurements','subcategories'));
}

public function update(Request $request, $id)
{
    try {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'sub_category' => 'nullable|exists:sub_category,id',
            'brand_id' => 'required|exists:brands,id',
            'tax_id' => 'required|exists:taxes,id',
            'measurement_id' => 'required|exists:measurement_unit,id',
            'barcode' => 'required|string|max:255',
            'hsncode' => 'required|string|max:255',
            'min_stock' => 'required|numeric',
            'max_stock' => 'required|numeric',
            'description' => 'nullable|string',
            'net_rate' => 'nullable|numeric',
            'mrp_price' => 'nullable|numeric',
            'wholesale_rate' => 'nullable|numeric',
            'quotation_price' => 'nullable|numeric',
        ]);

        // Find the product by ID
        $product = Item::findOrFail($id);

        // Update the product
        $product->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'sub_category' => $request->sub_category,
            'brand_id' => $request->brand_id,
            'tax_id' => $request->tax_id,
            'measurement_id' => $request->measurement_id,
            'barcode' => $request->barcode,
            'hsncode' => $request->hsncode,
            'min_stock' => $request->min_stock,
            'max_stock' => $request->max_stock,
            'description' => $request->description,
            'net_rate' => $request->net_rate,
            'mrp_price' => $request->mrp_price,
            'wholesale_rate' => $request->wholesale_rate,
            'quotation_price' => $request->quotation_price,
        ]);

        return redirect()->route('product.index')->with('success', 'Product updated successfully.');

    } catch (\Exception $e) {
        // Log the error
        Log::error('Product Update Error', [
            'error' => $e->getMessage(),
            'request' => $request->all()
        ]);

        return back()->with('error', 'Something went wrong! Please try again.');
    }
}



public function view($id)
{
    $product = Item::findOrFail($id);
    return view('products.view', compact('product'));
}

public function show($id)
{
    $product = Item::findOrFail($id);
    return view('products.view', compact('product'));
}


public function editProductImages($id)
{
    $product = Item::with('images')->findOrFail($id);
    return view('products.image-edit', compact('product'));
}


public function updateImages(Request $request, $id)
{
    try {
        $product = Item::findOrFail($id);

        // Check if any file is uploaded
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $imageId => $file) {
                $randomId = rand(1000, 9000);
                $imageName = time() . $randomId . '.' . $file->getClientOriginalExtension();
                $destinationPath = 'uploads/product/thumb_images';

                // Resize and save new image
                $thumbImg = Image::make($file->getRealPath())->resize(700, 600);
                $thumbImg->save(public_path($destinationPath . '/' . $imageName), 80);

                // Find the existing image record in database
                $productImage = ProductImages::where('image_id', $imageId)->first();
                if ($productImage) {
                    // Delete the old image file if exists
                    if (file_exists(public_path($destinationPath . '/' . $productImage->images))) {
                        unlink(public_path($destinationPath . '/' . $productImage->images));
                    }

                    // Update database record
                    $productImage->images = $imageName;
                    $productImage->save();
                }
            }
        }

        // Reload product images to reflect changes
        $product->load('images');

        return redirect()->route('product.index')->with('success', 'Product images updated successfully.');
    } catch (\Exception $e) {
        Log::error('Product Image Update Error', [
            'error' => $e->getMessage(),
            'request' => $request->all()
        ]);
        return back()->with('error', 'Something went wrong! Please try again.');
    }
}


public function addon($id)
{
    $product = Item::findOrFail($id); 
    $Measurements = Measurement::get();
    return view('products.addon', compact('product', 'Measurements'));
}



public function add_on_product(Request $request)
{
    // $request->all();
    $this->validate($request, [
        'item_id' => 'required|numeric', // Reference to the original product
        'measurement_id' => 'required|numeric',
        'barcode' => 'required',
        'hsncode' => 'required',
        'min_stock' => 'required|numeric',
        'max_stock' => 'required|numeric',
        'net_rate' => 'required|numeric',
        'wholesale_rate' => 'required|numeric',
        'mrp_price' => 'required|numeric',
        'quotation_price' => 'required|numeric',
        'image_url' => 'nullable|image'
    ]);
    try {
        $originalProduct = Item::findOrFail($request->input('item_id'));
        $measurement = Measurement::findOrFail($request->input('measurement_id'));
        
        // Handle Image Upload
        
        if( $file = $request->file('image_url') ) {
                 
            $randomId       =   rand(1000,9000);
            $storyimagename = time().$randomId.'.'.$file->getClientOriginalExtension();
            $destinationPath = 'uploads/product/thumb_images';
            $thumb_img = Image::make($file->getRealPath())->resize(700,600);
            $thumb_img->save($destinationPath.'/'.$storyimagename,80);
            }else{$storyimagename='defalut.jpg';}

        DB::transaction(function () use ($request, $originalProduct, $measurement, $storyimagename) {
            $newItem = new Item;
            $newItem->product_slug = $originalProduct->product_slug . '-' . strtolower($measurement->name);
            $newItem->name = $originalProduct->name;
            $newItem->sub_name = $measurement->name;
            $newItem->category_id = $originalProduct->category_id;
            $newItem->item_type = 'FinishedGoods';
            $newItem->sub_category = $originalProduct->sub_category;
            $newItem->brand_id = $originalProduct->brand_id;
            $newItem->tax_id = $originalProduct->tax_id;
            $newItem->tax_included = 1;
            $newItem->description = $originalProduct->description;
            $newItem->barcode = $request->input('barcode');
            $newItem->hsncode = $request->input('hsncode');
            $newItem->measurement_id = $request->input('measurement_id');
            $newItem->min_stock = $request->input('min_stock');
            $newItem->max_stock = $request->input('max_stock');
            $newItem->net_rate = $request->input('net_rate');
            $newItem->wholesale_rate = $request->input('wholesale_rate');
            $newItem->mrp_price = $request->input('mrp_price');
            $newItem->quotation_price = $request->input('quotation_price');
            $newItem->product_image = $storyimagename;
            $newItem->convertion_qty = 1;
            $newItem->prime_id = $originalProduct->id; // Reference to main product
            $newItem->sord_order = 1;
            $newItem->user_id = auth()->id();
            $newItem->group_id = 0;
            $newItem->web_sort_order = 0;
            $newItem->status = 1;
            $newItem->product_price = $request->input('mrp_price');
            $newItem->product_price_offer = $request->input('mrp_price');
            $newItem->offer_product = 0;
            $newItem->save();
            
            // Update product_id
            $newItem->product_id = 'PRDC' . $newItem->id;
            $newItem->save();
            
            // Store the image in the ProductImages table
            $path = 'uploads/product/thumb_images';
                
                if( $file = $request->file('image_url') ) {
                $p_image = new ProductImages;
                $p_image->product_id=$newItem->product_id;
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
                $p_image->product_id=$newItem->product_id;
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
                $p_image->product_id=$newItem->product_id;
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
                $p_image->product_id=$newItem->product_id;
                $p_image->images=$storyimagename;
                $p_image->save();
                }
    
        });
        
        return redirect()->route('product.index')->with('success', 'Product add-on created successfully.');
    } catch (\Exception $e) {
        Log::error('Add-on product creation error', [
            'error' => $e->getMessage(),
            'request' => $request->all()
        ]);
        return back()->with('error', 'Something went wrong! Please try again.');
    }
}


   
}
