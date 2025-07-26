<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

// ↑Todoモデルを使用すると書かれている

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

    public function create()
    {
        // dd('新規作成画面のルート実行！');
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
        $model = new Todo();
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }
}
