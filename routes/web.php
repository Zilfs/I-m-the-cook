<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PesananController;
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

Route::get('/', [AuthController::class, 'index'])->name('login');
Route::post('/login-authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');
});

Route::middleware(['auth', 'isAdminOrWaiter'])->group(function () {
    Route::resource('/menu', MenuController::class);
});

Route::middleware(['auth', 'isWaiter'])->group(function () {
    Route::resource('/customer', PelangganController::class);
    Route::resource('/pesanan', PesananController::class);
    Route::get('/create-pesanan/{id}', [PesananController::class, 'create'])->name('pesanan-for');
    Route::post('/add-pesanan/{id}', [PesananController::class, 'store'])->name('add-pesanan');
});
