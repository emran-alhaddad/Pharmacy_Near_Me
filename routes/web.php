<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pharmacy;
use App\Http\Controllers\Front;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Social;
use App\Http\Controllers\Auth as CustomAuth;
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
Route::get('/pharmacy/{id}/add-order', [Front\interfacesController::class, 'add_order'])->name('add-order');


// // PHARMACY TEST ROUTES
Route::get('/account', [Pharmacy\PharmacyController::class, 'account'])->name('profile');
Route::get('/settings', [Pharmacy\PharmacyController::class, 'settings'])->name('settings');
Route::get('/detail', [Pharmacy\PharmacyController::class, 'detailes'])->name('orderData');
Route::get('/order', [Pharmacy\PharmacyController::class, 'order'])->name('order');






// Register
Route::get('/register', [Register\RegisterController::class, 'index'])->name('register');
Route::post('/register', [Register\RegisterController::class, 'create']);

// Login
Route::get('/login', [Login\LoginController::class, 'login'])->name('login');
Route::post('/login', [Login\LoginController::class, 'doLogin']);

// Forget Password
Route::get('/forgot-password', [CustomAuth\ForgetPasswordController::class, 'index'])->middleware('guest')->name('forget-password');
Route::post('/forgot-password', [CustomAuth\ForgetPasswordController::class, 'create'])->middleware('guest')->name('forget-password');

// Reset Password
Route::get('/reset-password/{token}', [CustomAuth\ResetPasswordController::class, 'show'])->middleware('guest')->name('reset-password');
Route::post('/reset-password', [CustomAuth\ResetPasswordController::class, 'store'])->middleware('guest')->name('reset-password');

// Resend Email Activation
Route::get('/resend-email-activation', [CustomAuth\ResendEmailController::class, 'index'])->middleware('guest')->name('resend-email-activation');
Route::post('/resend-email-activation', [CustomAuth\ResendEmailController::class, 'send'])->middleware('guest')->name('resend-email-activation');


// Facebook Auth
Route::get('auth/facebook', [Social\FacebookController::class, 'redirect'])->name('facebook-client');
Route::get('auth/facebook/pharmacy', [Social\FacebookController::class, 'redirectPharmacy'])->name('facebook-pharmacy');
Route::get('auth/facebook/callback', [Social\FacebookController::class, 'callback']);

// Google Auth
Route::get('auth/google', [Social\GoogleController::class, 'redirect'])->name('google-client');
Route::get('auth/google/pharmacy', [Social\GoogleController::class, 'redirectPharmacy'])->name('google-pharmacy');
Route::get('auth/google/callback', [Social\GoogleController::class, 'callback']);

// Email Verification
Route::get('auth/verify_email/{token}', [CustomAuth\VerifyEmailController::class, 'verify']);


