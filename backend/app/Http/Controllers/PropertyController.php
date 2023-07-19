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
            return response()->json(['message' => 'District Not Found' ], 404);
        }
        return response()->json(['success' => true, 'data' => $districts], 200);
    }
    // Get 12 properties perpage
    public function pagination(Request $request)
    {
        $properties= DB::table('properties');
        if($request->district_id != ''){
            $properties = $properties->where('district_id',$request->district_id)->paginate(12);
        }
        elseif($request->min && $request->max){
            $properties = $properties->whereBetween('price',[$request->min, $request->max])->paginate(12);
        }
        elseif($request->type){
            $properties = $properties->where('type', $request->type)->paginate(12);
        }
        else{
            $properties=$properties->paginate(12);
        }
        if($properties->total()>0){
            return response()->json(['success'=>true, 'data'=>$properties], 200);
        }
        return response()->json(['message'=>'Property Not Found'], 404);
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

    // delete a property 
    public function deleteHouse($id){
        $house = Property::find($id);
        if(!$house){
            return response()->json(['message' =>'House not found'], 404);
        }
        $house->delete();
        return response()->json(['message' =>'Delete house success!'], 200);
    }
}
