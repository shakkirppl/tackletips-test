<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testmonial;
use App\Models\Stores;
use DB;
use App\Helper\File;
class TestimonialController extends Controller
{
    use File;
    //
    public function index()
    {
        try {
            $testimonial = Testmonial::get();
        return view('testimonial.index',['testimonial'=>$testimonial]);
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }

    public function create() 
    {
        try {
           
        return view('testimonial.create');
    } catch (\Exception $e) {
        return $e->getMessage();
      }
    }
    public function store(Request $request)
    {
      
        try {
    //  return $request->all();
            if( $file = $request->file('image') ) {
                $path = 'uploads/testimonial';
                $image = $this->file($file,$path,150,150);
            }else{$image='defalut.jpg';}

        DB::transaction(function () use ($request,$image) {
            $Testimonial=new Testmonial;
            $Testimonial->auther=$request->auther;
            $Testimonial->image=$image;
            $Testimonial->description=$request->description;
            
            $Testimonial->save();
        }); 
        return back();   
    } catch (\Exception $e) {
        return $e->getMessage();
      }     
    
    }
    public function edit(Testmonial $videoGallary) 
    {
  
        try {
            return view('testimonial.edit', [
                'testimonial' => $testimonial
            ]);
        } catch (\Exception $e) {
            return $e->getMessage();
          }
    }
    public function update(Request $request,Testmonial $testimonial) {
   
        try {
           
            DB::transaction(function () use ($request,$testimonial) {
                Testmonial::update_testmonial($request,$testimonial);
        }); 
       return redirect()->route('testimonial.index')->with('success','Testimonial updated successfully');
    } catch (\Exception $e) {
        return $e->getMessage();
      }    
    }  
    public function destroy(Testmonial $testimonial) 
    {
       
        try {
            DB::transaction(function () use ($testimonial) {
            $testimonial->delete();
        }); 
            return redirect()->route('testimonial.index')->with('success','Testimonial deleted successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
          }
      
    }
}
