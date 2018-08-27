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

Route::group(['middleware' => 'guest'], function() {
	Route::get('/', function () {
	    return view('welcome');
	});
});

Auth::routes();

Route::get('/home', 'TodoController@index');
Route::post('todo/add', 'TodoController@add');
Route::get('todo/delete/{id}', 'TodoController@delete');
Route::get('todo/edit/{id}', 'TodoController@edit');
Route::post('todo/update/{id}', 'TodoController@update');
Route::get('todo/completed/{id}', 'TodoController@completed');