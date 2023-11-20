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

//「GETで http://localhost:8080/ にリクエストされたら、welcome画面を表示する」という意味です。
// Route::get('/', function () {
//     return view('welcome');
// });

//引数はhttp://localhost:8080/testの意味になる
//Route::get('/test', function () {
//     echo 'Hello World!';
// });

// Route::get('/todo/create', function () {
//     return view('todo.create');
// })->name('todo.create');
//下記内容に修正
Route::get('/todo/create', 'TodoController@create')->name('todo.create');

//追加 登録処理 POST送信の点に注意
Route::post('/todo', 'TodoController@store')->name('todo.store');

//追加 一覧表示機能 GET送信
Route::get('/todo', 'TodoController@index')->name('todo.index');

//追加 特定IDのみ表示機能、{id}で取得する
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');

//追加 編集機能
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
//削除機能
Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');

//完了機能
Route::post('/todo/{id}/complete', 'TodoController@complete')->name('todo.complete');