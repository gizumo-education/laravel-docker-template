<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {

        $todo = new Todo();
        $todoList = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

}
