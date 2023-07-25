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
