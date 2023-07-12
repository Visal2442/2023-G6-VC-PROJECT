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
        $rental = null;
        if ($this->type === 'room') {
            $rental = $this->rentalRoom()->with('rooms')->first();
        } elseif ($this->type === 'house') {
            $rental = $this->rentalHouse()->first();
        }
        
        if (!$rental) {
            $rental = [];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'description' => $this->description,
            'type' => $this->type,
            'size' => $this->size,
            'number_of_floor' => $this->number_of_floor,
            'number_of_room' => $this->number_of_room,
            'number_of_bathroom' => $this->number_of_bathroom,
            'number_of_kitchen' => $this->number_of_kitchen,
            'image' => $this->image,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'available' => $this->available,
            'district' => $this->district,
            'user' => $this->user,
            'rental' => $rental,
        ];
    }
    
}
