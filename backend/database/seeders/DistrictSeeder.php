<?php

namespace Database\Seeders;

use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $districts=[
            [
                'name'=>'Khan Sensok',
                'province_id'=>1,
            ],
            [
                'name'=>'Chamkar Morn',
                'province_id'=>1,
            ],
            [
                'name'=>'Steoung Meanchey',
                'province_id'=>1,
            ],
        ];
        foreach ($districts as $district){
            District::create($district);
        }
    }
}
