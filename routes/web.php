<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::middleware(['web'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth:sanctum', 'verified'])->name('dashboard');
    
    Route::get('/payments', [PaymentController::class, 'showPaymentForm'])->name('payment');
    Route::post('/process-payment', [PaymentController::class, 'initiatePayment'])->name('process-payment');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('callback');

});
Route::get('/success',function(){
    return view('success');
 
})->name('success');
