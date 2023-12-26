<?php

namespace App\Http\Controllers;

use App\Todo;// 追加
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //追加
    private $todo;

    //追加
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 追加
    public function index()
    {
        $todos = $this->todo->all();
        // dd($todos);
        // 追加
        return view('todo.index', ['todos' => $todos]);
        // return view('todo.index', ['todos' => $this->todo->all()]) 上記と同じ
    }

    //追加
    public function create()
    {
        return view('todo.create');
    }

    //追加
    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        // dd($this->todo);
        return redirect()->route('todo.index');

    }
    
}
