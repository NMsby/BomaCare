<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminController as BackendAdminController;
use App\Http\Controllers\Domesticworker\ServicesController as DomesticServicesController;
use App\Http\Controllers\DomesticworkerController;
use App\Http\Controllers\DomesticworkerController as BackendDomesticworkerController;
use App\Http\Controllers\Backend\HomeownerController as BackendHomeownerController;
use App\Http\Controllers\Backend\PermissionController;
use App\Http\Controllers\Backend\RoleController;
use App\Http\Controllers\Backend\RolePermissionsController;
use App\Http\Controllers\Backend\ServiceTypeController;
use App\Http\Controllers\Homeowner\ServicesController as HomeownerServicesController;
use App\Http\Controllers\Homeowner\DomesticworkersController as HomeownerDomesticworkersController;
use App\Http\Controllers\Homeowner\BookingsController as HomeownerBookingsController;
use App\Http\Controllers\Homeowner\AppointmentsController as HomeownerAppointmentsController;
use App\Http\Controllers\Homeowner\PaymentsController as HomeownerPaymentsController;
use App\Http\Controllers\HomeownerController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $role = auth()->user()->role ?? null;
    if ($role === 'homeowner') {
        return redirect()->route('homeowner.dashboard');
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

Route::middleware(['auth', 'role:homeowner|domesticworker'])
    ->controller(ProfileController::class)->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
});

require __DIR__.'/auth.php';

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
    Route::controller(PermissionController::class)->group(function () {
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
        // Permission Upload
        Route::post('/admin/permissions/upload', 'upload')->name('permissions.upload');
    });

    // Role Controller
    Route::controller(RoleController::class)->group(function () {
        // Role Index
        Route::get('/admin/roles', 'index')->name('roles.index');
        // Role Create
        Route::get('/admin/roles/create', 'create')->name('roles.create');
        // Role Store
        Route::post('/admin/roles/store', 'store')->name('roles.store');
        // Role Edit
        Route::get('/admin/roles/edit/{id}', 'edit')->name('roles.edit');
        // Role Update
        Route::post('/admin/roles/update', 'update')->name('roles.update');
        // Role Delete
        Route::get('/admin/roles/delete/{id}', 'delete')->name('roles.delete');
        // Role Import
        Route::get('/admin/roles/import', 'import')->name('roles.import');
        // Role Export
        Route::get('/admin/roles/export', 'export')->name('roles.export');
        // Role Upload
        Route::post('/admin/roles/upload', 'upload')->name('roles.upload');

        // Role Assign to User
        Route::get('/admin/roles/assign-to-user/', 'assignToUser')->name('role-user.index');
    });

    // Role Permissions Controller
    Route::controller(RolePermissionsController::class)->group(function () {
        // Role Permissions Index
        Route::get('/admin/role-permissions', 'index')->name('role-permissions.index');
        // Role Permissions Create
        Route::get('/admin/role-permissions/create', 'create')->name('role-permissions.create');
        // Role Permissions Store
        Route::post('/admin/role-permissions/store', 'store')->name('role-permissions.store');
        // Role Permissions Edit
        Route::get('/admin/role-permissions/edit/{id}', 'edit')->name('role-permissions.edit');
        // Role Permissions Update
        Route::post('/admin/role-permissions/update{id}', 'update')->name('role-permissions.update');
        // Role Permissions Delete
        Route::get('/admin/role-permissions/delete/{id}', 'delete')->name('role-permissions.delete');

        // Role Permissions Import
        Route::get('/admin/role-permissions/import', 'import')->name('role-permissions.import');
        // Role Permissions Export
        Route::get('/admin/role-permissions/export', 'export')->name('role-permissions.export');
        // Role Permissions Upload
        Route::post('/admin/role-permissions/upload', 'upload')->name('role-permissions.upload');
    });

    // Manage Administrator Controller
    Route::controller(BackendAdminController::class)->group(function () {
        Route::get('/admin/administrators', 'index')->name('administrators.index')
            ->middleware('permission:view administrator menu');
        Route::get('/admin/administrators/create', 'create')->name('administrators.create');
        Route::post('/admin/administrators/store', 'store')->name('administrators.store');
        Route::get('/admin/administrators/edit/{id}', 'edit')->name('administrators.edit');
        Route::post('/admin/administrators/update{id}', 'update')->name('administrators.update');
        Route::get('/admin/administrators/delete/{id}', 'delete')->name('administrators.delete');
    });

    // Manage Domestic Worker Controller
    Route::controller(BackendDomesticworkerController::class)->group(function () {
        Route::get('/admin/domestic-workers', 'index')->name('domestic-workers.index');
        Route::get('/admin/domestic-workers/create', 'create')->name('domestic-workers.create');
        Route::post('/admin/domestic-workers/store', 'store')->name('domestic-workers.store');
        Route::get('/admin/domestic-workers/edit/{id}', 'edit')->name('domestic-workers.edit');
        Route::post('/admin/domestic-workers/update', 'update')->name('domestic-workers.update');
        Route::get('/admin/domestic-workers/delete/{id}', 'delete')->name('domestic-workers.delete');
    });

    // Manage Homeowner Controller
    Route::controller(BackendHomeownerController::class)->group(function () {
        Route::get('/admin/homeowners', 'index')->name('homeowners.index');
        Route::get('/admin/homeowners/create', 'create')->name('homeowners.create');
        Route::post('/admin/homeowners/store', 'store')->name('homeowners.store');
        Route::get('/admin/homeowners/edit/{id}', 'edit')->name('homeowners.edit');
        Route::post('/admin/homeowners/update', 'update')->name('homeowners.update');
        Route::get('/admin/homeowners/delete/{id}', 'delete')->name('homeowners.delete');
    });

}); // End Group Admin Middleware

