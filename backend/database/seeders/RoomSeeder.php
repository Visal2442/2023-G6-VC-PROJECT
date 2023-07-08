<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rooms=[
            [
                'size' => "30x20",
                'number_of_bed' => 1,
                'number_of_bathroom' => 1,
                'available' => true,
                'rental_room_id'=>1
            ],
        ];
       
        foreach($rooms as $room){
            Room::create($room);
        }
    }
}
