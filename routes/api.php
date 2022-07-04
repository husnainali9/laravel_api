<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

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

Route::post('/auth/register', 'UserAuthController@register');
Route::post('/auth/login', 'UserAuthController@login');
    
Route::group(['middleware' => ['auth:api', 'throttle:60,1']], function() {
    Route::apiResource('/products', 'ProductController')->middleware('auth:api');
    Route::apiResource('/cart', 'CartController')->middleware('auth:api');
});