<?php

namespace App\Http\Controllers;

use App\Models\ImageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Profiler\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getImage(Request $request)
    {
        // $profile = ImageProfile::where('user_id',$request->user_id)->first();
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
        $profile = ImageProfile::where('user_id',$request->user_id)->first();
        $profile->image = $request->image;
        $profile->save();
   
    }
  
    
   
}
