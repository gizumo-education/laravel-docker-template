<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all(); //todosテーブルから全てのレコードを取得

        return view('todo.index', ['todos' => $todos]);
    }
}
