<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

Route::group(['middleware' => 'checklogin'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
});

//pag principal
Route::get('/', function () {
    return view('home');
})->middleware('guest'); 



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
