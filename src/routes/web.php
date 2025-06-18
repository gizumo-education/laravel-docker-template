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
// 一覧表示
Route::get('/todo', 'TodoController@index');
// 追加ボタン押した時（新規作成時）
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// データ保存時
Route::post('/todo', 'TodoController@store')->name('todo.store');