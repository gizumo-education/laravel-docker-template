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

        return view('todo.index', ['todoList' => $todoList]);
    }

    public function create()
    {
        $todo = new Todo();
        $todoList = $todo->all();

        return view('todo.create', ['todoList' => $todoList]);
    }

    public function store()
    {
        dd('新規作成のルート実行！');
    }

    public function store(Request $request)
    {
        $content = $request->input('content');

        $todo = new Todo(); 
        $todo->content = $content;
        $todo->save();

        return redirect()->route('todo.index');
    }

}
