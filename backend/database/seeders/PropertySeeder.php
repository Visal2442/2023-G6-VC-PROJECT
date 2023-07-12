<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Property;
class PropertySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $properties=[
            [
                'name' => 'Rent house',
                'price' => 350,
                'description' => 'This house is the perfect place to live and unwind. 10E Street 907, Phnom Penh',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=-yCGh5z3j42TPfQZvYGU3Q&cb_client=search.gws-prod.gps&w=408&h=240&yaw=245.59229&pitch=0&thumbfov=100',
                'latitude' => 11.601063990362384, 
                'longitude' => 104.91112544659784,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'Rent house Phanith',
                'price' => 350,
                'description' => 'This house is the perfect place to live and unwind. HV79+X4V, Phnom Penh',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=Z0xCZ4sEicmH1Ruh1JEwpQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=140.88692&pitch=0&thumbfov=100',
                'latitude' => 11.566796504408691,  
                'longitude' => 104.86764612094096,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'Group Real Estate',
                'price' => 400,
                'description' => 'This house is the perfect place to live and unwind. Phnom Penh',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=kHF1uvvku28ZCbbTAPZDiw&cb_client=search.gws-prod.gps&w=408&h=240&yaw=54.763737&pitch=0&thumbfov=100',
                'latitude' => 11.557850950842944, 
                'longitude' => 104.8801460981171,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'The 1978 Home Room Service Rental',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. Street 1978, Phnom Penh',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipMltzMAqugX9JfidiGhOgVgPEX4qa552IqVeokZ=w408-h905-k-no',
                'latitude' => 11.578553894374926,  
                'longitude' => 104.88560966564638,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'The 1978 Home Room Service Rental',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. Street 1978, Phnom Penh',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipMltzMAqugX9JfidiGhOgVgPEX4qa552IqVeokZ=w408-h905-k-no',
                'latitude' => 11.578553894374926,  
                'longitude' => 104.88560966564638,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'Rental Room(012981196/086321439)',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. HV8J+7GF, Phnom Penh',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipOIl8oY9u0TzSFJxQ04CqZ3FugXNuSY5svuKFqD=w408-h544-k-no',
                'latitude' => 11.567235092130899,   
                'longitude' => 104.88114758790451,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'Rooms for Rent',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. HV8J+7GF, 620, Phnom Penh 120802',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipPrR3zqA4RsNuF9XELL99DUDInox6i4xnvHNvf4=w408-h635-k-no',
                'latitude' => 11.566668341898673,   
                'longitude' => 104.886928115038, 
                'district_id'=>2,
                'user_id' =>1
            ],
            [
                'name' => 'Rooms for Rent',
                'price' => 90,
                'description' => 'This house is the perfect place to live and unwind. 1M 2M, St. 265, Samnong 12, Street 265, Phnom Penh',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipOngakDWvHSm2VwJm_0hPBcEAX8krsmYx_X27e1=w426-h240-k-no',
                'latitude' => 11.555811288499891,    
                'longitude' => 104.8917098920718,
                'district_id'=>2,
                'user_id' =>1
            ],
            [
                'name' => 'Rooms for Rent',
                'price' => 90,
                'description' => 'This house is the perfect place to live and unwind. 1M 2M, St. 265, Samnong 12, St 2002, Phnom Penh',
                'type' => 'room',
                'size' => 200,
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipME12WTXjMhqDNNJ5Zk4H2JuR012uLjhb495YZp=w408-h544-k-no',
                'latitude' => 11.559779300021567,     
                'longitude' => 104.88347053477658,
                'district_id'=>2,
                'user_id' =>1
            ],
            [
                'name' => 'Virak Rental House',
                'price' => 100,
                'description' => 'This house is the perfect place to live and unwind. 30 Street 371, Phnom Penh',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 1,
                'number_of_room' => 2,
                'number_of_bathroom' => 2,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=HcSzQGhQAe2Ei4FerWDMww&cb_client=search.gws-prod.gps&w=408&h=240&yaw=6.3305707&pitch=0&thumbfov=100',
                'latitude' => 11.553892958358007,    
                'longitude' => 104.88441467232077, 
                'district_id'=>2,
                'user_id' =>1
            ],
            [
                'name' => 'Home rent',
                'price' => 100,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => 200,
                'number_of_floor' => 1,
                'number_of_room' => 2,
                'number_of_bathroom' => 2,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=_Jl8HTAdIlW-2A7tZM9tdg&cb_client=search.gws-prod.gps&w=408&h=240&yaw=150.37431&pitch=0&thumbfov=100',
                'latitude' => 11.567116030960971,  
                'longitude' => 104.8945695159764  , 
                'district_id'=>3,
                'user_id' =>1
            ],
            
            
        ];
        foreach($properties as $property){
            Property::create($property);
        }
    }
}
