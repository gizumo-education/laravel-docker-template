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
//web.phpファイル アクセスされたURLに応じて、どの処理を実行するかを定義する
// ルーティング（URLの案内版）を設定している記述

// ユーザーがトップページにアクセスした時に、welcome.blade.phpを表示する処理を実行する
Route::get('/', function () {
    return view('welcome');
});
// Todo作成画面の表示 第一引数を書き換えたとしても　/todo/createという名付けルートをする事で、ルート名を書き換える必要がない。一括で設定が反映される
Route::get('/todo/create', 'TodoController@create')->name('todo.create');

Route::post('/todo', 'TodoController@store')->name('todo.store');
// ファイルの参照と使用するメソッドを指定している
// 第一引数
Route::get('/todo', 'TodoController@index')->name('todo.index');
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');
