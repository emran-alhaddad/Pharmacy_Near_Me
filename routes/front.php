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
    Route::get('/contact', [interfacesController::class, 'contact'])->name('contact');
});
