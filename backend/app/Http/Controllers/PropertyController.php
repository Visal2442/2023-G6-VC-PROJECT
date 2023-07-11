<?php

namespace App\Http\Controllers;

use App\Http\Resources\PropertyResource;
use App\Models\District;
use App\Models\Property;
use App\Models\Room;
use App\Models\RentalHouse;
use App\Models\RentalRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $properties = PropertyResource::collection($properties);
        return response()->json(['success' => true, 'data' => $properties], 200);
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
        return response()->json(['success' => true, 'data' => $properties], 200);
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

    // show properties detail by ID
    public function showDetail($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property = new PropertyResource($property);
            if ($property->type == 'room') {
                $rental_room=[];
                $rooms = Room::where('rental_room_id', $id)->get();
                 array_push($rental_room, $property);
                 array_push($rental_room, $rooms);
                 return response()->json(['data' =>$rental_room ], 200);
                }
                return response()->json(['data' => $property ], 200);
        }
        return response()->json(['message' => 'Property not found'], 404);

    }
}
