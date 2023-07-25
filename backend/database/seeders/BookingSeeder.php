<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $booking=[
            [
                'email' => 'darath@gmail.com',
                'first_name' => 'Darath',
                'last_name' => 'Pum',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '1',
                'property_id' => 1,
            ],
        ];
        foreach ($booking as $book){
            Booking::create($book);
        }

        
    }
}
