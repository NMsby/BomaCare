<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\HomeownerController;
use App\Http\Controllers\WorkerController;

Route::get('/', function () {
    return view('welcome');
});

// Authenticated routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/homeowner/dashboard', [HomeownerController::class, 'dashboard'])->name('homeowner.dashboard');

    Route::get('/worker/form', [WorkerController::class, 'form'])->name('worker.form');
    Route::post('/worker/save', [WorkerController::class, 'save'])->name('worker.save');

    Route::get('/workers', [WorkerController::class, 'list'])->name('worker.list');
    Route::get('/worker/actions', [WorkerController::class, 'showActions'])->name('worker.actions');
    Route::get('/worker/jobs', [WorkerController::class, 'showJobs'])->name('worker.jobs');
    Route::get('/worker/jobs/add', [WorkerController::class, 'showJobForm'])->name('worker.job.form');
    Route::post('/worker/jobs/save', [WorkerController::class, 'saveJob'])->name('worker.job.save');
});

// Route for selecting roles
Route::get('/role/select/{role}', [RoleController::class, 'select'])->name('role.select');

// Routes accessible without authentication
Route::middleware('auth')->group(function () {
    Route::get('/homeowner/form', [HomeownerController::class, 'showForm'])->name('homeowner.form');
});
Route::post('/homeowner/save', [HomeownerController::class, 'save'])->name('homeowner.save');
