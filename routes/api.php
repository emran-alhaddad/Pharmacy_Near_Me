<?php

// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\request\RequestController;

use App\Http\Controllers\User\UserSearchController;
<<<<<<< HEAD
use App\Http\Controllers\Admin\AdvertiseController;
=======
use Illuminate\Support\Facades\Request;
>>>>>>> main

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
