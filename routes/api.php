<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DomesticworkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/login', [AuthController::class, 'login']);
Route::post('/login/verify', [AuthController::class, 'verify']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/domesticworker', [DomesticworkerController::class, 'show']);
    Route::post('/domesticworker', [DomesticworkerController::class, 'update']);

    Route::post('/booking', [BookingController::class, 'store']);
    Route::get('/booking/{booking}', [BookingController::class, 'show']);
    Route::post('/booking/{booking}/accept', [BookingController::class, 'accept']);
    Route::post('/booking/{booking}/start', [BookingController::class, 'reject']);
    Route::post('/booking/{booking}/end', [BookingController::class, 'end']);
    Route::post('/booking/{booking}/location', [BookingController::class, 'location']);

    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});


