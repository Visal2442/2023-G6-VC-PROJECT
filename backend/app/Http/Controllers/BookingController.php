<?php

namespace App\Http\Controllers;

use App\Http\Resources\bookingResource;
use App\Http\Resources\PropertyResource;
use App\Models\Booking;
use App\Models\Property;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendDetailBookingToCustomer;
use App\Mail\SendDetailBookingToLandlord;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   

    /**
     * Store a newly created resource in storage.
     */

    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'check_in_date' => 'required|date_format:Y-m-d',
            'check_out_date' => 'required|date_format:Y-m-d|after:check_in_date',
            'room_id'=>'',
            'user_id' => 'required|exists:users,id',
            'property_id' => 'required|exists:properties,id',
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 400);
        }
        $booking = Booking::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'check_in_date' => $request->check_in_date,
            'check_out_date' => $request->check_out_date,
            'room_id'=>$request->room_id,
            'user_id' => $request->user_id,
            'property_id' => $request->property_id,
        ]);
        $property = Property::find($request->property_id);

    // send email detail
        $user= User::find($request->user_id);
        $propertyResource = Property::find($request->property_id);
        $propertyDetail= new PropertyResource($propertyResource);
        $send = [
            'email' => $booking['email'],
            'firstName' => $booking['first_name'],
            'lastName' => $booking['last_name'],
            'type'=>$property['type'],
            'numberOfRoom'=>$property['number_of_room'],
            'room_id'=>$request->room_id,
            'floor'=>$property['number_of_floor'],
            'bathroom' => $property['number_of_room'],
            'kitchen'=>$property['number_of_kitchen'],
            'price' => $property['price'],
            'image' => $property['image'],
            'landlordPhoneNumber' => $propertyDetail['user']['phone_number'],
            'customerPhoneNumber' =>$booking['phone_number'],
            'landlordEmail' => $propertyDetail['user']['email'],
            'landlordName' => $propertyDetail['user']['username'],
            'district'=>$propertyDetail["district"]["name"] 
        ];
        //   -----------------------------------------------------------------
        
     
        if($property['type'] == "room"){
            DB::table('rooms')
            ->join('rental_rooms', 'rental_rooms.id', '=', 'rooms.rental_room_id')
            ->join('properties', 'properties.id', '=', 'rental_rooms.property_id')
            ->where('properties.id', '=',$request->property_id )
            ->where('rooms.id', '=', $request->room_id)
            ->update(['rooms.available' => 0]);
            
        // send email detail
            Mail::to($booking['email'])->send(new SendDetailBookingToCustomer($send));
            Mail::to($propertyDetail['user']['email'])->send(new SendDetailBookingToLandlord($send));
        //    ----------------------------------------------------------------------------------------------- 


            return response()->json(['status' => true, 'data' => $booking], 200);  
        }if($property['type'] == "house"){
            $property['available'] = 0;
            $property->save();
            
         
           // send email detail
            Mail::to($booking['email'])->send(new SendDetailBookingToCustomer($send));
            Mail::to($propertyDetail['user']['email'])->send(new SendDetailBookingToLandlord($send));
        //    ----------------------------------------------------------------------------------------------- 

            return response()->json(['status' => true, 'data' => $booking], 200);
    
        };
        
        

        
        



    
    
    }




    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
