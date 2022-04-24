<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Front\interfacesController;

// auth for wafaa
use App\Http\Controllers\Front\authController;

// admin for haneen
use App\Http\Controllers\Front\adminController;

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

//  Front Route
Route::namespace('Front')->group(function () {

    // Front Pages ROUTES
    Route::get('/index', [interfacesController::class, 'index'])->name('index');
    Route::get('/pharmacies', [interfacesController::class, 'pharmacy'])->name('pharmacies');
    Route::get('/ads', [interfacesController::class, 'ads'])->name('ads');
    Route::get('/about', [interfacesController::class, 'about'])->name('about');
    Route::get('/contact', [interfacesController::class, 'contact'])->name('contact');
});

// Views Auth
// Route::namespace('Auth')->group(function () {
//     Route::get('/login', [authController::class, 'login'])->name('adminLogin');
//     Route::get('/signup', [authController::class, 'login'])->name('signup');
// });

// Views Admin haneen Write Her

Route::namespace('Front')->group(function () {

    Route::get('/admin_dashboard', [adminController::class, 'Show_index'])->name('Show_index');
});
