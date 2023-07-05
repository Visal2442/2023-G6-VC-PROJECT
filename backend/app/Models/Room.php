<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'size',
        'number_of_bed',
        'number_of_bathroom',
        'available',
        'rental_room_id'
    ];

    public function rentalRoom()
    {
        return $this->belongsTo(RentalRoom::class);
    }
}
