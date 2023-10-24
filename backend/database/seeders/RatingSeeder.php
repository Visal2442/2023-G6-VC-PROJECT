<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $rating=[
            [
                'star'=>2,
                'user_id' => 1,
                'property_id' => 1,
            ],
            [
                'star'=>2,
                'user_id' => 2,
                'property_id' => 2,
            ]
        ];
        foreach ($rating as $rate){
            Rating::create($rate);
        }
    }
}
