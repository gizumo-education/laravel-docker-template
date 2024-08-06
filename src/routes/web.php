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

// ルート定義は、routes/web.phpに記述する。 // 下記を追加

// Route::get('/todo', function () {
//     echo 'Hello World!';
// });

// 上記のを編集(Route::get()の第二引数に対象のControllerとそのメソッドを指定する)
Route::get('/todo', 'TodoController@index'); // app/Http/Controllers/TodoController.php


// http://localhost:8080/todo にアクセスしたときに、「Hello World!」と画面に表示する