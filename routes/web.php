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
    return Redirect()->route('Dashboard.WebIndex'); //直接帶到第17列
});

Route::get('/dashboard', [DashboardController::class, 'Index'])->name('Dashboard.WebIndex');
Route::get('/mb/dashboard', [DashboardController::class, 'mb_Index'])->name('Dashboard.MbIndex');
Route::get('/dashboard_Api', [DashboardController::class, 'Api'])->name('Dashboard.Api');
Route::get('/dashboard_vChartByAll', [DashboardController::class, 'vChart'])->name('Dashboard.vChartByAll');
Route::get('/dashboard_vStringByAll', [DashboardController::class, 'vStringByAll'])->name('Dashboard.vStringByAll');
Route::get('/dashboard_vWordByAll', [DashboardController::class, 'vWordByAll'])->name('Dashboard.vWordByAll');
Route::get('/dashboard_BitCellByAll', [DashboardController::class, 'BitCellByAll'])->name('Dashboard.BitCellsByAll');

Route::get('/set', [SetPageController::class, 'Index'])->name('set.WebIndex');
Route::get('/LineAPI', [SetPageController::class, 'LineAPI'])->name('set.WebIndex.LineAPI');
Route::get('/EmailAPI', [SetPageController::class, 'EmailAPI'])->name('set.WebIndex.EmailAPI');
Route::get('/SMSAPI', [SetPageController::class, 'SMSAPI'])->name('set.WebIndex.SMSAPI');

Route::get('/mb/set', [SetPageController::class, 'mb_Index'])->name('set.MbIndex');



Route::get('/Component', [ComponentController::class, 'Index'])->name('Component.WebIndex');
Route::get('/mb/Component', [ComponentController::class, 'mb_Index'])->name('Component.MbIndex');
Route::get('/ComponentApi', [ComponentController::class, 'Api'])->name('Component.Api');

Route::get('/charSet', [ChartController::class, 'Index'])->name('charSet.WebIndex');
Route::get('/mb/charSet', [ChartController::class, 'mb_Index'])->name('charSet.MbIndex');
Route::get('/CharSetApi', [ChartController::class, 'Api'])->name('charSet.Api');
