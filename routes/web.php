<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\login\LoginController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::post('/register',[RegisterController::class,'register']);
Route::group(['middleware'=>'auth'],function(){
    

});
Route::get('/logins',[LoginController::class,'login'])->name('logins'); 
Route::post('/logins',[LoginController::class,'doLogin'])->name('logins');
