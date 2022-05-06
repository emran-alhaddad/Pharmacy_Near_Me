<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\Social\FacebookController;
use App\Http\Controllers\Auth\Social\GoogleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Front\interfacesController;
use App\Http\Controllers\Pharmacy\ChatController;
use App\Http\Controllers\Pharmacy\PharmacyController;
use App\Http\Controllers\Pharmacy\ReplyController;
use App\Http\Controllers\User\UserSearchController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Request;
use App\Http\Controllers\User\request\RequestController;
use App\Http\Controllers\Admin\AdvertiseController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\Complaint\ComplaintController;

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

// Front Routes
Route::get('/', [interfacesController::class, 'index'])->name('index');
Route::get('/home', [interfacesController::class, 'index'])->name('index');
Route::get('/pharmacies', [interfacesController::class, 'pharmacy'])->name('pharmacies');
Route::get('/ads', [interfacesController::class, 'ads'])->name('ads');
Route::get('/about', [interfacesController::class, 'about'])->name('about');
Route::get('/contact', [interfacesController::class, 'contact'])->name('contact');
Route::get('/confirm', [interfacesController::class, 'confirm'])->name('confirm');

//Route::get('get_all_complaint',[ComplaintController::class, 'getAllComplaint'])->name('get_all_complaint');
Route::get('index_complaint',[ComplaintController::class, 'index'])->name('index_complaint');
Route::post('add_complaint',[ComplaintController::class, 'AddComplaint'])->name('add_complaint');


// route For test
// Route::get('/userProfile', [interfacesController::class, 'userProfile'])->name('userProfile');


// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create'])->name('register');

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin'])->name('login');

// Forget Password
Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class, 'create'])->middleware('guest')->name('forget-password');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->name('reset-password');

// Search For Pharmacy
Route::post('/pharmacies/search', [UserSearchController::class, 'searchPharmacies'])->name('search-pharmacies');

// Facebook Auth
Route::get('auth/facebook', [FacebookController::class, 'redirect'])->name('facebook-client');
Route::get('auth/facebook/pharmacy', [FacebookController::class, 'redirectPharmacy'])->name('facebook-pharmacy');
Route::get('auth/facebook/callback', [FacebookController::class, 'callback']);

// Google Auth
Route::get('auth/google', [GoogleController::class, 'redirect'])->name('google-client');
Route::get('auth/google/pharmacy', [GoogleController::class, 'redirectPharmacy'])->name('google-pharmacy');
Route::get('auth/google/callback', [GoogleController::class, 'callback']);

// Email Verification
Route::get('auth/verify_email/{token}', [VerifyEmailController::class, 'verify']);


// Routes That Needs Authentication
Route::group(['middleware' => 'auth'], function () {
    
    // Client 
    Route::group(['middleware' => ['role:client']], function () {
        Route::get('/client/',[ClientController::class,'index'])->name('client-dashboard');
        // Route::get('get_complaint',[ComplaintController::class, 'getComplaint'])->name('get_complaint');
        // Client Request
        Route::get('/client/rquests', [RequestController::class, 'index'])->name('client-requests');
        Route::get('/client/rquest/add', [RequestController::class, 'add'])->name('client-request-add');
        Route::post('/client/rquest/add', [RequestController::class, 'create']);
        Route::get('profi', [ClientController::class, 'index'])->name('profi');
    });

    // Pharmacy Routes
    Route::group(['middleware' => ['role:pharmacy']], function () {

        // Pharmacy Dashboard
        Route::get('/pharmacy', [PharmacyController::class, 'index'])->name('pharmacy-dashboard');

        // Pharmacy Chat
        Route::get('/pharmacy/chat', [ChatController::class, 'index'])->name('pharmacy-chat');

        // Pharmacy Requests
        Route::get('/pharmacy/requests', [ReplyController::class, 'index'])->name('pharmacy-requests');
        Route::get('/pharmacy/request/{id}', [ReplyController::class, 'showRequest']);
        Route::post('/pharmacy/request/{id}', [ReplyController::class, 'acceptRequest']);

        // Pharmacy Replies
        Route::get('/pharmacy/replies/{id}', [ReplyController::class, 'showReplies'])->name('pharmacy-replies');
        Route::post('/pharmacy/reply', [ReplyController::class, 'create'])->name('pharmacy-reply');
    });

    // Admin Routes
    Route::group(['middleware' => ['role:admin']], function () {

        // Admin Dashboard
        Route::get('_admin/', [AdminController::class,'index'])->name('admin-dashboard');

        Route::get('/_admin/pharmacies', [AdminController::class, 'showPharmacies'])->name('admin-pharmacies');
        Route::get('/_admin/users', [AdminController::class, 'showUsers'])->name('admin-users');
        Route::get('/_admin/complaints', [AdminController::class, 'showCompliants'])->name('admin-compliants');
        Route::get('/_admin/notifications', [AdminController::class, 'showNotifications'])->name('admin-notifications');
        Route::get('/_admin/cities', [AdminController::class, 'showCities'])->name('admin-cities');
        Route::get('/_admin/zones', [AdminController::class, 'showZones'])->name('admin-zones');

        Route::get('/_admin/adds', [AdvertiseController::class, 'index'])->name('admin-adds');
        Route::get('/_admin/adds/delete/{id}', [AdvertiseController::class, 'delete'])->name('admin-adds-delete');
        Route::get('/_admin/adds/get', [AdvertiseController::class, 'get'])->name('admin-adds-get');
        Route::get('/_admin/adds/update/{id}', [AdvertiseController::class, 'indexUpdate'])->name('admin-adds-update');
        Route::post('/_admin/adds/update/{id}', [AdvertiseController::class, 'doUpdate'])->name('admin-adds-doUpdate');
        
    });

    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
    });
    Route::get('/query',function(){
        $req=Request::with(['details','replies.detailsReplay','pharmacy.user'])->where('requests.client_id',22)->get();
        return $req;
    });
    
    Route::get('/_admin/adds/create', [AdvertiseController::class, 'add'])->name('admin-adds-create');
    Route::post('/_admin/adds/create', [AdvertiseController::class, 'create'])->name('admin-adds-create');
    Route::get('/pharmacy/{id}', [ClientController::class, 'selectPharamcy'])->name('user-select-pharmacy');
    Route::get('/request', [ClientController::class, 'RequestInWaitAccespt'])->name('request');
    Route::get('/request2', [ClientController::class, 'request2'])->name('request2');
    Route::get('/requestIndex', [ClientController::class, 'requestIndex'])->name('requestIndex');
    Route::post('/updateEmail', [ClientController::class, 'updateEmail'])->name('updateEmail');
    Route::post('/CheckEmail', [ClientController::class, 'checkUpdateEmail'])->name('CheckEmail');
    Route::get('update',function(){
        return view('welcome');
    });
    Route::get('checked',function(){
        return view('welcomecheck');
    });
  //  Route::get('get_complaint',[ComplaintController::class, 'getComplaint'])->name('get_complaint');
    Route::get('get_complaint',[ComplaintController::class, 'getComplaint'])->name('get_complaint');