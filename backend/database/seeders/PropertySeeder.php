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
                'name' => 'Luxury room',
                'price' => 5000,
                'description' => 'This luxurious room is the perfect place to relax and unwind.',
                'type' => 'room',
                'image' => 'https://dq5r178u4t83b.cloudfront.net/wp-content/uploads/sites/72/2018/01/24160505/Room_LuxuryClubking_12.jpg',
                'latitude' => 37.77491,
                'longitude' => -122.41941,
                'user_id' =>1
            ],
            [
                'name' => 'Beach House',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'image' => 'https://impacthomes.co.in/wp-content/uploads/2023/04/luxury-home.jpg',
                'latitude' => 40.71281,
                'longitude' => -74.00601,
                'user_id'=>2
            ]
        ];
        foreach($properties as $property){
            Property::create($property);
        }
    }
}
