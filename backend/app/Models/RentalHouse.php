<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalHouse extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'number_of_room',
        'number_of_floor',
        'number_of_bathroom',
        'number_of_kitchen',
        'available',
        'property_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