# --------------------------------------------------------------------------------------------------------------

// Domestic Worker Group Middleware
Route::middleware(['auth', 'verified', 'role:domesticworker'])->group(function () {
    // Domestic Worker Controller
    Route::controller(DomesticworkerController::class)->group(function () {
        // Domestic Worker Dashboard
        Route::get('/domesticworker/dashboard', 'DomesticworkerDashboard')
            ->name('domesticworker.dashboard');

        # -------------------------------------------------------------------------------------------

        // Domesticworker ServicesController
        Route::controller(DomesticServicesController::class)->group(function() {
            // View Services Menu
            Route::get('/domesticworker/services/index', 'index')
                ->name('domesticworker.services.index');
            // View Service Details Page
            Route::get('/domesticworker/services/view/{id}', 'view')
                ->name('domesticworker.services.view');
            // Register for a Service
            Route::get('/domesticworker/services/register/{id}', 'RegisterService')
                ->name('domesticworker.services.register');
        });

        # ----------------------------------------------------------------------------------------

        // View Applications Menu
        Route::get('/domesticworker/applications/index', 'index')
            ->name('domesticworker.applications.index');
        // Delete Application
        Route::get('/domesticworker/applications/delete/{id}', 'delete')
            ->name('domesticworker.applications.delete');

        # -------------------------------------------------------------------------------------------

        // View Jobs Menu
        Route::get('/domesticworker/jobs/index', 'JobsIndex')
            ->name('domesticworker.jobs.index');
        // View Job Details Page
        Route::get('/domesticworker/jobs/view/{id}', 'ViewJob')
            ->name('domesticworker.jobs.view');
        // Accept Job
        Route::get('/domesticworker/jobs/accept/{id}', 'AcceptJob')
            ->name('domesticworker.jobs.accept');
        // Decline Job
        Route::get('/domesticworker/jobs/decline/{id}', 'DeclineJob')
            ->name('domesticworker.jobs.decline');

        # -------------------------------------------------------------------------------------------

        // View Appointments Menu
        Route::get('/domesticworker/appointments/index', 'AppointmentsIndex')
            ->name('domesticworker.appointments.index');
        // View Appointment Details Page
        Route::get('/domesticworker/appointments/view/{id}', 'ViewAppointment')
            ->name('domesticworker.appointments.view');
        // Cancel Appointment
        Route::get('/domesticworker/appointments/cancel/{id}', 'CancelAppointment')
            ->name('domesticworker.appointments.cancel');
    });
}); // End Group Domestic Worker Middleware

