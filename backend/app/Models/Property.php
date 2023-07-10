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
    public function district_id()
    {
        return $this->belongsTo(District::class);
    }

}
