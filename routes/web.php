<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\FarmsController;
use App\Http\Controllers\PeternakDashboardController;
use App\Http\Controllers\VendorDashboardController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Grup route yang butuh login
Route::middleware(['auth'])->group(function () {
    Route::get('/peternak/dashboard', [PeternakDashboardController::class, 'index'])->name('peternak.dashboard');
    Route::get('/farms', [FarmsController::class, 'index'])->name('farms.index');
    Route::get('/peternakan', [FarmsController::class, 'create'])->name('peternak.form');
    Route::post('/peternakan', [FarmsController::class, 'store'])->name('peternak.simpan');
    Route::get('/farms/{farm}/edit', [FarmsController::class, 'edit'])->name('farms.edit');
    Route::put('/farms/{farm}', [FarmsController::class, 'update'])->name('farms.update');
    Route::delete('/farms/{farm}', [FarmsController::class, 'destroy'])->name('farms.destroy');

    // Vendor Dashboard
    Route::get('/vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');

    // Livestocks
    Route::resource('livestocks', LivestockController::class);
});
