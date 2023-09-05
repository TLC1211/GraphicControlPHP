<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('A/dashboard', [DashboardController::class, 'WebIndex'])->name('Dashboard.WebIndex');

Route::get('/', function () {
    return view('welcome');
});
