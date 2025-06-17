<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\District;
class StateController extends Controller
{
    //
    public function getDistricts($state_id)
    {
        $districts = District::where('state_id', $state_id)->get();
        return response()->json($districts);
    }
}
