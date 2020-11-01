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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::get('about', 'AboutController@show')->name('about');
    Route::get('overzicht', 'GameItemController@index')->name('game.overzicht');
    Route::get('create', 'GameItemController@create')->name('game.create');
    Route::post('store', 'GameItemController@store')->name('game.store');
    Route::get('news/{id}', 'GameItemController@show')->name('game.show');
    Route::get('delete/{id}', 'GameItemController@delete')->name('game.delete');
    Route::post('waardig/{id}', 'GameItemController@waardig')->name('game.waardig');
    Route::get('/categories', 'CategoryController@index')->name('categories');
    Route::get('/zoeken', 'GameItemController@zoeken')->name('zoeken');
    Route::post('/zoeken/resultaat', 'GameItemController@zoekenResultaat')->name('zoekenResultaat');
    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('/profile/update', 'ProfileController@update')->name('profile.update');
});

Auth::routes();

Route::group(['middleware' => ['admin']], function(){
    Route::get('/admin', 'AdminController@admin')->name('admin');
    Route::post('createcategory', 'AdminController@createcategory')->name('createcategory');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/nopermission', 'AdminController@nopermission')->name('nopermission');
