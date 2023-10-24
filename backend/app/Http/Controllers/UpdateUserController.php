<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UpdateUserController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function updateUser(Request $request, string $id)
    {
        $user = User::find($id);
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
           
        ]);
        if ($validator->fails()) {
            if ($validator->fails()) {
                return response()->json(['status' => false, 'errors' => $validator->errors()], 402);
            }
        }
        $user->update($validator->validated());
        return response()->json(['message' => 'successfully updated', 'data' => $user], 200);
        
    }
}
