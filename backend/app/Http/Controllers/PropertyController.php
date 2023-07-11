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
    public function index() {
        $properties= Property::all();
        return response()->json(['success'=>true, 'data'=>$properties], 200);
    }
    
    // search district location name 
    public function searchLocation(Request $request)
    {
        $name = $request->name;
        $districts = District::where('name', 'like', '%' . $name . '%')->get();
        if ($districts->isEmpty()) {
            return response()->json(['message' => 'Districts not found for "' . $name . '"'], 404);
        }
        return response()->json(['success' => true, 'data' => $districts], 200);
    }
    
    public function pagination()
    {
        $properties = Property::paginate(1);
        return response()->json(['success'=>true, 'data'=>$properties], 200);
    }

    ///show property  by Id distric 
    public function showProperty($districtId)
    {
        $properties = Property::where('district_id', $districtId)->get();

        if ($properties->isEmpty()) {
            return response()->json(['message' => 'No properties found for district ' . $districtId], 404);
        }

        return response()->json(['success' => true, 'data' => $properties], 200);
    }
}
