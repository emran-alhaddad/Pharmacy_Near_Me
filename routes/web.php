<?php

use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\Register\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\login\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\Social\FacebookController;
use App\Http\Controllers\Auth\Social\GoogleController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\ResendEmailController;

use App\Http\Controllers\Pharmacy;
use App\Http\Controllers\Front;
use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
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
Route::get('/', [Front\interfacesController::class, 'index'])->name('index');
Route::get('/home', [Front\interfacesController::class, 'index'])->name('index');
Route::get('/pharmacies', [Front\interfacesController::class, 'pharmacy'])->name('pharmacies');
Route::get('/ads', [Front\interfacesController::class, 'ads'])->name('ads');
Route::get('/about', [Front\interfacesController::class, 'about'])->name('about');
Route::get('/contact', [Front\interfacesController::class, 'contact'])->name('contact');
Route::get('/404', [Front\interfacesController::class, 'notFound'])->name('404');
Route::get('/pharmacy/{id}', [Front\interfacesController::class, 'detailes'])->name('detailes');
// Search For Pharmacy
Route::post('/pharmacies/search', [Front\interfacesController::class, 'searchPharmacies'])->name('search-pharmacies');
Route::get('/add_order', [Front\interfacesController::class, 'add_order'])->name('add_order');



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
        Route::get('/client/',[User\ClientController::class,'index'])->name('client');
        Route::get('/edit_profile/',[User\ClientController::class,'edit_profile'])->name('edit_profile');

        Route::get('/chat/',[User\ClientController::class,'chat'])->name('chat');
        Route::get('/problems/',[User\ClientController::class,'problems'])->name('problems');
        Route::get('/myorder/',[User\ClientController::class,'myorder'])->name('myorder');
        Route::get('/settings/',[User\ClientController::class,'settings'])->name('settings');
        Route::get('/client/edit',[User\ClientController::class,'edit'])->name('client-dashboard-edit');
        Route::put('/client/update',[User\ClientController::class,'update'])->name('client-dashboard-update');
        Route::put('/client/password/update',[User\ClientController::class,'updatePassword'])->name('client-password-update');
        Route::post('/client/email/sendCode',[User\ClientController::class,'sendEmailCode'])->name('client-email-code');
        Route::put('/client/email/update',[User\ClientController::class,'updateEmail'])->name('client-email-update');
        Route::put('/client/avater/update',[SystemUtils::class,'updateAvatar'])->name('client-avater-update');

        // Client Orders
        Route::get('/client/orders',[User\OrderController::class,'index'])->name('client-orders');
        Route::get('/client/orders/create', [User\OrderController::class, 'create'])->name('client-orders-create');
        Route::post('/client/orders/store', [User\OrderController::class, 'store'])->name('client-orders-store');
        Route::get('/client/order/{id}/reject', [User\OrderController::class, 'reject'])->name('client-orders-reject');

        // Client Compliants
        Route::get('/client/compliants',[User\ComplaintController::class,'index'])->name('client-compliants');
        Route::get('/client/compliants/create', [User\ComplaintController::class, 'create'])->name('client-compliants-create');
        Route::post('/client/compliants/store', [User\ComplaintController::class, 'store'])->name('client-compliants-store');
        Route::get('/client/compliant/{id}/delete', [User\ComplaintController::class, 'delete'])->name('client-compliants-delete');

    });

    // Pharmacy Routes
    Route::group(['middleware' => ['role:pharmacy']], function () {
        
        // Pharmacy Dashboard
        Route::get('/_pharmacy/', [Pharmacy\PharmacyController::class, 'index'])->name('pharmacy-dashboard');

        // Pharmacy Chat
        Route::get('/_pharmacy/chat', [Pharmacy\ChatController::class, 'index'])->name('pharmacy-chat');

         // Pharmacy Notifications
         Route::get('/_pharmacy/notifications', [Pharmacy\NotificationController::class, 'index'])->name('pharmacy-notifications');

         // Pharmacy Compliants
         Route::get('/_pharmacy/compliants', [Pharmacy\CompliantController::class, 'index'])->name('pharmacy-compliants');
         
         // Pharmacy Messages
         Route::get('/_pharmacy/messages', [Pharmacy\MessageController::class, 'index'])->name('pharmacy-messages');
         
         // Pharmacy Orders
         Route::get('/_pharmacy/orders', [Pharmacy\OrderController::class, 'index'])->name('pharmacy-orders');
         
         // Pharmacy Settings
         Route::get('/_pharmacy/settings', [Pharmacy\SettingsController::class, 'index'])->name('pharmacy-settings');
         


        // Pharmacy Requests
        Route::get('/_pharmacy/requests', [Pharmacy\ReplyController::class, 'index'])->name('pharmacy-requests');
        Route::get('/_pharmacy/request/{id}', [Pharmacy\ReplyController::class, 'showRequest']);
        Route::post('/_pharmacy/request/{id}', [Pharmacy\ReplyController::class, 'acceptRequest']);

        // Pharmacy Replies
        Route::get('/_pharmacy/replies/{id}', [Pharmacy\ReplyController::class, 'showReplies'])->name('pharmacy-replies');
        Route::post('/_pharmacy/reply', [Pharmacy\ReplyController::class, 'create'])->name('pharmacy-reply');
    });

    // Admin Routes
    Route::group(['middleware' => ['role:admin']], function () {

        // Admin Dashboard
        Route::get('/_admin/', [Admin\AdminController::class,'index'])->name('admin-dashboard');

        Route::get('/_admin/profile', [Admin\AdminController::class, 'showProfile'])->name('admin-profile');
        Route::get('/_admin/edit_profile', [Admin\AdminController::class, 'editProfile'])->name('admin-edit_profile');
        Route::get('/_admin/zones', [Admin\AdminController::class, 'showZones'])->name('admin-zones');


        Route::get('/_admin/show_ads', [Admin\AdsController::class, 'showAds'])->name('admin-show_ads');
        Route::get('/_admin/add_ads', [Admin\AdsController::class, 'addAds'])->name('admin-add_ads');
        Route::get('/_admin/edit_ads', [Admin\AdsController::class, 'editAds'])->name('admin-edit_ads');


        Route::get('/_admin/show_Complaints', [Admin\ComplaintsController::class, 'showComplaints'])->name('admin-show_Complaints');
        Route::get('/_admin/add_Complaints', [Admin\ComplaintsController::class, 'addComplaints'])->name('admin-add_Complaints');
        Route::get('/_admin/edit_Complaints', [Admin\ComplaintsController::class, 'editComplaints'])->name('admin-edit_Complaints');


        Route::get('/_admin/show_Zones', [Admin\ZonesController::class, 'showZones'])->name('admin-show_Zones');
        Route::get('/_admin/add_Zones', [Admin\ZonesController::class, 'addZones'])->name('admin-add_Zones');
        Route::get('/_admin/edit_Zones', [Admin\ZonesController::class, 'editZones'])->name('admin-edit_Zones');


        Route::get('/_admin/show_Cities', [Admin\CitiesController::class, 'showCities'])->name('admin-show_Cities');
        Route::get('/_admin/add_Cities', [Admin\CitiesController::class, 'addCities'])->name('admin-add_Cities');
        Route::get('/_admin/edit_Cities', [Admin\CitiesController::class, 'editCities'])->name('admin-edit_Cities');


        Route::get('/_admin/show_Customers', [Admin\CustomerController::class, 'showCustomers'])->name('admin-show_Customer');
        Route::get('/_admin/add_Customers', [Admin\CustomerController::class, 'addCustomers'])->name('admin-add_Customers');
        Route::get('/_admin/edit_Customers', [Admin\CustomerController::class, 'editCustomers'])->name('admin-edit_Customers');

        Route::get('/_admin/show_Phars', [Admin\PharController::class, 'showPhars'])->name('admin-show_Phars');
        Route::get('/_admin/add_Phars', [Admin\PharController::class, 'addPhars'])->name('admin-add_Phars');
        Route::get('/_admin/edit_Phars', [Admin\PharController::class, 'editPhars'])->name('admin-edit_Phars');


        Route::get('/_admin/show_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'showPaymentMethods'])->name('admin-show_PaymentMethods');
        Route::get('/_admin/add_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'addPaymentMethods'])->name('admin-add_PaymentMethods');
        Route::get('/_admin/edit_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'editPaymentMethods'])->name('admin-edit_PaymentMethods');


        Route::get('/_admin/show_Accounts', [Admin\AccountsController::class, 'showAccounts'])->name('admin-show_[Accounts');
        Route::get('/_admin/add_Accounts', [Admin\AccountsController::class, 'addAccounts'])->name('admin-add_[Accounts');
        Route::get('/_admin/edit_Accounts', [Admin\AccountsController::class, 'editAccounts'])->name('admin-edit_[Accounts');


        Route::get('/_admin/show_Requests', [Admin\RequestsController::class, 'showRequests'])->name('admin-show_Requests');
        Route::get('/_admin/add_Requests', [Admin\RequestsController::class, 'addRequests'])->name('admin-add_Requests');
        Route::get('/_admin/edit_Requests', [Admin\RequestsController::class, 'editRequests'])->name('admin-edit_Requests');
        Route::get('/_admin/show_RequestDetails', [Admin\RequestsController::class, 'showRequestDetails'])->name('admin-show_RequestDetails');


        Route::get('/_admin/show_Notifications', [Admin\NotificationsController::class, 'showNotifications'])->name('admin-show_[Notifications');
        Route::get('/_admin/add_Notifications', [Admin\NotificationsController::class, 'addNotifications'])->name('admin-add_[Notifications');
        Route::get('/_admin/edit_Notifications', [Admin\NotificationsController::class, 'editNotifications'])->name('admin-edit_[Notificati0ns');

        Route::get('/_admin/show_Permissions', [Admin\PermissionsController::class, 'showPermissions'])->name('admin-show_[Permissions');

        // Route::get('/_admin/adds', [AdvertiseController::class, 'index'])->name('admin-adds');
        // Route::get('/_admin/adds/add', [AdvertiseController::class, 'add'])->name('admin-adds-create');
        // Route::get('/_admin/adds/edit', [AdvertiseController::class, 'edit'])->name('admin-adds-edit');
        // Route::post('/_admin/adds/create', [AdvertiseController::class, 'create']);
    });

    // Logout
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');


});

