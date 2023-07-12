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
        'image',
        'latitude',
        'longitude',
        'available',
        'district_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function district()
    {
        return $this->belongsTo(District::class);
    }
    public function propertyWishlist(){
        return $this->hasMany(Wishlist::class);
    }
    
    public function booking()
    {
        return $this->hasOne(booking::class);
    }

    public function rentalHouse()
    {
        return $this->hasOne(RentalHouse::class);
    }

    public function rentalRoom()
    {
        return $this->hasOne(RentalRoom::class);
    }

}
