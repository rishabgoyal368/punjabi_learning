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



Route::post('app-setting', 'JwtAuthController@setting');
Route::post('login', 'JwtAuthController@login');
Route::post('register', 'JwtAuthController@register');

Route::post('/mcq-question', 'Api\McqController@index');

Route::group(['middleware' => 'token_auth'], function () {

    // User Controller
    Route::post('logout', 'JwtAuthController@logout');
    Route::get('user-info', 'JwtAuthController@getUser');
    Route::post('update-profile', 'JwtAuthController@updateProfile');
    
	//user -result
    Route::post('user-result', 'Api\McqController@submit_result');
    Route::post('user-report', 'Api\McqController@view_result');

    // Content Controller
    // Route::get('getGurumukhi', 'PunjabiController@getGurumukhi');

});
Route::any('manage-content', 'PunjabiController@getContent');
