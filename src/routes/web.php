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

//ルーティング
//一覧表示
Route::get('/todo', 'TodoController@index')->name('todo.index');
//作成画面表示
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
//新規作成
Route::post('/todo', 'TodoController@store')->name('todo.store');