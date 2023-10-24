<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'check_in_date',
        'check_out_date',
        'room_id',
        'user_id',
        'property_id'

    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

}
