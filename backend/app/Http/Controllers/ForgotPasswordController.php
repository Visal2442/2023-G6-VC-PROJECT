<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use App\Mail\ResetPasswordVerification;
class ForgotPasswordController extends Controller
{ 
    const VERIFICATION_CODE_MIN = 111111;
    const VERIFICATION_CODE_MAX = 999999;

    public function resetPasswordRequest(Request $request)
    {
        // Validate input data
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'email'],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors(),
                'status' =>false,
            ],401);
        }
    
        // Find user by email address
        $user = User::where('email', $request->email)->first();
        
        if (!$user) {
            // User not found, return a success response
            return response()->json([
                'message' => 'Email address not found',
                'status' => false,
            ], 404);
        }
    
        // Generate a random verification code and save it to the user's record
        $random = rand(self::VERIFICATION_CODE_MIN, self::VERIFICATION_CODE_MAX);
        $user->verification_code = $random;
    
        if ($user->save()) {
            $data = [
                'email' => $user->email,
                'verification_code' => $user->verification_code,
                'username' => $user->username,
            ];
    
            try {
                // resource from https://www.itsolutionstuff.com/post/laravel-9-mail-laravel-9-send-email-tutorialexample.html
                Mail::to($data['email'])->send(new ResetPasswordVerification($data));
            } catch (\Exception $e) {
                // Error sending email, return an error response
                return response()->json([
                    'message' => 'Failed to send email. Please try again later.',
                    'status' =>false,
                ], 500);
            }
    
            // Email sent successfully, return a success response
            return response()->json([
                'message' => 'We have sent a verification code to your email address',
                'status' =>true,
            ], 200);
        } else {
            // Error saving user record, return an error response
            return response()->json([
                'message' => 'Failed to save user record. Please try again later.',
                'status' =>false,
            ], 500);
        }
    }
    
    public function resetPassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'verification_code' => ['required|integer'],
            'password' => ['required|confirmed|min:8']

        ]);

        $user = User::where('verification_code', $request->verification_code)->first();
        if (!$user) {
            return response()->json([
                'message' => 'User not found/Invalid code',
                'status_code' => 401
            ], 401);
        } else {

            $user->password = bcrypt(trim($request->password));
            $user->verification_code = null;
            if ($user->save()) {
                return response()->json([
                    'message' => 'Password changed successfully',
                    'status_code' => 200
                ], 200);
            } else {
                return response()->json([
                    'message' => 'Some error occurred, Please try again',
                    'status_code' => 500
                ], 500);
            }
        }
    }
}
