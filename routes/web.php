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

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdsController;
use App\Http\Controllers\Admin\ZonesController;
use App\Http\Controllers\Admin\ComplaintsController;
use App\Http\Controllers\Admin\CitiesController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\PharController;
use App\Http\Controllers\Admin\PaymentMethodsCotroller;
use App\Http\Controllers\Admin\AccountsController;
use App\Http\Controllers\Admin\NotificationsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\Admin\RequestsController;
use App\Http\Controllers\Auth\ResendEmailController;
use App\Http\Controllers\Pharmacy\ChatController;
use App\Http\Controllers\Pharmacy\PharmacyController;
use App\Http\Controllers\Pharmacy\ReplyController;
use App\Http\Controllers\User\ClientController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\RequestController;
use App\Models\Client;
use App\Models\Pharmacy;
use App\Models\Request;
use App\Models\User;
use App\Utils\SystemUtils;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

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
Route::get('/404', [interfacesController::class, 'notFound'])->name('404');
Route::get('/pharmacy/{id}', [interfacesController::class, 'detailes'])->name('detailes');
// Search For Pharmacy
Route::post('/pharmacies/search', [interfacesController::class, 'searchPharmacies'])->name('search-pharmacies');


// PHARMACY TEST ROUTES
Route::get('/account', [PharmacyController::class, 'account'])->name('profile');
Route::get('/settings', [PharmacyController::class, 'settings'])->name('editProfile');
Route::get('/detail', [PharmacyController::class, 'detailes'])->name('orderData');
Route::get('/order', [PharmacyController::class, 'order'])->name('order');






// Register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'create']);

// Login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'doLogin']);

