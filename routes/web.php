<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// Публичные маршруты
Route::get('/', function () {
    return view('welcome');
});

// Защищённые маршруты для пользователей
Route::middleware('auth')->group(function () {
    Route::get('/calculations', [CalculationController::class, 'index'])->name('calculations.index');
    Route::get('/calculations/create', [CalculationController::class, 'create'])->name('calculations.create');
    Route::post('/calculations', [CalculationController::class, 'store'])->name('calculations.store');
    Route::get('/calculations/chart', [CalculationController::class, 'showChart'])->name('calculations.chart');
});

// Админ-маршруты
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::resource('tariffs', AdminController::class)->except('show');
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
});