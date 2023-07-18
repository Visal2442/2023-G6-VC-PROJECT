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
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $star = $request->star;
        $user_id = $request->user_id;
        $property_id = $request->property_id;
        
        $rating = Rating::where('user_id', $user_id)
                        ->where('property_id', $property_id)
                        ->first();
                        
        //whether a new rating was created or an existing rating was updated
        if ($rating) {
            $rating->star = $star;
            $rating->save();
            $message = 'Rating updated successfully';
        } else {
            $rating = Rating::create([
                'star' => $star,
                'user_id' => $user_id,
                'property_id' => $property_id,
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
    public function show(Rating $rating)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rating $rating)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rating $rating)
    {
        //
    }
}
