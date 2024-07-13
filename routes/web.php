<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\ServiceTypeController;
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
Route::get('/services', function () {
    return view('services');
})->name('services');
Route::get('/pricing', function () {
    return view('pricing');
})->name('pricing');

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
}); // End Group Homeowner MiddleWare

# -------------------------------------------------------------------------------------

// Admin Login
Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware('guest')
    ->name('admin.login');

// Admin Group Middleware
Route::middleware(['auth', 'verified', 'role:admin'])->group(function () {
    Route::controller(AdminController::class)->group(function () {
        // Admin Dashboard
        Route::get('/admin/dashboard', 'AdminDashboard')->name('admin.dashboard');

        # ----------------------------------------------------------------------------------------------

        // Admin Lock Screen
        Route::get('/admin/lockscreen', 'AdminLockScreen')->name('admin.lockscreen');
        // Admin Lock Screen Unlock
        Route::post('/admin/unlock', 'AdminUnlockScreen')->name('admin.unlock-screen');

        # -----------------------------------------------------------------------------------------------

        // Admin Logout
        Route::get('/admin/logout', 'AdminLogout')->name('admin.logout');

        // Admin Profile View
        Route::get('/admin/profile', 'AdminProfile')->name('admin.profile');

        // Admin Profile Update
        Route::post('/admin/profile/partials/update-profile','AdminProfileUpdate')->name('admin.profile.update');

        // Get Admin Password View
        Route::get('/admin/profile/change-password','AdminPasswordView')->name('admin.profile.change-password');

        // Admin Update Password
        Route::post('/admin/profile/update-password','AdminUpdatePassword')->name('admin.profile.update-password');
    });

    // Service Type Controller
    Route::controller(ServiceTypeController::class)->group(function () {
        // Service Type Index
        Route::get('/admin/service-type/', 'index')->name('service-type.index');

        // Service Type Create
        Route::get('/admin/service-type/create', 'create')->name('service-type.create');

        // Service Type Store
        Route::post('/admin/service-type/store', 'store')->name('service-type.store');

        // Service Type Edit
        Route::get('/admin/service-type/edit/{id}', 'edit')->name('service-type.edit');

        // Service Type Show
        Route::get('/admin/service-type/show/{id}', 'show')->name('service-type.show');

        // Service Type Update
        Route::post('/admin/service-type/update', 'update')->name('service-type.update');

        // Service Type Delete
        Route::get('/admin/service-type/delete/{id}', 'delete')->name('service-type.delete');
    });

    // Permission Controller
    Route::controller(RoleController::class)->group(function () {
        // Permission Index
        Route::get('/admin/permissions', 'index')->name('permissions.index');

        // Permission Create
        Route::get('/admin/permissions/create', 'create')->name('permissions.create');

        // Permission Store
        Route::post('/admin/permissions/store', 'store')->name('permissions.store');

        // Permission Edit
        Route::get('/admin/permissions/edit/{id}', 'edit')->name('permissions.edit');

        // Permission Update
        Route::post('/admin/permissions/update', 'update')->name('permissions.update');

        // Permission Delete
        Route::get('/admin/permissions/delete/{id}', 'delete')->name('permissions.delete');

        // Permission Import
        Route::get('/admin/permissions/import', 'import')->name('permissions.import');

        // Permission Export
        Route::get('/admin/permissions/export', 'export')->name('permissions.export');
    });

}); // End Group Admin Middleware

# --------------------------------------------------------------------------------------------------------------

// Domestic Worker Group Middleware
Route::middleware(['auth', 'verified', 'role:domesticworker'])->group(function () {
    // Domestic Worker Dashboard
    Route::get('/domesticworker/dashboard', [DomesticworkerController::class, 'DomesticworkerDashboard'])
        ->middleware(['auth', 'verified'])->name('domesticworker.dashboard');

    // Job Application
    Route::get('/domesticworker/jobs/index', [DomesticworkerController::class, 'JobIndex'])
        ->middleware(['auth', 'verified'])->name('domesticworker.jobs.index');


}); // End Group Domestic Worker Middleware
