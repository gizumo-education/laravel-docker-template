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

Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit'); //Sec18にて作成の編集するボタンを押した時のルートの定義
// どんなルート？ー編集対象のToDoの1件を取得して表示するルート
// 🔴詳細画面と更新画面で別の画面表示をするため、編集画面のルートの最後には/.editをつけて差別している。

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
//PUTメソッドでデータの更新(上書き)をするよう指定
///todo/{id}で特定のidのTodoのデータを指定

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');

Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');


?>