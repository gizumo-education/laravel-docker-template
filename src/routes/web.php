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

// Route::get('/test', function () {
//     echo 'Hello World!';
// });

// Route::get('/todo/create', function () {
//     return view('todo.create');
// })->name('todo.create');

// 修正
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 追加
Route::post('/todo', 'TodoController@store')->name('todo.store');

