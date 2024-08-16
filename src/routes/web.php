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

//  ウェブサイトのトップページにアクセスしたときに、welcome という名前のページを表示する
Route::get('/', function () {
    return view('welcome');
});

// 上記のを編集(Route::get()の第二引数に対象のControllerとそのメソッドを指定する)
Route::get('/todo', 'TodoController@index')->name('todo.index'); ; // app/Http/Controllers/TodoController.php


Route::get('/todo/create', 'TodoController@create'); // ボタンを押した後に、ルートを実行する


Route::get('/todo/create', 'TodoController@create')->name('todo.create'); // 追記 // ルートに名前を付ける

// Route::get ... ルートを定義するメソッド（getは「GETリクエスト」を意味しており、ウェブページを取得するために使います）

// /todo/create ... これは「URLのパス」を指定をしている。http://localhost:8080/todo/create というアドレスにアクセスすることで、このルートが呼び出される。

// TodoController@create ... 「コントローラーとメソッド」を指定します。
// TodoController というコントローラーの create メソッドが呼び出されます。

// ->name('todo.create') ... 「名前付きルート」の設定です。ルートに名前 todo.create を付けることで、後でこのルートを簡単に参照することができます。

// リダイレクト
Route::post('/todo', 'TodoController@store')->name('todo.store');