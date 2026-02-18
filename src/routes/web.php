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

// Route::get('/todo', function () {
//     echo 'Hello World!';
// });
use App\Http\Controllers\TodoController;

Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create', [TodoController::class, 'create'])->name('todo.create');
Route::post('/todo', [TodoController::class, 'store'])->name('todo.store');
Route::get('/todo', 'TodoController@index')->name('todo.index'); 
// Route::get('/todo', 'TodoController@index');
// Route::get('/todo/create', 'TodoController@create'); 
// Route::get('/todo/create', 'TodoController@create')->name('todo.create'); 
