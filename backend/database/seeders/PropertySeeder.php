<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $properties=[
            [
                'name' => 'House 1',
                'price' => 5000,
                'description' => 'This luxurious room is the perfect place to relax and unwind.',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 2,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://dq5r178u4t83b.cloudfront.net/wp-content/uploads/sites/72/2018/01/24160505/Room_LuxuryClubking_12.jpg',
                'latitude' => 13.084811465225577,
                'longitude' => 103.18173879148894,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'House 2',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 2,
                'number_of_room' => 20,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://impacthomes.co.in/wp-content/uploads/2023/04/luxury-home.jpg',
                'latitude' => 13.087255235965642,
                'longitude' => 103.18163954869556,
                'district_id'=>1,
                'user_id'=>2
            ],
            [
                'name' => 'House 3',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 2,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://impacthomes.co.in/wp-content/uploads/2023/04/luxury-home.jpg',
                'latitude' => 13.087255235965642,
                'longitude' => 103.18163954869556,
                'district_id'=>1,
                'user_id'=>2
            ],
        ];
        foreach($properties as $property){
            Property::create($property);
        }
    }
}
