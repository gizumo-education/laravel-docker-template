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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/todo/create', 'TodoController@create')->name('todo.create');

Route::post('/todo', 'TodoController@store')->name('todo.store');

Route::get('/todo', 'TodoController@index')->name('todo.index'); //一覧画面へのリダイレクト:ルート名の定義

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show'); /* 詳細ボタンの作成 ルートどり */



?>