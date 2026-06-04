<?php

use App\Http\Controllers\DasboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/',[DasboardController::class,'index']);

Route::resource('jurusan',JurusanController::class);
Route::resource('prodi', ProdiController::class);
Route::resource('mahasiswa', MahasiswaController::class);