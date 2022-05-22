<?php

use App\Http\Controllers\User;
use App\Http\Controllers\Admin;
use App\Http\Controllers\Pharmacy;
use App\Http\Controllers\ChatController;

use App\Http\Controllers\Front;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Social;
use App\Http\Controllers\Auth as CustomAuth;
use App\Http\Controllers\WalletController;
use App\Models\Role;
use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Payment;
use App\Http\Controllers\Notify;



use App\Http\Controllers\Admin\ServicesController;
use App\Http\Controllers\Payment\PaymentController;

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
Route::get('/pharmacy/{id}/license/create', [Front\interfacesController::class, 'createRequestLicense'])->name('create-request-license');
Route::post('/pharmacy/{id}/license/store', [Front\interfacesController::class, 'storeRequestLicense'])->name('store-request-license');
Route::post('/pharmacies/search', [Front\interfacesController::class, 'searchPharmacies'])->name('search-pharmacies');
Route::get('/select/city/{id}/zones', [Front\interfacesController::class, 'getCityZones'])->name('city-zones');

/* backend front  route */
Route::get('/front/showinfor',[Front\HomeController::class,'indexInfo'])->name('front_showinfor'); 








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

// Adds Request 
Route::post('advertisings/add', [Front\interfacesController::class, 'addAdvertisingRequest'])->name('add-advertising-request');
Route::get('advertisings/create/{token}', [Front\interfacesController::class, 'createAdvertisingRequest']);
Route::post('advertisings/store', [Front\interfacesController::class, 'storeAdvertisingRequest'])->name('store-advertising-request');

// Payment Of Adds
Route::get('/user/payment/ads/{id}', [PaymentController::class, 'index2'])->name('user-payment-ads');
Route::post('/user/payment/ads/{id}/pay', [PaymentController::class, 'pay'])->name('user-payment-ads-pay');
Route::get('/user/payment/ads/success/{info}', [PaymentController::class, 'success'])->name('user-payment-ads-success');
Route::get('/user/payment/ads/cancel/{cancel}', [PaymentController::class, 'cancel'])->name('user-payment-ads-cancel');

// This Code will Used By Hadeel after payment process
Route::get('/transfer/{sender}/{reciver}/{amount}', function ($id1, $id2, $amount) {
    $sender = ModelsUser::where('id', $id1)->first();
    // $sender->deposit(200);
    $reciver = ModelsUser::where('id', $id2)->first();
    return WalletController::pay($sender, $reciver, $amount, 0.15);
});

