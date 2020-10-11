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
    return view('welcome');
});

Route::get('about', 'AboutController@show')->name('about');
Route::get('overzicht', 'GameItemController@index')->name('game.overzicht')->middleware('auth');
Route::get('create', 'GameItemController@create')->name('game.create')->middleware('auth');
Route::post('store', 'GameItemController@store')->name('game.store')->middleware('auth');
Route::get('news/{id}', 'GameItemController@show')->name('game.show')->middleware('auth');
Route::get('delete/{id}', 'GameItemController@deletefromdatabase')->name('game.delete')->middleware('auth');

Auth::routes();

Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin', 'GameItemController@admin')->name('admin');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/nopermission', 'GameItemController@nopermission')->name('nopermission');
