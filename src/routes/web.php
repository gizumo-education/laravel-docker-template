<?php

Route::get('/todo', function () {
    echo 'Hello World!';
});

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

Route::get('/todo', 'TodoController@index')->name('todo.index');
/*TodoController（クラス）のindex（メソッド）を指定　@は区切り文字*/

Route::get('/todo/create', 'TodoController@create')->name('todo.create');

// ToDoを新規作成するルート
Route::post('/todo', 'TodoController@store')->name('todo.store');