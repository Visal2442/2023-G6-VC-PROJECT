<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Property;
use App\Models\RentalHouse;
use App\Models\RentalRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index() 
    {
        $properties= Property::all();
        return response()->json(['success'=>true, 'data'=>$properties], 200);
    }

    // search district location name 
    public function searchLocation(Request $request)
    {
        $name = $request->name;
        $districts = District::where('name', 'like', '%' . $name . '%')->get();
        if ($districts->isEmpty()) {
            return response()->json(['message' => 'District Not Found' ], 404);
        }
        return response()->json(['success' => true, 'data' => $districts], 200);
    }
    // Get 12 properties perpage
    public function pagination(Request $request)
    {
        $properties= DB::table('properties');
        if($request->district_id != ''){
            $properties = $properties->where('district_id',$request->district_id)->paginate(1);
        }
        elseif($request->min && $request->max){
            $properties = $properties->whereBetween('price',[$request->min, $request->max])->paginate(1);
        }
        elseif($request->type){
            $properties = $properties->where('type', $request->type)->paginate(1);
        }
        else{
            $properties=$properties->paginate(1);
        }
        if($properties->total()>0){
            return response()->json(['success'=>true, 'data'=>$properties], 200);
        }
        return response()->json(['message'=>'Property Not Found'], 404);
    }
}
