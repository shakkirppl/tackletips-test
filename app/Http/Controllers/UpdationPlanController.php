<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\SubCategory;
use DB;
use Illuminate\Support\Str;
class UpdationPlanController extends Controller
{
    //
    public function categorySlug(Request $request)
    {
        $categories = Category::all();
        foreach ($categories as $category) {
            $slug = Str::slug($category->name);
        
            // Check if the slug already exists
            $exists = Category::where('slug', $slug)->where('id', '!=', $category->id)->exists();
            
            if (!$exists) {
                $category->slug = $slug;
                $category->save();
            }
        }
        return response()->json('ok Category');
    }
    public function subCategorySlug(Request $request)
    {
        $subcategories = SubCategory::all();

foreach ($subcategories as $subcategory) {
    $slug = Str::slug($subcategory->name);

    // Check if the slug already exists for another subcategory
    $exists = SubCategory::where('slug', $slug)->where('id', '!=', $subcategory->id)->exists();
    
    if (!$exists) {
        $subcategory->slug = $slug;
        $subcategory->save();
    } else {
        // Generate a unique slug if it already exists
        $uniqueSlug = $slug;
        $count = 1;
        
        while (SubCategory::where('slug', $uniqueSlug)->where('id', '!=', $subcategory->id)->exists()) {
            $uniqueSlug = $slug . '-' . $count;
            $count++;
        }

        $subcategory->slug = $uniqueSlug;
        $subcategory->save();
    }
}
       
        return response()->json('ok Sub Category');
    }

    // state table
    // country table
    // order table
    // purchase table
    // goodsoutonline table
    // goodsoutonline detail table
}
