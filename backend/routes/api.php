<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PropertyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);

Route::resource('property', PropertyController::class);






// // Social Login (testing)
// Route::middleware(['cors'])->group(function () {
//     Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
//     Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
// });
