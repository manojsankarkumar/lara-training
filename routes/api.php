<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


/*=================================================
=            Routes for authentication            =
=================================================*/
Route::post('/user/login', 'Api\UserController@login');
Route::post('/user/register', 'Api\UserController@register');
Route::post('/user/forgot-password', 'Api\UserController@forgotPassword');
/*=====  End of Routes for authentication  ======*/


/*===========================================================
=            Routes for authenticated users only            =
===========================================================*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*=====  End of Routes for authenticated users only  ======*/
