<?php

use App\Http\Controllers\Authcontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Login And Register end points
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

// Admin Area
Route::middleware(['auth:sanctum', 'isAdmin'])->group(function () {
    Route::get('/admin/trips', [\App\Http\Controllers\Admin\TripController::class, 'index']);
    Route::get('/admin/booking-list', [\App\Http\Controllers\Admin\BookingController::class, 'index']);
});

// User Area
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/available-seats', [\App\Http\Controllers\User\BookingController::class, 'availableSeats']);
    Route::post('/book-seat', [\App\Http\Controllers\User\BookingController::class, 'bookSeat']);
});