// Routes That Needs Authentication
Route::group(['middleware' => 'auth'], function () {

    // Client Routes
    Route::group(['middleware' => ['role:client']], function () {
        Route::get('/client/', [User\ClientController::class, 'index'])->name('client-dashboard');
        Route::get('/chat/', [User\ClientController::class, 'chat'])->name('chat');
        Route::get('/settings/', [User\ClientController::class, 'settings'])->name('settings');
        Route::get('/myorder/', [User\ClientController::class, 'myorder'])->name('myorder');
        Route::get('/edit_profile/', [User\ClientController::class, 'edit_profile'])->name('edit_profile');
        Route::get('/problems/', [User\ClientController::class, 'problems'])->name('problems');
        Route::get('/client/edit', [User\ClientController::class, 'edit'])->name('client-dashboard-edit');
        Route::put('/client/update', [User\ClientController::class, 'update'])->name('client-dashboard-update');
        Route::put('/client/password/update', [User\ClientController::class, 'updatePassword'])->name('client-password-update');
        Route::post('/client/email/sendCode', [User\ClientController::class, 'sendEmailCode'])->name('client-email-code');
        Route::put('/client/email/update', [User\ClientController::class, 'updateEmail'])->name('client-email-update');
        Route::put('/client/avater/update', [User\ClientController::class, 'updateAvater'])->name('client-avater-update');
        
        Route::get('/create',function(){
          return view('welcome');
        });
        Route::get('/_admin-createe/{id}', [PharController::class,'delete'])->name('admin-create');
        Route::post('/_admin/create-zone/', [AdvertiseController::class,'create'])->name('create-zone'); 
        Route::post('/_admin/updatePassword/{id}', [CustomerController::class,'updatePassword'])->name('_admin-updatePassword'); 
        Route::post('/_admin/updateEmail', [CustomerController::class,'updateEmail'])->name('_admin-updateEmail'); 
        Route::post('/_admin/create-customer', [CustomerController::class,'create'])->name('_admin-create-customer'); 
    // Route::group(['middleware' => ['role:admin']], function () {
        // Client Orders
        Route::get('/client/orders', [User\OrderController::class, 'index'])->name('client-orders');
        Route::get('/client/orders/create', [User\OrderController::class, 'create'])->name('client-orders-create');
        Route::post('/client/orders/store', [User\OrderController::class, 'store'])->name('client-orders-store');
        Route::get('/client/order/{id}/reject', [User\OrderController::class, 'reject'])->name('client-orders-reject');

        // Client Compliants
        Route::get('/client/compliants', [User\ComplaintController::class, 'index'])->name('client-compliants');
        Route::get('/client/compliants/create', [User\ComplaintController::class, 'create'])->name('client-compliants-create');
        Route::post('/client/compliants/store', [User\ComplaintController::class, 'store'])->name('client-compliants-store');
        Route::get('/client/compliant/{id}/delete', [User\ComplaintController::class, 'delete'])->name('client-compliants-delete');
    });

    // Pharmacy Routes
    Route::group(['middleware' => ['role:pharmacy']], function () {

        // Pharmacy Dashboard
        Route::get('/_pharmacy/', [Pharmacy\PharmacyController::class, 'index'])->name('pharmacy-dashboard');

        // Pharmacy Chat
        Route::get('/_pharmacy/account', [Pharmacy\PharmacyController::class, 'account'])->name('pharmacy-account');

        // Pharmacy Orders
        Route::get('/_pharmacy/orders', [Pharmacy\PharmacyController::class, 'orders'])->name('pharmacy-orders');

        // Pharmacy Order Details
        Route::get('/_pharmacy/order/{id}', [Pharmacy\PharmacyController::class, 'detailes'])->name('pharmacy-order-details');

        // Pharmacy Settings
        Route::get('/_pharmacy/settings', [Pharmacy\PharmacyController::class, 'settings'])->name('pharmacy-settings');



        // // Pharmacy Requests
        // Route::get('/_pharmacy/requests', [Pharmacy\ReplyController::class, 'index'])->name('pharmacy-requests');
        // Route::get('/_pharmacy/request/{id}', [Pharmacy\ReplyController::class, 'showRequest']);
        // Route::post('/_pharmacy/request/{id}', [Pharmacy\ReplyController::class, 'acceptRequest']);

        // // Pharmacy Replies
        // Route::get('/_pharmacy/replies/{id}', [Pharmacy\ReplyController::class, 'showReplies'])->name('pharmacy-replies');
        // Route::post('/_pharmacy/reply', [Pharmacy\ReplyController::class, 'create'])->name('pharmacy-reply');
    });

    // Admin Routes
    Route::group(['middleware' => ['role:admin']], function () {

        // Admin Dashboard
        Route::get('/_admin/', [Admin\AdminController::class, 'index'])->name('admin-dashboard');

        Route::get('/_admin/', [Admin\AdminController::class, 'index'])->name('admin-dashboard');


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
        Route::get('/_admin/activity/{id}/{stats}', [Admin\PharController::class, 'editPhars'])->name('admin-edit_Phars');


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
    Route::get('/logout', [CustomAuth\LogoutController::class, 'logout'])->name('logout');
});
