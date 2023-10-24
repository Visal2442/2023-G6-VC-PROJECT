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
use Illuminate\Support\Facades\Validator;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::all();
        $properties = PropertyResource::collection($properties);
        return response()->json(['success' => true, 'data' => $properties], 200);
    }
    public function getAllProperties($userId)
    {
        $properties = Property::where('user_id', $userId)->get();
        $properties = PropertyResource::collection($properties);
        return response()->json(['success' => true, 'data' => $properties], 200);
    }

    // search district location name 
    public function searchLocation(Request $request)
    {
        $name = $request->name;
        $districts = District::where('name', 'like', '%' . $name . '%')->get();
        if ($districts->isEmpty()) {
            return response()->json(['message' => 'No District Found'], 404);
        }
        return response()->json(['success' => true, 'data' => $districts], 200);
    }
    // Get 12 properties perpage
    public function pagination(Request $request)
    {
        $properties = DB::table('properties');
        if ($request->district_id != '') {
            $properties = $properties->where('district_id', $request->district_id)->paginate(12);
        } elseif ($request->min && $request->max) {
            $properties = $properties->whereBetween('price', [$request->min, $request->max])->paginate(12);
        } elseif ($request->type) {
            $properties = $properties->where('type', $request->type)->paginate(12);
        } else {
            $properties = $properties->paginate(12);
        }
        if ($properties->total() > 0) {
            return response()->json(['success' => true,'emoji'=> "😁", 'data' => $properties], 200);
        }
        return response()->json(['message' => 'No Property Found'], 404);
    }

    // show properties detail by ID
    public function showDetail($id)
    {
        $property = Property::find($id);
        if ($property) {
            $property = new PropertyResource($property);
            if ($property->type == 'room') {
                $rental_room = [];
                $rentalRoom = RentalRoom::where('property_id', $id)->first();
                $rooms = Room::where('rental_room_id', $rentalRoom['id'])->get();
                array_push($rental_room, $property);
                array_push($rental_room, $rooms);
                return response()->json(['data' => $rental_room], 200);
            }
            return response()->json(['data' => $property], 200);
        }
        return response()->json(['message' => 'No Property Found'], 404);
    }
    public function getPropertyId($id)
    {
        $property = Property::find($id);
        return response()->json(['success' => true, 'data' => $property], 200);
    }

    // delete a property 
    public function deleteHouse($id){
        $house = Property::find($id);
        if(!$house){
            return response()->json(['message' =>'House not found'], 404);
        }
        $house->delete();
        return response()->json(['message' =>'Delete house success!'], 200);
    }
    public function updateProperty(Request $request, $id)
    {
        $property = Property::find($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => '',
            'size' => 'required',
            'number_of_floor' => 'required',
            'number_of_room' => 'required',
            'number_of_bathroom' => 'required',
            'number_of_kitchen' => 'required',
            'image' => '',
            'district_id' => 'required',
        ]);
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 402);
            }
        if($request->image != null){
            $property->update($validator->validated());
        }
        else{
            $property->update([
                'name'=> $request->name,
                'size'=> $request->size,
                'price'=> $request->price,
                'number_of_floor'=> $request->number_of_floor,
                'number_of_room'=> $request->number_of_room,
                'number_of_kitchen'=> $request->number_of_kitchen,
                'number_of_bathroom'=> $request->number_of_bathroom,
                'description'=> $request->description,
                'district_id'=> $request->district_id,
            ]);
        }
        return response()->json(['message' => 'successfully updated', 'data' => $property], 200);
    }

    // resource from https://www.youtube.com/watch?v=chCtrNGrQhk
    public function getImage(Request $request)
    {
        $image = $request->file('propertyImage');
        $new_name =  rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $path = asset('images/' . $new_name);
        return $path;
    }

    public function createProperty(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'type' => 'required',
            'size' => 'required',
            'number_of_floor' => 'required',
            'number_of_room' => 'required',
            'number_of_bathroom' => 'required',
            'number_of_kitchen' => 'required',
            'image' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'district_id' => 'required',
            'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 402);
        }
        $property = Property::create($request->all());
        if($request->type === 'room'){
            $newProperty = Property::orderBy('id', 'desc')->first();
            $newRentalroom=RentalRoom::create([
                'property_id'=> $newProperty['id']
            ]);
            $newRentalroom= RentalRoom::orderBy('id', 'desc')->first();
            for($i=0; $i < $request->number_of_room; $i++){
                Room::create([
                    'rental_room_id'=> $newRentalroom['id'],
                ]);
            }
        }
        return response()->json(['message' => 'created', 'data' => $property], 200);
    }
}
