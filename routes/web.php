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

Route::get('/', 'PublicController@index')->name('public.index');
Route::post('/', 'PublicController@store')->name('public.messages.store');

Auth::routes();

Route::prefix('admin')->group(function () {

    Route::middleware('auth')->group(function () {

        Route::get('', 'Admin\HomeController@index')->name('admin');

        Route::prefix('categories')->group(function () {
            Route::get('', 'Admin\CategoryController@index')->name('admin.categories.index');
            Route::get('create', 'Admin\CategoryController@create')->name('admin.categories.create');
            Route::post('create', 'Admin\CategoryController@store')->name('admin.categories.store');
            Route::get('{id}/edit', 'Admin\CategoryController@edit')->name('admin.categories.edit');
            Route::post('{id}/edit', 'Admin\CategoryController@update')->name('admin.categories.update');
            Route::post('{id}/del', 'Admin\CategoryController@destroy')->name('admin.categories.destroy');
        });

        Route::prefix('topics')->group(function () {
            Route::get('', 'Admin\TopicController@index')->name('admin.topics.index');
            Route::get('create', 'Admin\TopicController@create')->name('admin.topics.create');
            Route::post('create', 'Admin\TopicController@store')->name('admin.topics.store');
            Route::get('{id}/edit', 'Admin\TopicController@edit')->name('admin.topics.edit');
            Route::post('{id}/edit', 'Admin\TopicController@update')->name('admin.topics.update');
            Route::post('{id}/del', 'Admin\TopicController@destroy')->name('admin.topics.destroy');
        });

        Route::prefix('messages')->group(function () {
            Route::get('', 'Admin\MessageController@index')->name('admin.messages.index');
            Route::get('create', 'Admin\MessageController@create')->name('admin.messages.create');
            Route::post('create', 'Admin\MessageController@store')->name('admin.messages.store');
            Route::get('{id}/edit', 'Admin\MessageController@edit')->name('admin.messages.edit');
            Route::post('{id}/edit', 'Admin\MessageController@update')->name('admin.messages.update');
            Route::post('{id}/del', 'Admin\MessageController@destroy')->name('admin.messages.destroy');
        });

    });

});
