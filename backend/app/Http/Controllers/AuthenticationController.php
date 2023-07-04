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
            'user_name' => 'required',
            'phone_number' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:8',

            
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = User::create([
            'user_name' => $request->user_name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);

        $token = $user->createToken('API Token', ['select'])->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token,
        ]);
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
        // get email and password
        $credentials = $request->only('email', 'password');
        // check if email and password valid
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('API Token', ['select'])->plainTextToken;
            return response()->json(["message" => "success", "user" => $user, "token" => $token], 200);
        }
        return response()->json([
            'message' => 'Invalid credentials'
        ], 401);
    }
}
