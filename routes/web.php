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
Route::get('/desa', 'UserController@desa');
Route::post('/insertAduan', 'UserController@insertAduan');
Route::get('/list-desa', 'UserController@listDesa');


//admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard');

    //Desa
    Route::get('/data-desa', 'AdminController@dataDesa');
    Route::post('/insertDesa', 'AdminController@insertDesa');
    Route::post('/updateDesa', 'AdminController@updateDesa');
    Route::get('/deleteDesa/{id}', 'AdminController@deleteDesa');
    Route::post('/passDesa', 'AdminController@passDesa');

    //Dokumen
    Route::get('/dokumen/{id}', 'AdminController@dokumen');


    
});
Route::get('/desa', 'UserController@desa');
Route::get('/profil/{id}', 'UserController@profil');
