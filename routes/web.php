<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;

// Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/process-login', [AuthController::class, 'login'])->name('process-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/mhs', [MahasiswaController::class, 'import'])->name('import');
Route::get('/mhs', [MahasiswaController::class, 'showImportForm'])->name('ppp');

Route::middleware(['auth'])->group(function () {
    Route::middleware(['roleAccess:1'])->group(function () {
        @include_once('web_admin.php'); 
    });

    Route::middleware(['roleAccess:2'])->group(function () {
        @include_once('web_prodi.php'); 
    });

    Route::middleware(['roleAccess:3'])->group(function () {
        @include_once('web_dosbim.php'); 
    });

    Route::middleware(['roleAccess:4'])->group(function () {
        @include_once('web_mhs.php'); 
    });

});