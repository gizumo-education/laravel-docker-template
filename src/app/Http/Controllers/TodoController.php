<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all;

        return view('todo.index', ['todoList' => $todoList]);
    }
}
