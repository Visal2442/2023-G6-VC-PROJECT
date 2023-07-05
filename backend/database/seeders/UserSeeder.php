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
        
       $users= [
            [
            'user_name' => 'john_doe',
            'phone_number' => '1234567890',
            'email' => 'john.doe@example.com',
            'password' => bcrypt('password'),
            'role' => 'user',
            ],
            [
                'user_name' => 'jane_doe',
                'phone_number' => '0987654321',
                'email' => 'jane.doe@example.com',
                'password' => bcrypt('password'),
                'role' => 'admin',
            ]

        ];
    
        foreach($users as $user){
            User::create($user);
        }
    }
}
