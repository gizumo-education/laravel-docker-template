<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() 
    {
        $todo = new Todo();
        $todos = $todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        dd($inputs);
        $content = $request->input('content');
        //dd($content);
        $todo = new Todo();
        //$todo->content = $inputs['content'];
        $todo->fill($inputs);
        $todo->save();
        
        return redirect()->route('todo.index');
    }
} 
