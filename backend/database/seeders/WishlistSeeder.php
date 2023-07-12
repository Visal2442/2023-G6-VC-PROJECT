<?php

namespace Database\Seeders;

use App\Models\Wishlist;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WishlistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $wishlists=[
            [
                'user_id' => 1,
                'property_id' => 1,
            ],
            [
                'user_id' => 2,
                'property_id' => 2,
            ]
        ];
        foreach ($wishlists as $wishlist){
            Wishlist::create($wishlist);
        }
    }
}
