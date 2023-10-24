<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $ratings = Rating::all();
        return response()->json(['message' => 'requested successfully','data' => $ratings]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $star = $request->star;
        $userId = $request->userId;
        $propertyId = $request->propertyId;
        
        $rating = Rating::where('user_id', $userId)
                        ->where('property_id', $propertyId)
                        ->first();
                        
        //whether a new rating was created or an existing rating was updated
        if ($rating) {
            $rating->star = $star;
            $rating->save();
            $message = 'Rating updated successfully';
        } else {
            $rating = Rating::create([
                'star' => $star,
                'user_id' => $userId,
                'property_id' => $propertyId,
            ]);
            $message = 'Rating created successfully';
        }
        //returns a JSON response with a success message and the rating data
        return response()->json([
            'message' => $message,
            'rating' => $rating
        ], 200);
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // show rating with the specified ID
        $ratings = Rating::where('property_id', $id)->get();
        // Return a JSON response with the rating data
        return response()->json(['message' => 'requested successfully', 'data' => $ratings], 200);
    }
}
