<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $users = [
            [
                'username' => 'Visal Sork',
                'phone_number' => '0234567890',
                'email' => 'visal@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'landlord',
                'image' => 'https://cdn-icons-png.flaticon.com/128/1999/1999625.png',
            ],
            [
                'username' => 'Darath Pum',
                'phone_number' => '0234567890',
                'email' => 'darathpum@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'landlord',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Srerea Han',
                'phone_number' => '0234567890',
                'email' => 'sreyrea@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Sreyyoer Yoem',
                'phone_number' => '0234567890',
                'email' => 'sreyyoer@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'landlord',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Phally Hoeurng',
                'phone_number' => '0987654321',
                'email' => 'phally@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'landlord',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'


            ],
            [
                'username' => 'Net Se',
                'phone_number' => '0987654321',
                'email' => 'net@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'


            ],
            [
                'username' => 'Doeur Diet',
                'phone_number' => '0987654321',
                'email' => 'doeur@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Vibol Phoung',
                'phone_number' => '0987654321',
                'email' => 'vibol@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Tanguy Signoret',
                'phone_number' => '0987654321',
                'email' => 'tanguy@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Rady Y',
                'phone_number' => '0987654321',
                'email' => 'rady@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Yon Yen',
                'phone_number' => '0987654321',
                'email' => 'yon@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Ronan Ogor',
                'phone_number' => '0987654321',
                'email' => 'ronan@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Gareth Poulton',
                'phone_number' => '0987654321',
                'email' => 'gareth@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Him Hey',
                'phone_number' => '0987654321',
                'email' => 'him@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Mengheang Pho',
                'phone_number' => '0987654321',
                'email' => 'mengheang@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
