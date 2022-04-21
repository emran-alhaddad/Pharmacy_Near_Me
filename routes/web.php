<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\Social\GoogleController;
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

// Testing  Register With Google Account

Route::get('/', function(){
    return view('welcome');
});

Route::get('/home', function(){
    return "Home Page";
})->name('home');
Route::get('redirect', [GoogleController::class,'redirect']);
Route::get('callback', [GoogleController::class,'callback']);
