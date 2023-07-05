<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\RentalHouse;
class RentalHouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rentalHouse=[
            [
                'size' => 200,
                'number_of_room' => 4,
                'number_of_floor' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'property_id'=>1
            ],
            [
                'size' => 100,
                'number_of_room' => 2,
                'number_of_floor' => 1,
                'number_of_bathroom' => 1,
                'number_of_kitchen' => 1,
                'property_id'=>2
            ]
        ];
        foreach($rentalHouse as $house){
            RentalHouse::create($house);
        }
    }
}
