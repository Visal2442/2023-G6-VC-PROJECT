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
        return response()->json(['status' => true, 'data' => $districts], 200);

    }
}
