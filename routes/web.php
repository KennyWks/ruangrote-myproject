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

Route::get('/', 'UserController@getIndex');

//admin
Route::prefix('admin')->group(function(){
    Route::get('/login', 'AdminController@logIn')->name('login')->middleware('guest');
    Route::get('/register', 'AdminController@register');
    Route::post('/signin', 'AdminController@signIn');
    Route::post('/signup', 'AdminController@signUp');
    Route::post('/logout', 'AdminController@logout');

    Route::get('/dashboard', 'AdminController@dashboard')->middleware('auth');

    //Desa
    Route::get('/data-desa', 'AdminController@dataDesa');
    Route::post('/insertDesa', 'AdminController@insertDesa');
});

Route::get('/desa', 'UserController@desa');
