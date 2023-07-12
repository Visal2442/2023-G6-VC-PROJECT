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
                'available' => true,
                'rental_room_id'=>1
            ],
            [
                'available' => false,
                'rental_room_id'=>1
            ],
        ];
       
        foreach($rooms as $room){
            Room::create($room);
        }
    }
}