// Routes That Needs Authentication
Route::group(['middleware' => 'auth'], function () {

    Route::get('/pharmacy/{id}/add-order', [Front\interfacesController::class, 'add_order'])->name('add-order');
    Route::get('/user/payment/{id}', [PaymentController::class, 'index'])->name('user-payment');
    Route::post('/user/payment/{id}/pay', [PaymentController::class, 'pay'])->name('user-payment-pay');
    Route::get('/user/payment/success/{info}', [PaymentController::class, 'success'])->name('user-payment-success');
    Route::get('/user/payment/cancel/{cancel}', [PaymentController::class, 'cancel'])->name('user-payment-cancel');


    // Client Routes
    Route::group(['middleware' => ['role:client']], function () {
        Route::get('/client/', [User\ClientController::class, 'index'])->name('client-dashboard');
        Route::get('/chat-user/', [User\ClientController::class, 'chat'])->name('chat-user');
        Route::get('/settings/', [User\ClientController::class, 'settings'])->name('settings');
        Route::get('/myorder/', [User\OrderController::class, 'index'])->name('myorder');

        Route::get('/edit_profile/', [User\ClientController::class, 'edit_profile'])->name('edit_profile');

        Route::get('/client/wallet', [WalletController::class, 'index'])->name('bag-user');

        Route::get('/client/edit', [User\ClientController::class, 'edit'])->name('client-dashboard-edit');
        Route::put('/client/update', [User\ClientController::class, 'update'])->name('client-dashboard-update');
        Route::put('/client/password/update', [User\ClientController::class, 'updatePassword'])->name('client-password-update');
        Route::post('/client/email/sendCode', [User\ClientController::class, 'sendEmailCode'])->name('client-email-code');
        Route::put('/client/email/update', [User\ClientController::class, 'updateEmail'])->name('client-email-update');
        Route::put('/client/avater/update', [User\ClientController::class, 'updateAvater'])->name('client-avater-update');
        // Client Orders
        Route::get('/client/orders', [User\OrderController::class, 'index'])->name('client-orders');
        Route::get('/client/orders/notifacation/{id}/{stateTap}', [User\OrderController::class, 'returnAccepttouser'])->name('client-orders_notifacation');
        
        Route::get('/client/orders/create', [User\OrderController::class, 'create'])->name('client-orders-create');
        Route::post('/client/orders/store', [User\OrderController::class, 'store'])->name('client-orders-store');
        Route::get('/client/order/{id}/reject', [User\OrderController::class, 'reject'])->name('client-orders-reject');
        Route::get('/client/order/{id}/delivered', [User\OrderController::class, 'delivered'])->name('client-orders-delivered');
        Route::get('/client/reply-details/{id}/toggle/{state}', [User\OrderController::class, 'toggleReplyDetails'])->name('client-reply-details-toggle');
    

        // Client Compliants
        Route::get('/problems/', [User\ComplaintController::class, 'index'])->name('problems');

        // Route::get('/client/compliants', [User\ComplaintController::class, 'index'])->name('client-compliants');
        //  Route::get('/client/compliants/create', [User\ComplaintController::class, 'create'])->name('client-compliants-create');
        Route::post('/client/compliants/store', [User\ComplaintController::class, 'store'])->name('client-compliants-store');
        Route::get('/client/compliant/{id}/delete', [User\ComplaintController::class, 'delete'])->name('client-compliants-delete');
    });

    // Pharmacy Routes
    Route::group(['middleware' => ['role:pharmacy']], function () {

        // Pharmacy Dashboard
        Route::get('/_pharmacy/', [Pharmacy\PharmacyController::class, 'index'])->name('pharmacy-dashboard');

        Route::get('/_pharmacy/compliants/', [Pharmacy\PharmacyController::class, 'pharmacyCompliants'])->name('pharmacy-compliants');
        // Pharmacy Chat
        Route::get('/_pharmacy/account', [Pharmacy\PharmacyController::class, 'account'])->name('pharmacy-account');
        Route::get('/_pharmacy/chat', [Pharmacy\PharmacyController::class, 'chat'])->name('pharmacy-chat');
        Route::get('/_pharmacy/wallet', [WalletController::class, 'index'])->name('pharmacy-bag');

        // Pharmacy Orders
        Route::get('/_pharmacy/orders', [Pharmacy\PharmacyController::class, 'orders'])->name('pharmacy-orders');
        // Route::get('/_pharmacy/orders/#wait-payment/{id}', [Pharmacy\PharmacyController::class, 'showOrdersWaitAcceptance'])->name('pharmacy-orders-wait-acceptance');
        Route::get('/_pharmacy/order/{id}', [Pharmacy\PharmacyController::class, 'detailes'])->name('pharmacy-order-details');
        Route::post('/_pharmacy/order/{id}/reply', [Pharmacy\PharmacyController::class, 'reply'])->name('pharmacy-order-reply');
        Route::get('/_pharmacy/order/{id}/reject', [Pharmacy\PharmacyController::class, 'reject'])->name('pharmacy-order-reject');

        // Pharmacy Settings
        Route::get('/_pharmacy/settings', [Pharmacy\PharmacyController::class, 'settings'])->name('pharmacy-settings');

        //pharmacy backend
        Route::get('/pharmacy/edit', [Pharmacy\PharmacyController::class, 'edit'])->name('pharmacy-dashboard-edit');
        Route::put('/pharmacy/update', [Pharmacy\PharmacyController::class, 'update'])->name('pharmacy-dashboard-update');
        Route::put('/pharmacy/password/update', [Pharmacy\PharmacyController::class, 'updatePassword'])->name('pharmacy-password-update');
        Route::post('/pharmacy/email/sendCode', [Pharmacy\PharmacyController::class, 'sendEmailCode'])->name('pharmacy-email-code');
        Route::put('/pharmacy/email/update', [Pharmacy\PharmacyController::class, 'updateEmail'])->name('pharmacy-email-update');
        Route::put('/pharmacy/avater/update', [Pharmacy\PharmacyController::class, 'updateAvater'])->name('pharmacy-avater-update');
        Route::put('/pharmacy/license/update', [Pharmacy\PharmacyController::class, 'updateLicense'])->name('pharmacy-license-update');
    });

    // Admin Routes
    Route::group(['middleware' => ['role:admin']], function () {

        // Admin Dashboard
        Route::get('/_admin/', [Admin\AdminController::class, 'index'])->name('admin-dashboard');
        Route::get('/_admin/wallet', [WalletController::class, 'index'])->name('admin-bag');


        Route::get('/_admin/profile', [Admin\AdminController::class, 'showProfile'])->name('admin-profile');
        Route::get('/_admin/edit_profile', [Admin\AdminController::class, 'editProfile'])->name('admin-edit_profile');
        Route::post('/_admin/update_profile', [Admin\AdminController::class, 'doUpdata'])->name('admin-update_profile');
        Route::get('/_admin/zones', [Admin\AdminController::class, 'showZones'])->name('admin-zones');

        Route::get('/_admin/show_ads', [Admin\AdsController::class, 'index'])->name('admin-show_ads');
        Route::get('/_admin/add_ads', [Admin\AdsController::class, 'add'])->name('admin-add_ads');
        Route::get('/_admin/edit_ads/{id}', [Admin\AdsController::class, 'edit'])->name('admin-edit_ads');
        Route::get('/_admin/ads/activity/{id}/{stats}', [Admin\AdsController::class, 'toggle'])->name('admin-ads_activity');
        Route::post('/_admin/ads/update/{id}', [Admin\AdsController::class, 'update'])->name('admin-ads_update');
        Route::post('/_admin/ads/create/', [Admin\AdsController::class, 'create'])->name('admin-ads_create');


        Route::get('/_admin/show_Complaints', [Admin\ComplaintsController::class, 'showComplaints'])->name('admin-show_Complaints');
        Route::get('/_admin/add_Complaints/{id}', [Admin\ComplaintsController::class, 'addComplaints'])->name('admin-add_Complaints');
        Route::get('/_admin/edit_Complaints', [Admin\ComplaintsController::class, 'editComplaints'])->name('admin-edit_Complaints');
        Route::post('/_admin/create_Complaints/{id}', [Admin\ComplaintsController::class, 'relpay'])->name('admin-create_Complaints');
        Route::get('/_admin/showalert/{id}', [Admin\ComplaintsController::class, 'showalert'])->name('admin-showalert');

        Route::get('/_admin/show_Zones', [Admin\ZonesController::class, 'showZones'])->name('admin-show_Zones');
        Route::get('/_admin/add_zone', [Admin\ZonesController::class, 'addZones'])->name('admin-add_Zones');
        Route::get('/_admin/edit_zone/{id}', [Admin\ZonesController::class, 'editZones'])->name('admin-edit_zone');

        Route::get('/_admin/activity_zone/{id}/{state}', [Admin\ZonesController::class, 'activity'])->name('admin-activity_zone');
        Route::post('/_admin/update_zone/{id}', [Admin\ZonesController::class, 'doUpdate'])->name('admin-update_zone');
        Route::post('/_admin/create_zone', [Admin\ZonesController::class, 'create'])->name('admin-create_zone');


        Route::get('/_admin/show_Cities', [Admin\CitiesController::class, 'showCities'])->name('admin-show_Cities');
        Route::get('/_admin/add_Cities', [Admin\CitiesController::class, 'addCities'])->name('admin-add_Cities');
        Route::get('/_admin/edit_Cities/{id}', [Admin\CitiesController::class, 'editCities'])->name('admin-edit_Cities');
        Route::get('/_admin/activity_Cities/{id}/{state}', [Admin\CitiesController::class, 'activity'])->name('admin-activity_Cities');
        Route::post('/_admin/update_Cities/{id}', [Admin\CitiesController::class, 'doUpdate'])->name('admin-update_Cities');
        Route::post('/_admin/create_Cities', [Admin\CitiesController::class, 'create'])->name('admin-create_Cities');


        // Route::get('/_admin/edit_Cities',function(){
        //     return
        // }
        Route::get('/_admin/show_Customers', [Admin\CustomerController::class, 'showCustomers'])->name('admin-show_Customer');
        Route::get('/_admin/add_Customers', [Admin\CustomerController::class, 'addCustomers'])->name('admin-add_Customers');
        Route::get('/_admin/edit_Customers/{id}', [Admin\CustomerController::class, 'editCustomers'])->name('admin-edit_Customers');
        Route::post('/_admin/update_Customers/{id}', [Admin\CustomerController::class, 'doUpdate'])->name('admin-update_Customers');
        Route::post('/_admin/updateEmail/{id}', [Admin\CustomerController::class, 'updateEmail'])->name('_admin-updateEmail');
        Route::post('/_admin/updatePassword/{id}', [Admin\CustomerController::class, 'updatePassword'])->name('_admin-updatePassword');
        Route::post('/_admin/checkEmail/{id}', [Admin\CustomerController::class, 'checkUpdateEmail'])->name('_admin-checkEmail');
        Route::post('/_admin/create-customer', [Admin\CustomerController::class, 'create'])->name('_admin-create-customer');

        Route::get('/_admin/show_Phars', [Admin\PharController::class, 'showPhars'])->name('admin-show_Phars');
        Route::get('/_admin/add_Phars', [Admin\PharController::class, 'addPhars'])->name('admin-add_Phars');
        Route::get('/_admin/edit_Phars/{id}', [Admin\PharController::class, 'editPhars'])->name('admin-edit_Phars');
        Route::get('/_admin/activity/{id}/{stats}', [Admin\PharController::class, 'activity'])->name('admin-activity');
        Route::post('/_admin/phar/Updata/{id}', [Admin\PharController::class, 'doUpdata'])->name('_admin-phar_Updata');
        Route::post('/_admin/phar/create', [Admin\PharController::class, 'create'])->name('_admin-phar_create');
        Route::post('/_admin/update/phar_avater', [Admin\PharController::class, 'doUpdataImage'])->name('_admin-phar_avater');
        Route::post('/_admin/update/phar_license', [Admin\PharController::class, 'doUpdataLicense'])->name('_admin-phar_licenes');
        Route::post('/_admin/update/phar_email', [Admin\PharController::class, 'updateEmail'])->name('_admin-phar_email');
        Route::post('/_admin/update/check_email', [Admin\PharController::class, 'checkUpdateEmail'])->name('_admin-phar_check_email');
        Route::get('/_admin/showPharsAlert/{id}', [Admin\PharController::class, 'showPharsAlert'])->name('admin-showPharsAlert');


        Route::get('/_admin/show_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'showPaymentMethods'])->name('admin-show_PaymentMethods');
        Route::get('/_admin/add_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'addPaymentMethods'])->name('admin-add_PaymentMethods');
        Route::get('/_admin/edit_PaymentMethods', [Admin\PaymentMethodsCotroller::class, 'editPaymentMethods'])->name('admin-edit_PaymentMethods');


        Route::get('/_admin/show_Accounts', [Admin\AccountsController::class, 'showAccounts'])->name('admin-show_[Accounts');
        Route::get('/_admin/add_Accounts', [Admin\AccountsController::class, 'addAccounts'])->name('admin-add_[Accounts');
        Route::get('/_admin/edit_Accounts', [Admin\AccountsController::class, 'editAccounts'])->name('admin-edit_[Accounts');


        Route::get('/_admin/show_Requests', [Admin\RequestsController::class, 'showRequests'])->name('admin-show_Requests');
        Route::get('/_admin/add_Requests', [Admin\RequestsController::class, 'addRequests'])->name('admin-add_Requests');
        Route::get('/_admin/edit_Requests', [Admin\RequestsController::class, 'editRequests'])->name('admin-edit_Requests');
        Route::get('/_admin/show_RequestDetails\{id}', [Admin\RequestsController::class, 'showRequestDetails'])->name('admin-show_RequestDetails');


        Route::get('/_admin/show_Notifications', [Admin\NotificationsController::class, 'showNotifications'])->name('admin-show_[Notifications');
        Route::get('/_admin/add_Notifications', [Admin\NotificationsController::class, 'addNotifications'])->name('admin-add_[Notifications');
        Route::get('/_admin/edit_Notifications', [Admin\NotificationsController::class, 'editNotifications'])->name('admin-edit_[Notificati0ns');

        Route::get('/_admin/show_Permissions', [Admin\PermissionsController::class, 'showPermissions'])->name('admin-show_[Permissions');


        Route::get('/_admin/show_WebSiteSetting', [Admin\WebSiteSettingController::class, 'showWebSiteSetting'])->name('admin-show_WebSiteSetting');
        Route::post('/_admin/update_WebSiteSetting', [Admin\WebSiteSettingController::class, 'update'])->name('_admin-update_WebSiteSetting');
        Route::post('/_admin/update_logo', [Admin\WebSiteSettingController::class, 'updateLogo'])->name('_admin-update_logo');
        Route::post('/_admin/update_contact', [Admin\WebSiteSettingController::class, 'updateContact'])->name('_admin-update_contact');
        Route::post('/_admin/create_about', [Admin\WebSiteSettingController::class, 'create'])->name('_admin-create_about');
        Route::get('/_admin/Add_Service', [Admin\ServicesController::class, 'AddService'])->name('admin-Add_Service');
        Route::post('/_admin/store_Service', [Admin\ServicesController::class, 'AddService'])->name('admin-store_Service');
        Route::get('/_admin/edit_Service/{id}', [Admin\ServicesController::class, 'edit'])->name('admin-edit_Service');
        Route::post('/_admin/update_Service', [Admin\ServicesController::class, 'update'])->name('admin-update_Service');
        Route::get('/_admin/get_services', [Admin\ServicesController::class, 'index'])->name('admin-get_services');
        Route::get('/_admin/Add_Service', [Admin\ServicesController::class, 'AddService'])->name('admin-Add_Service');
        Route::post('/_admin/store_Service', [Admin\ServicesController::class, 'storeService'])->name('admin-store_Service');
        Route::post('/_admin/update_iamge_Service', [Admin\ServicesController::class, 'updateImageService'])->name('admin-update_iamge_Service');
        Route::get('/admin/activity_service/{id}/{stats}', [Admin\ServicesController::class, 'activity'])->name('admin-activity_service');

        // Route::get('/_admin/adds', [AdvertiseController::class, 'index'])->name('admin-adds');
        // Route::get('/_admin/adds/add', [AdvertiseController::class, 'add'])->name('admin-adds-create');
        // Route::get('/_admin/adds/edit', [AdvertiseController::class, 'edit'])->name('admin-adds-edit');
        // Route::post('/_admin/adds/create', [AdvertiseController::class, 'create']);
    });

    // Logout
    Route::get('/logout', [CustomAuth\LogoutController::class, 'logout'])->name('logout');
});


// payment page route
Route::get('/checkout-order', [Front\interfacesController::class, 'localCheckout'])->name('checkout-order');
// test payment route  There is a problem her
Route::get('/checkout-order/test', [Payment\PaymentController::class, 'index'])->name('test');
Route::get('/checkout-order/test/response/{info}', [Payment\PaymentController::class, 'showTest'])->name('test/response');
Route::get('/checkout-order/test/response/{info}', [Payment\PaymentController::class, 'showTest'])->name('test/response');
Route::get('/checkout-order/test/cancel/{cancel}', [Payment\PaymentController::class, 'testCancel'])->name('testCancel');
Route::get('/checkout-order/test/cancel', [Payment\PaymentController::class, 'viewCancel'])->name('viewCancel');

Route::get('send', [Notify\NotificationsController::class, 'registerNotification'])->name('viewCancel');
   //chat routs
   Route::group(['middleware' => 'auth'], function () {
    Route::get('/inbox', [ChatController::class, 'index'])->name('inbox.index');
    Route::get('/inbox/{id}', [ChatController::class, 'show'])->name('inbox.show');
});


