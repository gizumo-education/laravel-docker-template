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
Route::get('/todo', function () {
    echo 'Hello World!';
});


Route::get('/todo', 'TodoController@index'); /*section7のコントローラーへのルート.12行目だと反映されない*/

Route::get('/todo/create', 'TodoController@create');//新規作成画面のルート

Route::get('/todo/create', 'TodoController@create')->name('todo.create'); // 追記名前付きルート

Route::post('/todo', 'TodoController@store')->name('todo.store');

Route::get('/todo', 'TodoController@index')->name('todo.index'); // ルート名の定義を追記