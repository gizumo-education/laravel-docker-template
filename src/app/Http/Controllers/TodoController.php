<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();
        // dd($todoList);

        return view('todo.index', ['todos' => $todoList]);
    }

    public function create()
    {
       return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

        $todo = new Todo();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        // dd($id);
        $todo = new Todo();
        $targetTodo = $todo->find($id);

        return view('todo.show', ['todo' => $targetTodo]);
    }
}

