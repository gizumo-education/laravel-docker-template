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
// 追加
Route::get('/test', function () {
    echo 'Hello World!';
});

Route::get('/todo/create', 'TodoController@create')->name('todo.create');

Route::post('/todo', 'TodoController@store')->name('todo.store');//新規追加

Route::get('/todo', 'TodoController@index')->name('todo.index');

Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');//一覧表示

Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');//更新

Route::put('/todo/{id}', 'TodoController@update')->name('todo.update');

Route::delete('/todo/{id}', 'TodoController@delete')->name('todo.delete');//論理削除