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

Route::get('/', function () {
    // return view('welcome');
    return view('menu');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/menu', 'MenuController@index')->name('menu')->middleware('auth');
Route::get('/menu/search', 'MenuController@search')->name('menu/search')->middleware('auth');

Route::get('/userDetail', 'UserDetailController@index')->name('userDetail')->middleware('auth');

Route::get('/userMaster', 'UserMasterController@index')->name('userMaster')->middleware('auth');
Route::post('/userMaster', 'UserMasterController@insertDelete')->name('userMaster')->middleware('auth');

Route::get('/userEdit', 'UserEditController@index')->name('userEdit')->middleware('auth');
Route::post('/userEdit', 'UserEditController@index')->name('userEdit')->middleware('auth');
Route::get('/userEdit/update', 'UserEditController@update')->name('userEdit/update')->middleware('auth');

//会社一覧
Route::get('/corpList', 'CorpListController@index')->name('corpList')->middleware('auth');
Route::get('/corpList/search', 'CorpListController@search')->name('corpList/search')->middleware('auth');

//会社詳細
Route::get('/corpDetail/{corp_id}', 'CorpDetailController@index')->name('corpDetail')->middleware('auth');

//会社登録
Route::get('/corpRegister', 'CorpRegisterController@form')->name('corpRegister')->middleware('auth');
Route::post('/corpRegister', 'CorpRegisterController@store')->middleware('auth');

//会社更新
Route::get('/corpRegister/{corp_id}', 'CorpRegisterController@form')->name('corpRegister.edit')->middleware('auth');
Route::put('/corpRegister/{corp_id}', 'CorpRegisterController@update')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
