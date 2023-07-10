<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'description',
        'type',
        'size',
        'number_of_floor',
        'number_of_room',
        'number_of_bathroom',
        'number_of_kitchen',
        'available',
        'image',
        'latitude',
        'longitude',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentalHouses()
    {
        return $this->hasOne(RentalHouse::class);
    }

    public function rentalRooms()
    {
        return $this->hasOne(RentalRoom::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }
}
