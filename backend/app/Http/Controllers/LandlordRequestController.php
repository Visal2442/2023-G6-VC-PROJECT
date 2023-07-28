<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\LandlordRequestMail;

class LandlordRequestController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function sendRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'message_request' => 'required',
            
        ]);
        if($validator->fails()){
            return response()->json(['status' => false, 'errors' => $validator->errors()], 402);
        }
        $sendData = [
            'username'=>$request->username,
            'phone_number'=>$request->phone_number,
            'email'=>$request->email,
            'message_request'=>$request->message_request,

        ];
        Mail::to('rentalhouse.org@gmail.com')->send(new LandlordRequestMail($sendData));
        
    }
}
