<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\District;
use App\Models\RentalHouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ProvinceSeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(PropertySeeder::class);
        $this->call(RentalHouseSeeder::class);
        $this->call(RentalRoomSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(WishlistSeeder::class);
    }
}
