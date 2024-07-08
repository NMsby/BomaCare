// web.php
<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DomesticworkerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $role = auth()->user()->role ?? null;
    if ($role === 'homeowner') {
        return redirect()->route('dashboard');
    }
    elseif ($role === 'admin') {
        return redirect()->route('admin.dashboard');
    }
    elseif ($role === 'domesticworker') {
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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Homeowner Group Middleware
Route::middleware(['auth', 'verified', 'role:homeowner'])->group(function () {
    //Homeowner Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/payments', [PaymentController::class, 'showPaymentForm'])->name('payment');
    Route::post('/process-payment', [PaymentController::class, 'initiatePayment'])->name('process-payment');
    Route::get('/payment/callback', [PaymentController::class, 'handleCallback'])->name('callback');

}); // End Group Homeowner Middleware

    Route::get('/success',function(){
        return view('success');
    
    })->name('success');

# -------------------------------------------------------------------------------------

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('guest')
    ->name('admin.login');

// Admin Group Middleware
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    // Admin Dashboard
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])
        ->name('admin.dashboard');

    // Admin Logout
    Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])
        ->name('admin.logout');

    // Admin Profile View
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])
        ->name('admin.profile');

    // Admin Profile Update
    Route::post('/admin/profile/partials/update-profile', [AdminController::class, 'AdminProfileUpdate'])
        ->name('admin.profile.update');

    // Get Admin Password View
    Route::get('/admin/profile/change-password', [AdminController::class, 'AdminPasswordView'])
        ->name('admin.profile.change-password');

    // Admin Update Password
    Route::post('/admin/profile/update-password', [AdminController::class, 'AdminUpdatePassword'])
        ->name('admin.profile.update-password');
}); // End Group Admin Middleware

# --------------------------------------------------------------------------------------------------------------

// Domestic Worker Group Middleware
Route::middleware(['auth', 'verified', 'role:domesticworker'])->group(function () {
    // Domestic Worker Dashboard
    Route::get('/domesticworker/dashboard', [DomesticworkerController::class, 'DomesticworkerDashboard'])
        ->name('domesticworker.dashboard');
}); // End Group Domestic Worker Middleware
