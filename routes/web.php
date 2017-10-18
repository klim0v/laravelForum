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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('categories','CategoryController');

Route::prefix('topics')->group(function () {
    Route::get('', 'TopicController@index')->name('topic_list');
    Route::get('create', 'TopicController@create')->name('topic_create');
    Route::post('create', 'TopicController@store')->name('topic_store');
    Route::get('{id}/edit', 'TopicController@edit')->name('topic_edit');
    Route::post('{id}/edit', 'TopicController@update')->name('topic_update');
    Route::post('{id}/del', 'TopicController@destroy')->name('topic_delete');
});

Route::prefix('messages')->group(function () {
    Route::get('', 'MessageController@index')->name('message_list');
    Route::get('create', 'MessageController@create')->name('message_create');
    Route::post('create', 'MessageController@store')->name('message_store');
    Route::get('{id}/edit', 'MessageController@edit')->name('message_edit');
    Route::post('{id}/edit', 'MessageController@update')->name('message_update');
    Route::post('{id}/del', 'MessageController@destroy')->name('message_delete');
});
