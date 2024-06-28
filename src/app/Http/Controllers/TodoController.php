<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();
        
        return view('todo.index',['todoList' => $todoList]);
    }

    public function create()
{
    return view('todo.create'); 
}

public function store(Request $request) // 追記
{
    $content = $request->input('content'); // 追記

    $todo = new Todo(); 

    $todo->content = $content;

    $todo->save();

    return redirect()->route('todo.index');
}

}
