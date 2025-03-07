<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminMiddleware;


// Публичные маршруты
Route::get('/', function(){return view('main');})->name('main');
Route::get('/login',[UserController::class, 'login'])->name('login');
Route::get('/reg',[UserController::class, 'reg'])->name('reg');
Route::post('/login',[UserController::class, 'auth'])->name('auth');
Route::post('/reg',[UserController::class, 'store'])->name('user.store');;

// Защищённые маршруты для пользователей
Route::middleware('auth')->group(function () {
    Route::post('/logout',[UserController::class, 'logout'])->name('logout');
    Route::get('/calculations', [CalculationController::class, 'index'])->name('calculations.index');
    Route::get('/calculations/create', [CalculationController::class, 'create'])->name('calculations.create');
    Route::post('/calculations', [CalculationController::class, 'store'])->name('calculations.store');
    Route::get('/calculations/chart', [CalculationController::class, 'showChart'])->name('calculations.chart');

    // Админ-маршруты
    Route::middleware([AdminMiddleware::class])->group(function () {
        Route::resource('tariffs', AdminController::class)->except('show');
        Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    });
});