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

// 一覧表示のルート定義(TodoControllerクラスのindexメソッド)
// 名前付きルートでtodo.indexとする
Route::get('/todo', 'TodoController@index')->name('todo.index');

// 新規作成のルート定義(TodoControllerクラスのcreateメソッド)
// 名前付きルートでtodo.createとする
Route::get('/todo/create', 'TodoController@create')->name('todo.create');

// 新規作成のルート定義(TodoControllerクラスのstoreメソッド)
// ToDoを新規作成するルートのため、HTTPメソッドはPOST
// 名前付きルートでtodo.storeとする
Route::post('/todo', 'TodoController@store')->name('todo.store');

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');

Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');

Route::delete('/todo/{id}/show', 'TodoController@delete')->name('todo.delete');