<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties= [];
        $rental_houses = Property::join('rental_houses', 'properties.id', '=', 'rental_houses.property_id')
                                ->get();
        $rental_rooms = Property::join('rental_rooms', 'properties.id', '=', 'rental_rooms.property_id')
                                ->get();
        array_push($properties, $rental_houses, $rental_rooms);
        return response()->json(['success'=>true, 'data'=> $properties], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
