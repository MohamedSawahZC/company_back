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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('basic',"App\Http\Controllers\Basic@index");
Route::post('basic',"App\Http\Controllers\Basic@create");


Route::post('register',"App\Http\Controllers\UserController@register");
Route::post('login',"App\Http\Controllers\UserController@login");
Route::post('institute',"App\Http\Controllers\Institutes@create");

Route::group(['middleware'=>'auth:api'],function(){
    Route::get('profile',"App\Http\Controllers\UserController@details");
});