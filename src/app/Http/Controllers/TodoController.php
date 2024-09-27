<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
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
        // dd('新規作成のルート実行！');

        $inputs = $request->all();
        // dd($inputs);

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');

        // dd($content);
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

}
