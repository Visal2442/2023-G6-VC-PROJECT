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
    // search district location name 
    public function searchLocation(Request $request)
    {
<<<<<<< HEAD
        $name = $request->name;
        $districts = District::where('name', 'like', '%' . $name . '%')->get();

        if ($districts->isEmpty()) {
            return response()->json(['message' => 'Districts not found for "' . $name . '"'], 404);
        }

        return response()->json(['success' => true, 'data' => $districts], 200);
=======
        $properties= [];
        $rental_houses = RentalHouse::join('properties', 'properties.id', '=', 'rental_houses.property_id')
                                // ->select('properties.*', 'rental_houses.*')
                                ->get();
        $rental_rooms = RentalRoom::join('properties', 'properties.id', '=', 'rental_rooms.property_id')
                                // ->select('properties.*', 'rental_rooms.*')
                                ->get();
        array_push($properties, $rental_houses, $rental_rooms);
        return response()->json(['success'=>true, 'data'=> $properties], 200);
>>>>>>> main
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
