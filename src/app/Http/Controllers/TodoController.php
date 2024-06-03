<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;// 追加


class TodoController extends Controller
{
    // 追加
    private $todo;

    // 追加
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 追加


    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }

    // 追加
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    // 追加
    public function create()
    {
        return view('todo.create');
    }
        // 追加
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}