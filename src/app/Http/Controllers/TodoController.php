<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function create()
    {
        return view('todo.create');
    }

    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();

        return view('todo.index',['todoList' => $todoList]);
    }
}
