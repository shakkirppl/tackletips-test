<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HomeImages;
use App\Models\Item;

class HomeImagesController extends Controller
{
    public function index()
{
    $images = HomeImages::latest()->get();
    return view('home-slider.index', compact('images'));
}

    public function create()
{
      $items = Item::all();
    return view('home-slider.create', compact('items'));

}

public function store(Request $request)
{
    $request->validate([
        'img_for' => 'required|in:web,app,mobile',
        'img_name' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        'url' => 'required',
    ]);

    if ($request->hasFile('img_name')) {
        $image = $request->file('img_name');
        $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/home-slider'), $imageName);
    } else {
        return redirect()->back()->with('error', 'Image upload failed.');
    }

    HomeImages::create([
        'img_name' => $imageName,
        'img_for' => $request->img_for,
        'url' => $request->url,
    ]);

    return redirect()->route('home_slider.index')->with('success', 'Home slider image added successfully!');
}


public function destroy($img_id)
{
    $image = HomeImages::findOrFail($img_id);

    $imagePath = public_path('uploads/home-slider/' . $image->img_name);
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

  
    $image->delete();

    return redirect()->back()->with('success', 'Slider image deleted successfully.');
}

}
