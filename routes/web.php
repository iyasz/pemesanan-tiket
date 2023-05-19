<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'manage.index');

// Auth 
Route::middleware(['guest'])->group(function () { 
    Route::get('/auth/login', [AuthController::class, 'index'])->name('login');
    Route::get('/login', [AuthController::class, 'login']);
});

// admin 
Route::middleware(['auth'])->group(function () { 
    Route::resource('/admin', AdminController::class);
    Route::resource('/tiket', TiketController::class);
    Route::resource('/transaksi', TransaksiController::class);
    Route::get('/search/tiket-pesawat', [TransaksiController::class, 'SearchTiketPesawat']);
    Route::get('/value/search/tiket-pesawat', [TransaksiController::class, 'getValueFromModal']);
    Route::post('/pembayaran/confirm', [TransaksiController::class, 'insertPaymentFromTransaksi']);
    Route::get('/logout', [AuthController::class, 'logout']);


});