<?php

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

Route::get('/', 'HomeController@index')->name('home');

Auth::routes();
Route::group(['middleware'=>'web'],function(){
    Route::get('user/iduser','UserController@getnumber')->name('user.iduser');
    Route::get('user/profil', 'UserController@profil')->name('user.profil');
    Route::patch('user/{id}/change', 'UserController@changeProfil');

});

Route::group(['middleware' => ['web','cekuser:1']],function(){

    Route::get('user/data', 'UserController@listData')->name('user.data');
    Route::resource('user', 'UserController');

    Route::get('mako/idmako','MakoController@getnumber')->name('mako.idmako');
    Route::get('mako/data', 'MakoController@listData')->name('mako.data');
    Route::resource('mako', 'MakoController');

    Route::get('dokumen/data', 'DokumenController@listData')->name('dokumen.data');
    Route::get('dokumen/compose', 'DokumenController@compose')->name('dokumen.compose');
    Route::get('dokumen/upload', 'DokumenController@upload')->name('dokumen.upload');
    Route::resource('dokumen', 'DokumenController');

});
