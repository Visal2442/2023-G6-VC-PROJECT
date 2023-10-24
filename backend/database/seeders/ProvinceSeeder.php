<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $provinces=[
            [
                'name'=>'Phnom Penh',
            ]
            
        ];
        foreach ($provinces as $province){
            Province::create($province);
        }
    }
}
