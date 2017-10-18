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

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::get('', 'Admin\HomeController@index')->name('admin');

        Route::resource('categories', 'Admin\CategoryController');

        Route::prefix('topics')->group(function () {
            Route::get('', 'Admin\TopicController@index')->name('topic_list');
            Route::get('create', 'Admin\TopicController@create')->name('topic_create');
            Route::post('create', 'Admin\TopicController@store')->name('topic_store');
            Route::get('{id}/edit', 'Admin\TopicController@edit')->name('topic_edit');
            Route::post('{id}/edit', 'Admin\TopicController@update')->name('topic_update');
            Route::post('{id}/del', 'Admin\TopicController@destroy')->name('topic_delete');
        });

        Route::prefix('messages')->group(function () {
            Route::get('', 'Admin\MessageController@index')->name('message_list');
            Route::get('create', 'Admin\MessageController@create')->name('message_create');
            Route::post('create', 'Admin\MessageController@store')->name('message_store');
            Route::get('{id}/edit', 'Admin\MessageController@edit')->name('message_edit');
            Route::post('{id}/edit', 'Admin\MessageController@update')->name('message_update');
            Route::post('{id}/del', 'Admin\MessageController@destroy')->name('message_delete');
        });

    });

});
