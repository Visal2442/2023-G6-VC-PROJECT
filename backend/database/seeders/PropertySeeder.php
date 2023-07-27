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
                'name' => 'Rent Room',
                'price' => 350,
                'description' => 'This house is the perfect place to live and unwind. 10E Street 907, Phnom Penh',
                'type' => 'room',
                'size' => "5m x 7m",
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
                'size' => '19m x 15m',
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
                'size' => '18m x 25m',
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
                'name' => 'The 1978 Home',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. Street 1978, Phnom Penh',
                'type' => 'house',
                'size' => '18m x 15m',
                'number_of_floor' => 3,
                'number_of_room' => 4,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 3,
                'available'=>true,
                'image' => 'https://dq5r178u4t83b.cloudfront.net/wp-content/uploads/sites/72/2018/01/24160505/Room_LuxuryClubking_12.jpg',
                'latitude' => 11.554953174392393,
                'longitude' =>  104.91107512683642,
                'district_id'=>1,
                'user_id' =>1
            ],
            [
                'name' => 'Rooms for Rent',
                'price' => 90,
                'description' => 'This house is the perfect place to live and unwind. 1M 2M, St. 265, Samnong 12, Street 265, Phnom Penh',
                'type' => 'room',
                'size' => '5m x 5m',
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
                'name' => 'Virak Rental House',
                'price' => 100,
                'description' => 'This house is the perfect place to live and unwind. 30 Street 371, Phnom Penh',
                'type' => 'house',
                'size' => '18m x 15m',
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
                'size' => '18m x 20m',
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
            [
                'name' => 'One wQorld property',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '16m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=4woFU7Gel0T9PU9iNQp_3A&cb_client=search.gws-prod.gps&w=408&h=240&yaw=252.94035&pitch=0&thumbfov=100',
                'latitude' => 11.552419850052758,  
                'longitude' =>104.91804893988257, 
                'district_id'=>14,
                'user_id' =>2
            ],
            [
                'name' => 'House rent',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '19m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=tIW9lPZIEshSf_IUd2QgOw&cb_client=search.gws-prod.gps&w=408&h=240&yaw=241.30049&pitch=0&thumbfov=100',
                'latitude' => 11.555849586394775,  
                'longitude' => 104.9174774011904, 
                'district_id'=>14,
                'user_id' =>2
            ],
            [
                'name' => 'KhmerHome.com',
                'price' => 400,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '18m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipMkZZuyK6zWcj2IXlsz0bwLyX5lBENR4mdh6k6m=w533-h240-k-no',
                'latitude' => 11.553609763334336,  
                'longitude' => 104.92304990343902, 
                'district_id'=>14,
                'user_id' =>2
            ],
            [
                'name' => 'Rental Room',
                'price' => 60,
                'description' => 'This room is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '18m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=HLdnn8-WAAwtABRu5TaXyA&cb_client=search.gws-prod.gps&w=408&h=240&yaw=221.04066&pitch=0&thumbfov=100',
                'latitude' => 11.564709015943269,   
                'longitude' => 104.89195704523705,
                'district_id'=>14,
                'user_id' =>1
            ],
            [
                'name' => 'The Loft Apartment',
                'price' => 50,
                'description' => 'This room is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '17m x 16m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipMEmYaL0BTYlGTJERi5L6J0WL0x5VAFzLnEkP6t=w426-h240-k-no',
                'latitude' => 11.548097331630432,  
                'longitude' => 104.91386617142261,
                'district_id'=>14,
                'user_id' =>1
            ],
            [
                'name' => 'Monorom Apartment',
                'price' => 50,
                'description' => 'This room is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipMEmYaL0BTYlGTJERi5L6J0WL0x5VAFzLnEkP6t=w426-h240-k-no',
                'latitude' => 11.553070399377502,   
                'longitude' => 104.92300272433401,
                'district_id'=>14,
                'user_id' =>1
            ],
            [
                'name' => 'House Rent',
                'price' => 300,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '14m x 16m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=ApUWf1_ZjHktNjUhlgnXoQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=353.38065&pitch=0&thumbfov=100',
                'latitude' => 11.57034812635234,   
                'longitude' => 104.88358855403156,
                'district_id'=>13,
                'user_id' =>2
            ],
            [
                'name' => 'House rental',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 25m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=KpTNUAdDVTdg7X-GsZ_rFg&cb_client=search.gws-prod.gps&w=408&h=240&yaw=149.11296&pitch=0&thumbfov=100',
                'latitude' => 11.55504395836901,  
                'longitude' => 104.89405989820152,  
                'district_id'=>13,
                'user_id' =>2
            ],
            [
                'name' => 'House rental',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=KpTNUAdDVTdg7X-GsZ_rFg&cb_client=search.gws-prod.gps&w=408&h=240&yaw=149.11296&pitch=0&thumbfov=100',
                'latitude' => 11.55504395836901,  
                'longitude' => 104.89405989820152,  
                'district_id'=>13,
                'user_id' =>2
            ],
            [
                'name' => 'Both Apartments',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '14m x 20m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=86y4JyN8Pj_JU8-wmpYX9w&cb_client=search.gws-prod.gps&w=408&h=240&yaw=124.16608&pitch=0&thumbfov=100',
                'latitude' => 11.548484773308328,
                'longitude' =>  104.89938140097644,  
                'district_id'=>13,
                'user_id' =>2
            ],
            [
                'name' => 'Rent room home #100',
                'price' => 500,
                'description' => 'This room is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 25m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipPfbAQCCX1BKluD1CWHPU8Wr-H3z1o_DIEUOwbc=w408-h306-k-no',
                'latitude' => 11.559074484929996, 
                'longitude' =>  104.88358847984351,
                'district_id'=>13,
                'user_id' =>2
            ],
            [
                'name' => 'den chanmuny',
                'price' => 500,
                'description' => 'This room is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '19m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://lh5.googleusercontent.com/p/AF1QipNuEmVSUFpOZGIq7o_i2WtOuBBDiNzu5CRh6m-i=w408-h544-k-no',
                'latitude' => 11.56528543266617,
                'longitude' =>  104.88650657492478,
                'district_id'=>12,
                'user_id' =>2
            ],
            [
                'name' => 'Rent house 🏡 Phanith',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 16m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=Z0xCZ4sEicmH1Ruh1JEwpQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=140.88692&pitch=0&thumbfov=100',
                'latitude' => 11.567608120536612,  
                'longitude' => 104.86740933913653  ,
                'district_id'=>12,
                'user_id' =>2
            ],
            [
                'name' => 'House for rent',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '15m x 14m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=vsyIWLVtq2tEuBIwUNq1aQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=341.58228&pitch=0&thumbfov=100',
                'latitude' =>11.560544693190502,  
                'longitude' =>  104.87084256673326,
                'district_id'=>12,
                'user_id' =>2
            ],
            [
                'name' => 'Rent house',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '10m x 12m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=G34yE2Kcf2GOSAopVY3-yA&cb_client=search.gws-prod.gps&w=408&h=240&yaw=167.45103&pitch=0&thumbfov=100',
                'latitude' =>11.551192471637812,   
                'longitude' =>  104.91581398094178,
                'district_id'=>11,
                'user_id' =>2
            ],
            [
                'name' => 'Cam Elephant Realty',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' => '13m x 14m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=MmF9d4TS4_WWhK3VnYEutQ&cb_client=search.gws-prod.gps&w=408&h=240&yaw=324.59235&pitch=0&thumbfov=100',
                'latitude' =>11.551378186538397,    
                'longitude' =>  104.91984200693135,
                'district_id'=>11,
                'user_id' =>2
            ],
            [
                'name' => 'One wQorld property',
                'price' => 500,
                'description' => 'This house is the perfect place to live and unwind. 228a St 146, Phnom Penh',
                'type' => 'house',
                'size' =>'15m x 15m',
                'number_of_floor' => 2,
                'number_of_room' => 2,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://streetviewpixels-pa.googleapis.com/v1/thumbnail?panoid=4woFU7Gel0T9PU9iNQp_3A&cb_client=search.gws-prod.gps&w=408&h=240&yaw=252.94035&pitch=0&thumbfov=100',
                'latitude' =>11.55198175911557,    
                'longitude' =>  104.91780429966606 ,
                'district_id'=>11,
                'user_id' =>2
            ],
            [
                'name' => 'Beach House',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'size' => '15m x 18m',
                'number_of_floor' => 2,
                'number_of_room' => 20,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://impacthomes.co.in/wp-content/uploads/2023/04/luxury-home.jpg',
                'latitude' => 16.087255235965642,
                'longitude' => 106.18163954869556,
                'district_id'=>1,
                'user_id'=>2
            ],
            [
                'name' => 'Beach House',
                'price' => 2500,
                'description' => 'This cozy beach house is just steps away from the ocean.',
                'type' => 'house',
                'size' => '16m x 18m',
                'number_of_floor' => 2,
                'number_of_room' => 20,
                'number_of_bathroom' => 3,
                'number_of_kitchen' => 1,
                'available'=>true,
                'image' => 'https://impacthomes.co.in/wp-content/uploads/2023/04/luxury-home.jpg',
                'latitude' => 16.087255235965642,
                'longitude' => 106.18163954869556,
                'district_id'=>1,
                'user_id'=>2
            ],
            
            
        ];
        foreach($properties as $property){
            Property::create($property);
        }
    }
}
