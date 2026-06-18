<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\MahasiswaController;

// Rute Guest (Hanya bisa diakses sebelum login)
Route::middleware('guest')->group(function () {
    // SUDAH DIUBAH: Menggunakan 'loginForm' sesuai dengan AuthController kamu
    Route::get('/', [AuthController::class, 'loginForm'])->name('login');
    Route::post('/', [AuthController::class, 'login']);
});

// Rute Global Logout (Bisa diakses oleh semua role yang sudah login)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ==========================================
// KELOMPOK RUTE KHUSUS ROLE: ADMIN
// ==========================================
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard', ['title' => 'Dashboard Admin']);
    })->name('dashboard');

    // Data Master Admin
    Route::resource('jurusan', JurusanController::class);
    Route::resource('prodi', ProdiController::class);
    Route::resource('mahasiswa', MahasiswaController::class);
});

// ==========================================
// KELOMPOK RUTE KHUSUS ROLE: MAHASISWA
// ==========================================
Route::middleware(['auth', 'mahasiswa'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
    
    // Halaman Biodata Mahasiswa
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata');
});