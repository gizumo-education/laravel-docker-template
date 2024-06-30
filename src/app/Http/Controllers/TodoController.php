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
        // dd($todo);

        return view('todo.index',['todoList' => $todoList]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        // dd($inputs);

        $todo = new Todo();
        // $todo->content = $inputs['content'];
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }
}

