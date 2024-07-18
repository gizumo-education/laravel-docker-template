<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    private $todo;
    // ToDoクラスのリファクタリング
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 一覧表示画面
    public function index()
    {
        $todoList = $this->todo->all();

        return view('todo.index', ['todoList' => $todoList]);
    }

    // 新規作成画面
    public function create()
    {
        return view('todo.create');
    }

    // 新規作成処理
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    // 詳細表示画面
    public function show($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    // 編集画面
    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }

    // 更新処理
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs)->save();

        return redirect()->route('todo.show', $todo->id);
    }

    // 削除処理
    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();

        return redirect()->route('todo.index');
    }
}