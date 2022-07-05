<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () { return view('index'); });
Route::get('/index', function() { return view('index'); });

Auth::routes();
Route::get('/user', 'UserController@index')->name('user')->middleware('user');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/updateStatusPayment/{email}/{instalment}', 'AdminController@updateStatusPayment');
Route::get('/order/{menu_code}', 'UserController@order');
Route::post('/comment', 'UserController@comment');
Route::get('admin/search', 'AdminController@search');
Route::get('createPayment', 'UserController@createPayment');