// Forget Password
Route::get('/forgot-password', [ForgetPasswordController::class, 'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [ForgetPasswordController::class, 'create'])->middleware('guest')->name('forget-password');

// Reset Password
Route::get('/reset-password/{token}', [ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [ResetPasswordController::class, 'store'])->middleware('guest')->name('reset-password');

// Resend Email Activation
Route::get('/resend-email-activation', [ResendEmailController::class, 'index'])->middleware('guest')->name('resend-email-activation');
Route::post('/resend-email-activation', [ResendEmailController::class, 'send'])->middleware('guest')->name('resend-email-activation');


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

    // Client Routes
    Route::group(['middleware' => ['role:client']], function () {
        Route::get('/client/', [ClientController::class, 'index'])->name('client-dashboard');
        Route::get('/client/edit', [ClientController::class, 'edit'])->name('client-dashboard-edit');
        Route::put('/client/update', [ClientController::class, 'update'])->name('client-dashboard-update');
        Route::put('/client/password/update', [ClientController::class, 'updatePassword'])->name('client-password-update');
        Route::post('/client/email/sendCode', [ClientController::class, 'sendEmailCode'])->name('client-email-code');
        Route::put('/client/email/update', [ClientController::class, 'updateEmail'])->name('client-email-update');
        Route::put('/client/avater/update', [SystemUtils::class, 'updateAvatar'])->name('client-avater-update');

        // Client Orders
        Route::get('/client/orders', [OrderController::class, 'index'])->name('client-orders');
        Route::get('/client/orders/create', [OrderController::class, 'create'])->name('client-orders-create');
        Route::post('/client/orders/store', [OrderController::class, 'store'])->name('client-orders-store');
        Route::get('/client/order/{id}/reject', [OrderController::class, 'reject'])->name('client-orders-reject');
    });

    // Pharmacy Routes
    Route::group(['middleware' => ['role:pharmacy']], function () {

        // Pharmacy Dashboard
        Route::get('/pharmacy/', [PharmacyController::class, 'index'])->name('pharmacy-dashboard');

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
        Route::get('/_admin/', [AdminController::class, 'index'])->name('admin-dashboard');

        Route::get('/_admin/', [AdminController::class, 'index'])->name('admin-dashboard');


        Route::get('/_admin/profile', [AdminController::class, 'showProfile'])->name('admin-profile');
        Route::get('/_admin/edit_profile', [AdminController::class, 'editProfile'])->name('admin-edit_profile');
        Route::get('/_admin/zones', [AdminController::class, 'showZones'])->name('admin-zones');


        Route::get('/_admin/show_ads', [AdsController::class, 'showAds'])->name('admin-show_ads');
        Route::get('/_admin/add_ads', [AdsController::class, 'addAds'])->name('admin-add_ads');
        Route::get('/_admin/edit_ads', [AdsController::class, 'editAds'])->name('admin-edit_ads');


        Route::get('/_admin/show_Complaints', [ComplaintsController::class, 'showComplaints'])->name('admin-show_Complaints');
        Route::get('/_admin/add_Complaints', [ComplaintsController::class, 'addComplaints'])->name('admin-add_Complaints');
        Route::get('/_admin/edit_Complaints', [ComplaintsController::class, 'editComplaints'])->name('admin-edit_Complaints');


        Route::get('/_admin/show_Zones', [ZonesController::class, 'showZones'])->name('admin-show_Zones');
        Route::get('/_admin/add_Zones', [ZonesController::class, 'addZones'])->name('admin-add_Zones');
        Route::get('/_admin/edit_Zones', [ZonesController::class, 'editZones'])->name('admin-edit_Zones');


        Route::get('/_admin/show_Cities', [CitiesController::class, 'showCities'])->name('admin-show_Cities');
        Route::get('/_admin/add_Cities', [CitiesController::class, 'addCities'])->name('admin-add_Cities');
        Route::get('/_admin/edit_Cities', [CitiesController::class, 'editCities'])->name('admin-edit_Cities');


        Route::get('/_admin/show_Customers', [CustomerController::class, 'showCustomers'])->name('admin-show_Customer');
        Route::get('/_admin/add_Customers', [CustomerController::class, 'addCustomers'])->name('admin-add_Customers');
        Route::get('/_admin/edit_Customers', [CustomerController::class, 'editCustomers'])->name('admin-edit_Customers');

        Route::get('/_admin/show_Phars', [PharController::class, 'showPhars'])->name('admin-show_Phars');
        Route::get('/_admin/add_Phars', [PharController::class, 'addPhars'])->name('admin-add_Phars');
        Route::get('/_admin/edit_Phars', [PharController::class, 'editPhars'])->name('admin-edit_Phars');


        Route::get('/_admin/show_PaymentMethods', [PaymentMethodsCotroller::class, 'showPaymentMethods'])->name('admin-show_PaymentMethods');
        Route::get('/_admin/add_PaymentMethods', [PaymentMethodsCotroller::class, 'addPaymentMethods'])->name('admin-add_PaymentMethods');
        Route::get('/_admin/edit_PaymentMethods', [PaymentMethodsCotroller::class, 'editPaymentMethods'])->name('admin-edit_PaymentMethods');


        Route::get('/_admin/show_Accounts', [AccountsController::class, 'showAccounts'])->name('admin-show_[Accounts');
        Route::get('/_admin/add_Accounts', [AccountsController::class, 'addAccounts'])->name('admin-add_[Accounts');
        Route::get('/_admin/edit_Accounts', [AccountsController::class, 'editAccounts'])->name('admin-edit_[Accounts');


        Route::get('/_admin/show_Requests', [RequestsController::class, 'showRequests'])->name('admin-show_Requests');
        Route::get('/_admin/add_Requests', [RequestsController::class, 'addRequests'])->name('admin-add_Requests');
        Route::get('/_admin/edit_Requests', [RequestsController::class, 'editRequests'])->name('admin-edit_Requests');
        Route::get('/_admin/show_RequestDetails', [RequestsController::class, 'showRequestDetails'])->name('admin-show_RequestDetails');


        Route::get('/_admin/show_Notifications', [NotificationsController::class, 'showNotifications'])->name('admin-show_[Notifications');
        Route::get('/_admin/add_Notifications', [NotificationsController::class, 'addNotifications'])->name('admin-add_[Notifications');
        Route::get('/_admin/edit_Notifications', [NotificationsController::class, 'editNotifications'])->name('admin-edit_[Notificati0ns');

        Route::get('/_admin/show_Permissions', [PermissionsController::class, 'showPermissions'])->name('admin-show_[Permissions');

        // Route::get('/_admin/adds', [AdvertiseController::class, 'index'])->name('admin-adds');
        // Route::get('/_admin/adds/add', [AdvertiseController::class, 'add'])->name('admin-adds-create');
        // Route::get('/_admin/adds/edit', [AdvertiseController::class, 'edit'])->name('admin-adds-edit');
        // Route::post('/_admin/adds/create', [AdvertiseController::class, 'create']);
    });

    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});
