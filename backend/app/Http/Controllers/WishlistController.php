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

   
    public function createWishlist(Request $request)
    {
        $wishlist = Wishlist::create([
            'user_id' => $request->user_id,
            'property_id' => $request->property_id,
            
        ]);
        return response()->json(['success' => true, 'data' => $wishlist],200);
    }

    
    
}
