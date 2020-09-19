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
Route::get('overzicht', 'GameItemController@index')->name('game.overzicht');
Route::get('create', 'GameItemController@create')->name('game.create');
Route::post('store', 'GameItemController@store')->name('game.store');
Route::get('news/{id}', 'GameItemController@show')->name('game.show');
