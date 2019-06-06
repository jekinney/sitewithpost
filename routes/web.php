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

Route::prefix('post')->name('post.')->group( function() {
	Route::get('/', 'PostController@index')->name('index');
	Route::get('/admin', 'PostController@admin')->name('admin')->middleware(['author']);
	Route::get('/create', 'PostController@create')->name('create')->middleware(['author']);
	Route::get('/show/{uuid}', 'PostController@show')->name('show');
	Route::get('/edit/{uuid}', 'PostController@edit')->name('edit')->middleware(['author']);
	Route::post('/', 'PostController@store')->name('store')->middleware(['author']);
	Route::patch('/{uuid}', 'PostController@update')->name('update')->middleware(['author']);
	Route::delete('/{uuid}', 'PostController@destroy')->name('destroy')->middleware(['author']);
});
