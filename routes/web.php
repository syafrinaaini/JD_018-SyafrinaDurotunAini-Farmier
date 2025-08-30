<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\FarmsController;
use App\Http\Controllers\PeternakDashboardController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');

// Auth Routes
Route::get('/login', [AuthController::class, 'showLogin'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Farm / Peternakan Routes
Route::middleware(['auth'])->group(function () {
    // Dashboard peternak (optional)
    Route::get('/peternak/dashboard', [PeternakDashboardController::class, 'index'])->name('peternak.dashboard');

    // Tampilkan daftar farm user
    Route::get('/farms', [FarmsController::class, 'index'])->name('farms.index');

    // Form tambah farm
    Route::get('/peternakan', [FarmsController::class, 'create'])->name('peternak.form');

    // Simpan farm baru
    Route::post('/peternakan', [FarmsController::class, 'store'])->name('peternak.simpan');

    // Form edit farm
    Route::get('/farms/{farm}/edit', [FarmsController::class, 'edit'])->name('farms.edit');

    // Update farm
    Route::put('/farms/{farm}', [FarmsController::class, 'update'])->name('farms.update');

    // Hapus farm
    Route::delete('/farms/{farm}', [FarmsController::class, 'destroy'])->name('farms.destroy');
});

// Resource routes untuk Livestock
Route::resource('livestocks', LivestockController::class);
