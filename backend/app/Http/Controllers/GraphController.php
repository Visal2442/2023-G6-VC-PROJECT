<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Property;
use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraphController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function dataGrap()
    {
 
        $districts = District::withCount(['property' => function ($query) {
            $query->whereHas('booking');
        }])->get();
        return $districts;

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
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
