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

Route::prefix('article')->group(function () {
    Route::get('index', 'ArticleController@index');
    Route::get('create', 'ArticleController@create');
    Route::get('store', 'ArticleController@store');
    Route::get('edit/{id}/{name}','ArticleController@edit');
});

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::prefix('article')->group(function () {
        Route::get('index', 'ArticleController@index');
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');
    });

    Route::prefix('tag')->group(function () {
        Route::get('index', 'TagController@index');
        Route::get('create', 'TagController@create');
        Route::post('store', 'TagController@store');
    });
});

Route::prefix('home')->namespace('Home')->group(function () {
    Route::prefix('article')->group(function () {
        Route::get('index', 'ArticleController@index');
        Route::get('create', 'ArticleController@create');
        Route::post('store', 'ArticleController@store');
    });
    Route::prefix('tag')->group(function () {
        Route::get('index', 'TagController@index');
        Route::get('create', 'TagController@create');
        Route::post('store', 'TagController@store');
    });
});

Route::prefix('database')->group(function () {
    Route::get('insert', 'DatabaseController@insert');
    Route::get('get', 'DatabaseController@get');
    Route::get('test', 'DatabaseController@test');
});

Route::prefix('model')->group(function () {
    Route::get('index', 'ModelController@index');
    Route::get('get', 'ModelController@get');
    Route::get('store', 'ModelController@store');
    Route::get('update', 'ModelController@update');
    Route::get('delete', 'ModelController@delete');
});

Route::prefix('view')->group(function () {
    Route::get('index', 'ViewController@index');
});

