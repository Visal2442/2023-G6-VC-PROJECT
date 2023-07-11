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
                'property_id'=>2 
            ],
        ];
        foreach($rentalHouse as $house){
            RentalHouse::create($house);
        }
    }
}
