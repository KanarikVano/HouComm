<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculationController;

Route::middleware('auth')->group(function () {
    Route::get('/calculations', [CalculationController::class, 'index'])->name('calculations.index');
    Route::get('/calculations/create', [CalculationController::class, 'create'])->name('calculations.create');
    Route::post('/calculations', [CalculationController::class, 'store'])->name('calculations.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
