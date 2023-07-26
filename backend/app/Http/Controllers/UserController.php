<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
     * Display the specified resource.
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        return response()->json(['message' => 'success', 'data' => $user], 200);
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

    public function getImage(Request $request)
    {
        $image = $request->file('profile');
        $new_name =  rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'),$new_name);
        $path = asset('images/' . $new_name);
        return $path;

    }

    /**
     * Update the specified resource in storage.
     */
    public function updateImage(Request $request)
    {
        $profile = User::where('id',$request->id)->first();
        $profile->image = $request->image;
        $profile->save();
   
    }
  
}
