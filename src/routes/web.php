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

Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 入力画面のルート　/todo/createにアクセスしたらTodoControllerのcreateを実行してください
// Routeをtodo.createの名前にする　これが記入されていたら同じ処理をしてくれる

Route::post('/todo', 'TodoController@store')->name('todo.store');
// 入力内容の登録のルート

Route::get('/todo', 'TodoController@index')->name('todo.index');
// 一覧画面のルート

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
// 詳細画面のルート

Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
// 編集画面のルート

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');
// 更新のルート

Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');
// 削除のルート

// Route::メソッド('/アドレス{ルートパラメータ},Controllerでの処理')->name('ルート名');