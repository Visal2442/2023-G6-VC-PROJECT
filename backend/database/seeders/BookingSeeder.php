<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $booking=[
            [
                'user_id' => 1,
                'property_id' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
            ]
        ];
        foreach ($booking as $book){
            Booking::create($book);
        }

        
    }
}
