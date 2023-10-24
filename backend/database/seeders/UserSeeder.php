<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                'email' => 'visal.sork@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'landlord',
                'image' => 'http://127.0.0.1:8000/images/544628464.jpg',
            ],
            [
                'username' => 'Darath Pum',
                'phone_number' => '0234567890',
                'email' => 'darath.pum@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'landlord',
                'image'=>'http://127.0.0.1:8000/images/844085968.jpg'
            ],
            [
                'username' => 'Srerea Han',
                'phone_number' => '0234567890',
                'email' => 'sreyrea.han@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'landlord',
                'image'=>'http://127.0.0.1:8000/images/170365225.jpg'
            ],
            [
                'username' => 'Sreyyoer Yoem',
                'phone_number' => '0234567890',
                'email' => 'sreyyoer@gmail.com',
                'email' => 'sreyyoer.yoem@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'landlord',
                'image'=>'http://127.0.0.1:8000/images/366421222.jpg'
            ],
            [
                'username' => 'Phally Hoeurng',
                'phone_number' => '0987654321',
                'email' => 'phally.hoeurng@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'landlord',
                'image'=>'http://127.0.0.1:8000/images/1964332169.jpg'


            ],
            [
                'username' => 'Net Se',
                'phone_number' => '0987654321',
                'email' => 'net.se@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'


            ],
            [
                'username' => 'Doeur Diet',
                'phone_number' => '0987654321',
                'email' => 'doeur.diet@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Vibol Phoung',
                'phone_number' => '0987654321',
                'email' => 'vibol.phoung@student.passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Tanguy Signoret',
                'phone_number' => '0987654321',
                'email' => 'tanguy.signoret@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Rady Y',
                'phone_number' => '0987654321',
                'email' => 'rady.y@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Yon Yen',
                'phone_number' => '0987654321',
                'email' => 'yon.yen@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Ronan Ogor',
                'phone_number' => '0987654321',
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Gareth Poulton',
                'phone_number' => '0987654321',
                'email' => 'gareth.poulton@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Him Hey',
                'phone_number' => '0987654321',
                'email' => 'him.hey@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Mengheang Pho',
                'phone_number' => '0987654321',
                'email' => 'mengheang.pho@passerellesnumeriques.org',
                'password' => Hash::make('password'),
                'role' => 'customer',
                'image'=>'https://cdn-icons-png.flaticon.com/128/1999/1999625.png'
            ],
            [
                'username' => 'Rental House',
                'phone_number' => '079126481',
                'email' => 'rentalhouse.org@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'image'=>'http://127.0.0.1:8000/images/1043821798.png'
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
