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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function() {
    Route::group(['prefix' => 'home'], function() {
        Route::get('/', 'HomeController@index')->name('home');
    });

    Route::group(['prefix' => 'goods', 'as' => 'goods'], function() {
        Route::get('/', 'GoodController@index');
        Route::get('/create', 'GoodController@create')->name('.create');
        Route::post('/create', 'GoodController@store')->name('.store');
        Route::get('/{id}/edit', 'GoodController@edit')->name('.edit');
        Route::put('/{id}/edit', 'GoodController@update')->name('.update');
        Route::get('/trash', 'GoodController@trash')->name('.trash');
        Route::post('/delete', 'GoodController@delete')->name('.delete');
        Route::delete('/delete', 'GoodController@destroy')->name('.destroy');
    });

    Route::group(['prefix' => 'categories', 'as' => 'categories'], function() {
        Route::get('/', 'CategoryController@index');
        Route::get('/create', 'CategoryController@create')->name('.create');
        Route::post('/create', 'CategoryController@store')->name('.store');
        Route::get('/{id}/edit', 'CategoryController@edit')->name('.edit');
        Route::put('/{id}/edit', 'CategoryController@update')->name('.update');
        Route::get('/trash', 'CategoryController@trash')->name('.trash');
        Route::post('/delete', 'CategoryController@delete')->name('.delete');
        Route::post('/delete/restore', 'CategoryController@restore')->name('.restore');
        Route::delete('/delete', 'CategoryController@destroy')->name('.destroy');
    });
});