# --------------------------------------------------------------------------------------------------------------

// Homeowner Group Middleware
Route::middleware(['auth', 'verified', 'role:homeowner'])->group(function () {
    // Homeowner Worker Controller
    Route::controller(HomeownerController::class)->group(function () {
        // Homeowner Dashboard
        Route::get('/homeowner/dashboard', 'HomeownerDashboard')
            ->name('homeowner.dashboard');

        # --------------------------------------------------------------------------------------

        // Homeowner ServicesController
        Route::controller(HomeownerServicesController::class)->group(function() {
            // View Services Menu
            Route::get('/homeowner/services/index', 'index')
                ->name('homeowner.services.index');
            // View Service Details Page
            Route::get('/homeowner/services/view/{id}', 'view')
                ->name('homeowner.services.view');
            // Book for a Service
            Route::get('/homeowner/services/book/{id}', 'BookService')
                ->name('homeowner.services.book');
        });

        # --------------------------------------------------------------------------------------

        Route::controller(HomeownerDomesticworkersController::class)->group(function (){
            // View Domestic Workers Menu
            Route::get('/homeowner/domestic-workers/index', 'index')
                ->name('homeowner.domestic-workers.index');
            // View Domestic Worker Details Page
            Route::get('/homeowner/domestic-workers/view/{id}', 'view')
                ->name('homeowner.domestic-workers.view');
            // Hire Domestic Worker
            Route::get('/homeowner/domestic-workers/hire/{id}', 'hire')
                ->name('homeowner.domestic-workers.hire');
        });

        # --------------------------------------------------------------------------------

        Route::controller(HomeownerBookingsController::class)->group(function () {
            // View Bookings
            Route::get('/homeowner/bookings/index', 'index')
                ->name('homeowner.bookings.index');
            // Create Booking
            Route::get('/homeowner/bookings/create', 'create')
                ->name('homeowner.bookings.create');
            // Store Booking
            Route::post('/homeowner/bookings/store', 'store')
                ->name('homeowner.bookings.store');
            // Delete Booking
            Route::get('/homeowner/bookings/delete/{id}', 'delete')
                ->name('homeowner.bookings.delete');
        });
        # --------------------------------------------------------------------------------

        Route::controller(HomeownerAppointmentsController::class)->group(function () {
            // View Appointments Menu
            Route::get('/homeowner/appointments/index', 'AppointmentsIndex')
                ->name('homeowner.appointments.index');
            // View Appointment Details Page
            Route::get('/homeowner/appointments/view/{id}', 'ViewAppointment')
                ->name('homeowner.appointments.view');
            // Cancel Appointment
            Route::get('/homeowner/appointments/cancel/{id}', 'CancelAppointment')
                ->name('homeowner.appointments.cancel');
        });
        # --------------------------------------------------------------------------------

        Route::controller(HomeownerPaymentsController::class)->group(function () {
            // View Payments Menu
            Route::get('/homeowner/payments/index', 'PaymentsIndex')
                ->name('homeowner.payments.index');
            // View Payment Details Page
            Route::get('/homeowner/payments/view/{id}', 'ViewPayment')
                ->name('homeowner.payments.view');
            // Make Payment
            Route::get('/homeowner/payments/make/{id}', 'MakePayment')
                ->name('homeowner.payments.make');
        });
    });

}); // End Group Homeowner Middleware
