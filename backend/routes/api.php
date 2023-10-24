<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\GraphController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\WishlistController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LandlordRequestController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\UpdateUserController;
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
Route::post('/requestLandlord', [LandlordRequestController::class, 'sendRequest']);
// Booking 
Route::post('/booking', [BookingController::class,'booking']);

Route::put('/updateUser/{id}', [UpdateUserController::class, 'updateUser']);


// get all users 
Route::get('/users', [UserController::class, 'getAllUsers']);

// delete users 
Route::delete('/delete_user/{id}', [UserController::class, 'destroyUser']);

// get customers
Route::get('/customers', [UserController::class,'getCustomer']);

// get landlords
Route::get('/landlords', [UserController::class,'getlandlord']);
Route::get('/userId/{id}', [UserController::class,'show']);

//change profile
Route::post('/imageProfile', [UserController::class,'getImage']);
Route::post('/editProfile', [UserController::class,'updateImage']);

//get number of booking
Route::get('/numberOfBooking', [BookingController::class,'getBooking']);

