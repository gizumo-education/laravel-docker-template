<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() //一覧表示
    {
        $todo = new Todo();
        $todos = $todo->all();

        return view('todo.index', ['todos' => $todos]);
    
    }
    public function create() //新規作成
    {
        return view('todo.create');
    }
    public function store(Request $request)
    {
    $inputs = $request->all();

    $todo = new Todo();
    $todo->fill($inputs);
    $todo->save();
    return redirect()->route('todo.index');
    }
    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);

        return view('todo.show', ['todo' => $todo]);
    }
}
