<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;


class ProviderController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('web');
    // }

    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        // $user = Socialite::driver($provider)->user();
        $user = Socialite::driver($provider)->stateless()->user();
        dd($user);
    }
}
