<?php

use Illuminate\Support\Facades\Route;

/*
|--`------------------------------------------------------------------------
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

Route::prefix('desa')->group(function(){
    Route::get('/dashboard', 'DesaController@dashboard');
   
    Route::get('/profil/{id_desa}', 'DesaController@dataDesa');
    Route::post('/detail', 'DesaController@detailDesa');
    Route::post('/updateDesa', 'DesaController@updateDesa');
    
    Route::get('/publikasi/{id_desa}', 'DesaController@publikasiDesa');
    Route::post('/publikasi/detail', 'DesaController@detailPublikasi');
    Route::post('/publikasi/add', 'DesaController@insertPublikasi');
    Route::post('/publikasi/edit', 'DesaController@updatePublikasi');
    Route::post('/publikasi/delete', 'DesaController@deletePublikasi');
    
    Route::get('/pengaduan/{id_desa}', 'DesaController@pengaduan');
    Route::post('/pengaduan/detail', 'DesaController@detailPengaduan');
    
    Route::get('/dokumen/{id_desa}', 'DesaController@dokumen');
    Route::post('/dokumen/detail', 'DesaController@detailDokumen');
    Route::post('/dokumen/add', 'DesaController@insertDokumen');
    Route::post('/dokumen/edit', 'DesaController@updateDokumen');
    Route::post('/dokumen/delete', 'DesaController@deleteDokumen');   

    Route::get('/kegiatan/{id_desa}', 'DesaController@kegiatanDesa');
    Route::post('/kegiatan/detail', 'DesaController@detailKegiatan');
    Route::post('/kegiatan/add', 'DesaController@insertKegiatan');
    Route::post('/kegiatan/edit', 'DesaController@updateKegiatan');
    Route::post('/kegiatan/delete', 'DesaController@deleteKegiatan');

    Route::get('/prokum/{id_desa}', 'DesaController@prokum');
    Route::post('/prokum/detail', 'DesaController@detailProkum');
    Route::post('/prokum/add', 'DesaController@insertProkum');
    Route::post('/prokum/edit', 'DesaController@updateProkum');
    Route::post('/prokum/delete', 'DesaController@deleteProkum'); 
});

Route::get('/login', 'UserController@logIn')->name('login')->middleware('guest');
Route::get('/register', 'UserController@register');
Route::post('/signin', 'UserController@signIn');
Route::post('/signup', 'UserController@signUp');
Route::post('/logout', 'UserController@logout');

//admin
Route::prefix('admin')->group(function(){
    Route::get('/dashboard', 'AdminController@dashboard');

    //Desa
    Route::get('/data-desa', 'AdminController@dataDesa');
    Route::post('/insertDesa', 'AdminController@insertDesa');
    Route::post('/updateDesa', 'AdminController@updateDesa');
    Route::get('/deleteDesa/{id}', 'AdminController@deleteDesa');
    Route::post('/passDesa', 'AdminController@passDesa');

    //Dokumen
    Route::get('/dokumen/{id}', 'AdminController@dokumen');

