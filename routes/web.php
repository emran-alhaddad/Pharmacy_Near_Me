<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\Auth\Social\GoogleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\User\UserSearchController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use  App\Http\Controllers\Auth\Login\FacebookController;
use  App\Http\Controllers\Auth\Login\GoogleController;

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
    return view('welcome');
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

    Route::get('/client/profile', function(){
        return "Client Profile Page";
    })->name('client-profile');

    Route::get('/pharmacy/profile', function(){
        return "Pharmacy Profile Page";
    })->name('pharmacy-profile');

    Route::get('/admin/profile', function(){
        return "Admin Profile Page";
    })->name('admin-profile');
    // Logout
    Route::get('/logout',[LoginController::class,'LogoutController'])->name('logout');
});

Route::post('/pharmacies',[UserSearchController::class,'searchPharmacies'])->name('pharmacies');

Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

Route::get('auth/google', [GoogleController::class,'redirect']);
Route::get('auth/google/pharmacy', [GoogleController::class,'redirectPharmacy']);
Route::get('auth/google/callback', [GoogleController::class,'callback']);

Route::get('auth/verify_email/{token}', [VerifyEmailController::class,'verify']);

