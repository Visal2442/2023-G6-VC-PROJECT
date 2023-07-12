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
                'name'=>'Khan Sen sok',
                'province_id'=>1,
            ],
            [
                'name'=>'Prek Pnov district',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Tuol Kouk',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Russey Keo',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Prampir Makara',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Pou Senchey',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Mean Chey',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Dangkao',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Chroy Changvar',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Chbar Ampov',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Chamkar Mon',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Kamboul',
                'province_id'=>1,
            ],
            [
                'name'=>'Doun Penh section',
                'province_id'=>1,
            ],
            [
                'name'=>'Khan Boeng Keng Kang',
                'province_id'=>1,
            ],
        ];
        foreach ($districts as $district){
            District::create($district);
        }
    }
}
