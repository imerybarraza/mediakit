<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\InstagramController;
use App\Http\Controllers\Auth\FacebookAuthController;

//Incio sesion facebook
Route::post('auth/facebook', [FacebookAuthController::class, 'handleFacebookLogin']);

//Visualizacion basica de instagram
Route::get('/instagram/login', [InstagramController::class, 'redirectToInstagramProvider']);
Route::get('/instagram/callback', [InstagramController::class, 'handleProviderCallback']);

Route::group(['middleware' => 'checklogin'], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
});

//pag principal
Route::get('/', function () {
    return view('home');
})->middleware('guest'); 



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
