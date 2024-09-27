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

Route::get('/todo','TodoController@index')->name('todo.index');
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
Route::post('/todo', 'TodoController@store')->name('todo.store');
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
