<?php

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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('home');
Route::post('/import','HomeController@import');
Route::post('reauthenticate','HomeController@reauthenticate');
Auth::routes(['register' => false]);

//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');

//==========> Department <===================//
Route::post('/get-department-ajax', 'DepartmentController@getDepartment');
//==========> Designation <=================// 
Route::any('/manage-user', 'UserController@show')->name('manage-user');
Route::any('add-user', 'UserController@add');
Route::any('edit-user/{id}', 'UserController@add');
Route::delete('delete-user', 'UserController@delete');
//==========> Users Management <=================// 
// Route::any('/user-management', 'DesignationsController@show');

Route::any('/manage-content', 'ContentController@show')->name('manage-content');
Route::any('add-content', 'ContentController@add');
Route::any('edit-content/{id}', 'ContentController@add');
Route::delete('delete-content', 'ContentController@delete');

//==========> Admin  <===================//
Route::any('/updateprofile','AdminController@update');
Route::any('/updatepassword','AdminController@updatepassword');


