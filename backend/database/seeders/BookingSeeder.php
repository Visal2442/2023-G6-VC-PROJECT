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
                'email' => 'rady.y@passerellesnumeriques.org',
                'first_name' => 'Rady',
                'last_name' => 'Y',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '10',
                'property_id' => 1,
            ],
            [
                'email' => 'yon.yen@passerellesnumeriques.org',
                'first_name' => 'Yon',
                'last_name' => 'Yen',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '11',
                'property_id' => 2,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 3,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 4,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 5,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 6,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 10,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 12,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 11,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 9,
            ],
            [
                'email' => 'ronan.ogor@passerellesnumeriques.org',
                'first_name' => 'Ronan',
                'last_name' => 'Ogor',
                'phone_number' => '0934222222',
                'check_in_date' => '2023-08-02',
                'check_out_date' => '2023-08-02',
                'room_id' => '1',
                'user_id' => '12',
                'property_id' => 8,
            ],
        ];
        foreach ($booking as $book){
            Booking::create($book);
        }

        
    }
}
