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
        $property=[
            [
                'name' => 'Luxury room',
                'price' => 5000,
                'description' => 'This luxurious room is the perfect place to relax and unwind.',
                'type' => 'room',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'available' => true,
                'user_id' =>1
            ],
            [
                'name' => 'Beach House',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'latitude' => 40.7128,
                'longitude' => -74.0060,
                'available' => true,
                'user_id'=>2
            ]
        ];
        foreach($property as $pro){
            Property::create($pro);
        }
    }
}
