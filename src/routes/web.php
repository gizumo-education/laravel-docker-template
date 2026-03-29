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

Route::get('/todo/create', 'TodoController@create')->name('todo.create'); //新規作成
Route::post('/todo', 'TodoController@store')->name('todo.store'); //新規作成
Route::get('/todo', 'TodoController@index')->name('todo.index'); //一覧表示
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit'); //編集
Route::put('/todo/{id}', 'TodoController@update')->name('todo.update'); //更新
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete'); //削除