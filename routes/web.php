<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\SocialController;
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

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'create']);


Route::get('/forgot-password', [ForgetPasswordController::class,'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class,'create'])->middleware('guest');

Route::get('/reset-password/{token}',[ResetPasswordController::class,'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class,'store'])->middleware('guest')->name('reset-password');

Route::post('/register',[RegisterController::class,'register']);
Route::group(['middleware'=>'auth'],function(){
    

});
Route::get('/logins',[LoginController::class,'login'])->name('logins'); 
Route::post('/logins',[LoginController::class,'doLogin'])->name('logins');


Route::get('/auth/redirect', function () {
    return Socialite::driver('facebook')->redirect();
});
 
Route::get('auth/facebook', [SocialController::class, 'facebookRedirect']);
Route::get('auth/facebook/callback', [SocialController::class, 'loginWithFacebook']);

