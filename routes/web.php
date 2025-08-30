<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\PeternakController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\VendorDashboardController;
use App\Http\Controllers\PeternakDashboardController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['role:peternak'])->group(function () {
    Route::get('/peternak/dashboard', [PeternakDashboardController::class, 'index'])->name('peternak.dashboard');
});

Route::middleware(['role:vendor'])->group(function () {
    Route::get('/vendor/dashboard', [VendorDashboardController::class, 'index'])->name('vendor.dashboard');
});

Route::resource('livestocks', LivestockController::class);
Route::get('/peternak/gabung', [PeternakController::class, 'formGabung'])->name('peternak.form');
Route::post('/peternak/gabung', [PeternakController::class, 'simpan'])->name('peternak.simpan');
Route::middleware(['role:peternak'])->group(function () {
Route::get('/peternak/dashboard', [PeternakDashboardController::class, 'index'])->name('peternak.dashboard');});