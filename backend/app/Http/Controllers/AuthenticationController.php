<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'username' => ['required', 'min:5'],
            // 'phone_number' => ['required', 'min:8'],
            'email' => ['unique:users','email'],
            // 'password_confirmation' => ['required'],
            'password' => ['required', 'min:8','confirmed'],
        ]);
        
        if ($validator->fails()) {
            return response()->json(['success'=>'false', 'errors' => $validator->errors()], 401);
        }
        $user = User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('API Token', ['select'])->plainTextToken;

        return response()->json([
            'success' => 'true',
            'user' => $user,
            'token' => $token,
        ], 200);
    }
    
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();
        return response()->json([
            'message' => 'your account has been logged out'
        ], 200);
    }


    public function login(Request $request)
    {
        // Validate the input data
        $validator = Validator::make($request->all(), [
            'email' => ['required','email'],
            'password' => ['required','min:8'],
        ]);
        if($validator->fails()){
            return response()->json(['success'=>'false', 'errors' => $validator->errors()]  , 401);
        }
        // get email and password
        $credentials = $request->only('email', 'password');
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            $token = $user->createToken('API Token', ['select'])->plainTextToken;
            return response()->json(["message" => "login success","user"=>$user,"token" => $token], 200);
        } else {
            // Authentication failed
            return response()->json(['errors' => 'Invalid email or password'], 401);
        }
    }

}
