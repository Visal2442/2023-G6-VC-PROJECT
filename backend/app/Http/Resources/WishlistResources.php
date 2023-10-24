<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // $property = Wishlist::where('user_id', $userID)->get();
        // $wishlistFormatted = WishlistResources::collection($wishlist);
        return [
            'wishlist_id' => $this->id,
            'user_id' => $this->user_id,
            'property' => new PropertyResource($this->property)
        ];
    }
    
}
