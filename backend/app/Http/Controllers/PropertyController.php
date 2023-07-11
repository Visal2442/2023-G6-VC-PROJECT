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

    // show properties by ID

    public function show($id)
    {
        $property = Property::with(['district', 'user'])
        ->where('id', $id)
            ->firstOrFail();

        $rental = null;
        if ($property->type === 'room') {
            $rental = $property->rentalRoom()->with('rooms')->first();
        } elseif ($property->type === 'house') {
            $rental = $property->rentalHouse()->first();
        }

        if (!$rental) {
            return response()->json(['error' => 'Rental not found'], 404);
        }

        $data = [
            'id' => $property->id,
            'name' => $property->name,
            'price' => $property->price,
            'description' => $property->description,
            'type' => $property->type,
            'size' => $property->size,
            'number_of_floor' => $property->number_of_floor,
            'number_of_room' => $property->number_of_room,
            'number_of_bathroom' => $property->number_of_bathroom,
            'number_of_kitchen' => $property->number_of_kitchen,
            'image' => $property->image,
            'latitude' => $property->latitude,
            'longitude' => $property->longitude,
            'available' => $property->available,
            'district' => $property->district,
            'user' => $property->user,
            'rental' => $rental,
        ];

        return response()->json($data);
    }
}
