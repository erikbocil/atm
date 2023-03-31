<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
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

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/store', [RegisterController::class, 'store']);
});

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('dashboard', [UserController::class, 'index'])->name('dashboard');
    Route::get('saldo', [UserController::class, 'tambah'])->name('tambah');
    Route::get('tambah', [UserController::class, 'saldo'])->name('cek.saldo');
    Route::post('tarik', [UserController::class, 'tarik'])->name('tarik.dana');
    Route::post('transfer', [UserController::class, 'transfer'])->name('transfer.dana');
    Route::get('riwayat', [UserController::class, 'riwayat'])->name('riwayat');
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
