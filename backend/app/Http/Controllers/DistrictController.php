<?php

namespace App\Http\Controllers;

use App\Http\Resources\DistrictResource;
use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $districts = District::all();
        $districts = DistrictResource::collection($districts);
        return response()->json(['status'=>true, 'data'=>$districts],200);
    }

}
