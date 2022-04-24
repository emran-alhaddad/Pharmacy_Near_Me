<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\interfacesController;


/*
|--------------------------------------------------------------------------
| front Routes
|--------------------------------------------------------------------------
|
| Here is where you can register front routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "front" middleware group. Now create something great!
|
*/

Route::get('/front', function () {
    return view('front.index');
});


Route::namespace('Front')->group(function () {

    // Front Pages ROUTES
    Route::get('/index', [interfacesController::class, 'index'])->name('index');

    Route::get('/pharmacies', [interfacesController::class, 'pharmacy'])->name('pharmacies');
    Route::get('/ads', [interfacesController::class, 'ads'])->name('ads');
    Route::get('/about', [interfacesController::class, 'about'])->name('about');

    Route::get('/login', [interfacesController::class, 'login'])->name('login');
    Route::get('/signup', [interfacesController::class, 'login'])->name('signup');

    Route::get('/contact', [interfacesController::class, 'contact'])->name('contact');
});
