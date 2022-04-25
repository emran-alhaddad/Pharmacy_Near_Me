<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\Social\FacebookController;
use App\Http\Controllers\Auth\Social\GoogleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\User\UserSearchController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/',function(){
    return view('front.index');
});

// Register
Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'create']);

// Login
Route::get('/login',[LoginController::class,'login'])->name('login');
Route::post('/login',[LoginController::class,'doLogin']);

// Forget Password
Route::get('/forgot-password', [ForgetPasswordController::class,'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class,'create'])->middleware('guest');

// Reset Password
Route::get('/reset-password/{token}',[ResetPasswordController::class,'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class,'store'])->middleware('guest')->name('reset-password');

// Routes That Needs Authentication
Route::group(['middleware'=>'auth'],function(){

    Route::group([ 'middleware' => ['role:client']], function() {
    Route::get('/client/profile', function(){
        return "Client Profile Page";
    })->name('client-profile');
});

Route::group([ 'middleware' => ['role:pharmacy']], function() {
      Route::get('/pharmacy/profile', function(){
            return "pharmacy Profile Page";
    })->name('pharmacy-profile');
    });
    
    Route::group([ 'middleware' => ['role:admin']], function() {    
    Route::get('/admin/profile', function(){
        return "Admin Profile Page";
    })->name('admin-profile');
});
    // Logout
    Route::get('/logout',[LogoutController::class,'logout'])->name('logout');
});

Route::post('/pharmacies',[UserSearchController::class,'searchPharmacies'])->name('pharmacies');


Route::get('auth/facebook', [FacebookController::class,'redirect']);
Route::get('auth/facebook/pharmacy', [FacebookController::class,'redirectPharmacy']);
Route::get('auth/facebook/callback', [FacebookController::class,'callback']);

Route::get('auth/google', [GoogleController::class,'redirect']);
Route::get('auth/google/pharmacy', [GoogleController::class,'redirectPharmacy']);
Route::get('auth/google/callback', [GoogleController::class,'callback']);

Route::get('auth/verify_email/{token}', [VerifyEmailController::class,'verify']);

