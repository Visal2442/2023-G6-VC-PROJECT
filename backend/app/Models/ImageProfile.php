<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'image', 
        
    ];


    public function user()
    {
        return $this->belongsTo(user::class);
    }
}
