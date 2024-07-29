<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


Route::get('/', [AuthController::class, 'check']);
Route::get('/login', [AuthController::class, 'loginview'])->name('auth.loginview');
Route::post('login', [AuthController::class, 'login'])->name('login');

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('pages.dashboard');

    Route::post(
        '/logout',
        [AuthController::class, 'logout']
    )->name('logout');

    Route::resource('users', UserController::class);
});
