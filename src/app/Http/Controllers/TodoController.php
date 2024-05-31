<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function index()
    {
        $todoList = $this->todo->all();
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

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        // dd($id);
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
}

