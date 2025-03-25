<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
    public function index() 
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        //dd($todo);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        //dd($inputs);
        //$content = $request->input('content');
        //dd($content);
        //$todo = $this->todo;
        //$todo->content = $inputs['content'];
        //$todo->fill($inputs);
        $this->todo->fill($inputs);
        $this->todo->save();
        
        return redirect()->route('todo.index');
    }
} 
