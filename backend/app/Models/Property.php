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
        'latitude',
        'longitude',
        'available',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function rentalHouses()
    {
        return $this->hasMany(RentalHouse::class);
    }

    public function rentalRooms()
    {
        return $this->hasMany(RentalRoom::class);
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
