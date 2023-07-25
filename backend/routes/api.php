<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DistrictControllr;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WishlistController;
use App\Models\Booking;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UserController;

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
// Authentication 
Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthenticationController::class, 'logout']);
});
Route::post('/login', [AuthenticationController::class, 'login']);
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/reset_password', [ForgotPasswordController::class, 'resetPassword']);
Route::post('/reset_password_request', [ForgotPasswordController::class, 'resetPasswordRequest']);
//search route 

// Property 
Route::group(['prefix'=>'properties'], function(){
    Route::get('/', [PropertyController::class, 'index']);
    Route::get('/pagination', [PropertyController::class, 'pagination']);
    Route::get('/location/{name}', [PropertyController::class, 'searchLocation']);
    Route::post('/ratings',[RatingController::class, 'store']);
    Route::get('/ratings',[RatingController::class, 'index']);
    Route::get('/ratings/{id}',[RatingController::class, 'show']);
    Route::delete('/delete/{id}', [PropertyController::class, 'deleteHouse']);
    Route::get('/detail/{id}', [PropertyController::class, 'showDetail']);
});

// Wishlist 
Route::get('/wishlist/{userId}', [WishlistController::class, 'getDataWishlist']);
Route::post('/wishlist', [WishlistController::class, 'createWishlist']);
Route::delete('/wishlist/{wishListId}', [WishlistController::class, 'deleteItem']);
// Graph 
Route::get('/getDataGrap', [GraphController::class, 'dataGrap']);
// Location 
Route::resource('districts', DistrictController::class);

Route::post('/createProperty', [PropertyController::class, 'createProperty']);
Route::put('/updateProperty/{id}', [PropertyController::class, 'updateProperty']);
Route::post('/image', [PropertyController::class, 'getImage']);
Route::get('/getAllProperties/{id}', [PropertyController::class, 'getAllProperties']);
Route::get('/getPropertyId/{id}', [PropertyController::class, 'getPropertyId']);

// get user 
Route::get('/user', [UserController::class, 'index']);

// get customers
Route::get('/customers', [UserController::class,'getCustomer']);

// get landlords
Route::get('/landlord', [UserController::class,'getlandlord']);


// // Social Login (testing)
// Route::middleware(['cors'])->group(function () {
//     Route::get('/auth/{provider}/redirect', [ProviderController::class, 'redirect']);
//     Route::get('/auth/{provider}/callback', [ProviderController::class, 'callback']);
// });
