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
        if ($request->isGoogle) {
            $user = User::where('email', $request->email)->get();
            // Attempt to authenticate the user
            if (count($user) > 0) {
                // Authentication successful
                $token = $user->createToken('API Token')->plainTextToken;
                return response()->json(["message" => "login success", "user" => $user, 'token' => $token], 200);
            } else {
                // Authentication failed
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'image' => $request->image,
                    'role' => 'customer'
                ]);
                $token = $user->createToken('API Token')->plainTextToken;
                return response()->json([
                    'status' => true,
                    'user' => $user,
                    'token' => $token,
                ], 200);
            }
        }
        $validator = Validator::make($request->all(), [
            'email' => ['unique:users', 'email'],
        ]);
        if ($validator->fails()) {
            return response()->json(['status' => false, 'errors' => $validator->errors()], 401);
        }
        $user = User::create([
            'username' => $request->username,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
            'image' => 'https://cdn-icons-png.flaticon.com/128/1999/1999625.png',
        ]);

        $token = $user->createToken('API Token', ['select'])->plainTextToken;

        return response()->json([
            'status' => true,
            'user' => $user,
            'token' => $token,
        ], 200);
    }

    public function login(Request $request)
    {
        // get email and password
        $credentials = $request->only('email', 'password');
        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            $user = Auth::user();
            $token = $user->createToken('API Token', ['select'])->plainTextToken;
            return response()->json(["message" => "login success", "user" => $user, "token" => $token], 200);
        } else {
            // Authentication failed
            return response()->json(['status' => false, 'message' => 'Invalid email or password'], 401);
        }
    }

    public function logout(Request $request)
    {
        $user = $request->user();
        $user->tokens()->delete();
        return response()->json(['message' => 'your account has been logged out', 'user' => $user], 200);
    }
}
