<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

use App\Todo;

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

    public function store(TodoRequest $request)
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

    public function edit($id)
    {

        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);

        // dd($todo);
    }

    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs)->save();

        // dd($inputs);

        return redirect()->route('todo.show', $todo->id);
    }

    public function delete($id)
    {
        // dd('削除のルート実行！');

        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }

}
