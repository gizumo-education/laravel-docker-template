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
    public function index() //一覧表示
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }
    public function create() //新規作成
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
        $inputs = $request->all();

        $this->todo->fill($inputs); // 変更
        $this->todo->save(); // 変更
    
        return redirect()->route('todo.index');
    }
    public function show($id)
    {
        $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}
}
