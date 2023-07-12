<?php

namespace App\Http\Controllers;

use App\Http\Resources\WishlistResources;
use App\Models\User;
use App\Models\Wishlist;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getDataWishlist($userID)
    {
        $wishlist = Wishlist::where('user_id', $userID)->get();
        $wishlistFormatted = WishlistResources::collection($wishlist);
        return response()->json(['success' => true, 'data' => $wishlistFormatted]);
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
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist)
    {
        //
    }
}
