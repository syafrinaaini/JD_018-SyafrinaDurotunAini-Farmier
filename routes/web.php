<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VendorDashboardController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\PeternakController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');
Route::get('/dashboard', [VendorDashboardController::class, 'index'])->name('dashboard');
Route::resource('livestocks', LivestockController::class);
Route::get('/peternak/gabung', [PeternakController::class, 'formGabung'])->name('peternak.form');
Route::post('/peternak/gabung', [PeternakController::class, 'simpan'])->name('peternak.simpan');
