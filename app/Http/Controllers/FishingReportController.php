<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FishReports;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Log;

class FishingReportController extends Controller
{
    public function create() {
        $fishingReports = FishReports::where('status', 1)->orderBy('created_at', 'desc')->get();

        return view('front-end.fishing_report',compact('fishingReports'));
    }

 
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'place' => 'required|string|max:255',
            'tacke_used' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    return 'ok';
        try {
            // return auth();
            // if (!auth()->check()) {
            //     return redirect()->back()->with('error', 'You must be logged in to submit a report.');
            // }
    
            // Ensure directory exists
            $destinationPath = public_path('uploads/fishreports');
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true, true);
            }
    
            // Process Image
            if ($file = $request->file('image')) {
                $randomId = rand(1000, 9000);
                $imageName = time() . $randomId . '.' . $file->getClientOriginalExtension();
                
                $thumb_img = Image::make($file->getRealPath())->resize(700, 600);
                $thumb_img->save($destinationPath . '/' . $imageName, 80);
            } else {
                $imageName = 'default.jpg';
            }
    
            // Store Fishing Report
            FishReports::create([
                'user_id' => 1,
                'name' => $request->name,
                'place' => $request->place,
                'tacke_used' => $request->tacke_used,
                'image' => 'uploads/fishreports/' . $imageName,
                'in_date' => now()->toDateString(),
                'in_time' => now()->toTimeString(),
                'status' => 0, 
            ]);
    
            return redirect()->back()->with('success', 'Fishing report submitted successfully!');
    
        } catch (\Exception $e) {
            Log::error('Fishing Report Store Error', [
                'error' => $e->getMessage(),
                'request' => $request->all()
            ]);
    
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }


    public function pending() {
        $fishReports = FishReports::with('user')
        ->where('status', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('fish-report.pending',compact('fishReports'));
    }
    public function active() {
        $fishReports = FishReports::with('user')
        ->where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('fish-report.active',compact('fishReports'));
    }

    public function blocked() {
        $fishReports = FishReports::with('user')
        ->where('status', 2)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('fish-report.blocked',compact('fishReports'));
    }

    public function updateStatus(Request $request, $id)
{
    try {
        $report = FishReports::findOrFail($id);
        $report->status = $request->status;
        $report->save();

        return redirect()->back()->with('success', 'Status updated successfully.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
    }
}

public function viewImage($id)
{
    $report = FishReports::findOrFail($id);
    return view('fish-report.viewimage', compact('report'));
}
   
    
    
}
