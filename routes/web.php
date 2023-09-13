<?php

use App\Http\Controllers\ChartController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SetPageController;
use Illuminate\Support\Facades\Route;

Route::get('/Test', function () {
    return view('Test');
});

Route::get('/', function () {
    return Redirect()->route('Dashboard.WebIndex');
});

Route::get('/dashboard', [DashboardController::class, 'Index'])->name('Dashboard.WebIndex');
Route::get('/mb/dashboard', [DashboardController::class, 'mb_Index'])->name('Dashboard.MbIndex');

Route::get('/set', [SetPageController::class, 'Index'])->name('set.WebIndex');
Route::get('/mb/set', [SetPageController::class, 'mb_Index'])->name('set.MbIndex');

Route::get('/Component', [ComponentController::class, 'Index'])->name('Component.WebIndex');
Route::get('/mb/Component', [ComponentController::class, 'mb_Index'])->name('Component.MbIndex');

Route::get('/charSet', [ChartController::class, 'Index'])->name('charSet.WebIndex');
Route::get('/mb/charSet', [ChartController::class, 'mb_Index'])->name('charSet.MbIndex');

