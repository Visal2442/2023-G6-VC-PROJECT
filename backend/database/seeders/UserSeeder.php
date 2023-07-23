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
                'username' => 'visal',
                'phone_number' => '0234567890',
                'email' => 'visal@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'landlord',
            ],
            [
                'username' => 'darath',
                'phone_number' => '0234567890',
                'email' => 'darath@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'customer',
            ],
            [
                'username' => 'sreyrea',
                'phone_number' => '0987654321',
                'email' => 'sreyrea@gmail.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]

        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
