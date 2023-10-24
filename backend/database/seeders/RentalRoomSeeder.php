<?php

namespace Database\Seeders;

use App\Models\RentalRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RentalRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rentalRoom=[
            [
                'property_id'=>1 
            ],
        ];

        foreach ($rentalRoom as $room){
            RentalRoom::create($room);
        }
    }
}
