<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = User::all()->count();
        return response()->json(['message'=>'Requested user successfully!','data'=>$user]);
    }

    // get customers
    public function getCustomer()
    {
        $customers = User::where('role', 'Customer')->get()->count();
        return $customers;
    }
    // get landlords
    public function getLandlord()
    {
        $landlord = User::where('role', 'Landlord')->get()->count();
        return $landlord;
    }
    // get getAllUsers
    public function getAllUsers()
    {
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::select('username', 'password', 'email', 'role')->find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }    
        return response()->json(['message' => 'success', 'data' => [
            'username' => $user->username,
            'password' => $user->password,
            'email' => $user->email,
            'role' => $user->role,
        ]], 200);
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
    public function destroyUser(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'delete user successfully!','data'=>$user]);

    }
}
