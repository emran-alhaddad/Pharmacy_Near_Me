<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\Social\FacebookController;
use App\Http\Controllers\Auth\Social\GoogleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\interfacesController;
use App\Http\Controllers\Pharmacy\ReplyController;
use App\Http\Controllers\User\UserSearchController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\User\request\RequestController;




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



Route::get('/', [interfacesController::class, 'index']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin']);

// Forget Password
Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class, 'create'])->middleware('guest');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->name('reset-password');

// Routes That Needs Authentication
Route::group(['middleware' => 'auth'], function () {

    Route::group(['middleware' => ['role:client']], function () {
        Route::get('/client/profile', function () {
            return "Client Profile Page";
        })->name('client-profile');

        Route::get('/rquest/index', [RequestController::class, 'index'])->name('rquest-index');
        // Route::get('/rquest/add',[RequestController::class,'insert'])->name('rquest-add');

    });

    Route::group(['middleware' => ['role:pharmacy']], function () {
        Route::get('/pharmacy/profile', function () {
            return view("phar.index");
        })->name('pharmacy-profile');

        Route::get('/pharmacy/requests', [ReplyController::class, 'index'])->name('pharmacy-requests');
        Route::get('/pharmacy/request/{id}', [ReplyController::class, 'showRequest']);
        Route::post('/pharmacy/request/{id}', [ReplyController::class, 'acceptRequest']);
        Route::get('/pharmacy/replies/{id}', [ReplyController::class, 'showReplies'])->name('pharmacy-replies');
        Route::post('/pharmacy/reply', [ReplyController::class, 'create'])->name('pharmacy-reply');
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::get('/admin/profile', function () {
            return view('admin.index');
        })->name('admin-profile');
    });
    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});


Route::post('/pharmacies/search', [UserSearchController::class, 'searchPharmacies'])->name('search-pharmacies');


Route::get('auth/facebook', [FacebookController::class, 'redirect'])->name('facebook-client');
Route::get('auth/facebook/pharmacy', [FacebookController::class, 'redirectPharmacy'])->name('facebook-pharmacy');
Route::get('auth/facebook/callback', [FacebookController::class, 'callback']);

Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-client');
Route::get('auth/google/pharmacy', [GoogleController::class, 'redirectPharmacy'])->name('google-pharmacy');
Route::get('auth/google/callback', [GoogleController::class, 'callback']);

Route::get('auth/verify_email/{token}', [VerifyEmailController::class, 'verify']);
Route::post('/rquest-add', [RequestController::class, 'insert'])->name('rquest-add');
