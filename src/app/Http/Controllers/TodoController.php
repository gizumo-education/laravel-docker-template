<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');

        return view('todo.create');
    }

    public function store(Request $request)
    {
        // dd('新規作成のルート実行！');

        $content = $request->input('content');

        $todo = new Todo();
        $todo->content = $content;
        $todo->save();

        return redirect()->route('todo.index');

        // dd($content);
    }

}