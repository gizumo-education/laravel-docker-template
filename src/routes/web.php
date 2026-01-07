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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/todo', 'TodoController@index')->name('todo.index');

Route::get('/todo/create', 'TodoController@create')->name('todo.create');

Route::post('/todo', 'TodoController@store')->name('todo.store');

// 第一引数(/以下・URL末尾・パス)にGET(取得)・POST(送信)リクエストが送られたとき（または この名前のルートに案内されたとき）
// 第二引数(Controllerのメソッド)を実行

// :: は シングルアロー(->) と同じような感じ