<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DomesticworkerController;
use App\Http\Controllers\HomeownerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $role = auth()->user()->role ?? null;
    if ($role === 'homeowner') {
        return redirect()->route('dashboard');
    } elseif ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    } elseif ($role === 'domesticworker') {
        return redirect()->route('domesticworker.dashboard');
    } else {
        return view('welcome');
    }
});

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/services', function () {
    return view('services');
})->name('services');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Homeowner Group Middleware
Route::middleware(['auth', 'verified', 'role:homeowner'])->group(function () {
    Route::get('/dashboard', [HomeownerController::class, 'dashboard'])->name('dashboard');
    Route::get('/payments', [HomeownerController::class, 'showPayments'])->name('payments');
    Route::post('/process-payment', [PaymentController::class, 'initiatePayment'])->name('process-payment');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('callback');
});

// Success route
Route::get('/success', function () {
    return view('payments.success');
})->name('success');

// Failed route
Route::get('/failed', function () {
    return view('payments.failed');
})->name('failed');


// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('guest')->name('admin.login');

// Admin Group Middleware
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/partials/update-profile', [AdminController::class, 'AdminProfileUpdate'])->name('admin.profile.update');
    Route::get('/admin/profile/change-password', [AdminController::class, 'AdminPasswordView'])->name('admin.profile.change-password');
    Route::post('/admin/profile/update-password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.profile.update-password');
});

// Domestic Worker Group Middleware
Route::middleware(['auth', 'verified', 'role:domesticworker'])->group(function () {
    Route::get('/domesticworker/dashboard', [DomesticworkerController::class, 'DomesticworkerDashboard'])->name('domesticworker.dashboard');
    Route::get('/domesticworker/create-job', [DomesticworkerController::class, 'createJob'])->name('domesticworker.create-job');
    Route::post('/domesticworker/store-job', [DomesticworkerController::class, 'storeJob'])->name('domesticworker.store-job');
});
