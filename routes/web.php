<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

//API上傳
Route::get('GetAll', [DashboardController::class, 'GetAll'])->name('GetAll');
Route::get('GetByAddress', [DashboardController::class, 'GetByAddress'])->name('GetByAddress');
Route::post('in_A', [DashboardController::class, 'in_A'])->name('in_A');
Route::put('upd_B', [DashboardController::class, 'upd_B'])->name('upd_B');
Route::delete('del_C', [DashboardController::class, 'del_C'])->name('del_C');
//Js
Route::get('js', [DashboardController::class, 'js'])->name('js');


Route::get('/', function () {
    return view('welcome');
});
Route::get('/csrf', function () {
    return csrf_token();
});
Route::get('/T1', function () {
    return view('T1');
});
// level_0
//Route::get('/level_0', function () {
//    $x = 17;
//    $y = 8;
//    echo($x + $y).'<br>'; # 25
//    echo($x - $y).'<br>'; # 9
//    echo($x * $y).'<br>'; # 136
//    echo($x / $y).'<br>'; # 2.125
//    echo($x % $y).'<br>'; # 1
//});
