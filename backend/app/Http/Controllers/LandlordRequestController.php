<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use App\Mail\LandlordRequestMail;

class LandlordRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

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
        Mail::to('rentalhouse.kh@gmail.com')->send(new LandlordRequestMail($sendData));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
