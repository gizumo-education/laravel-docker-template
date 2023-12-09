<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
// TodoモデルをControllerにて呼び出し、インスタンス化/


class TodoController extends Controller
{
    private $todo;

    // 追加
    public function __construct(Todo $todo)
    // Todo $todoでルートから呼び出されて内部でインスタンス化
    {
        $this->todo = $todo;
    }
    
    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        // Requestクラスのall()を使用し、フォームで入力された値を連想配列に変換して取得
        $this->todo->fill($inputs);
        // 連想配列を渡しその情報を$this->todoに保存
        $this->todo->save();
        // ToDo一覧画面にリダイレクト
        return redirect()->route('todo.index');
    }
    // fiiでモデルに値を一括セット

    public function index()
    {
        $hoge = $this->todo->all();
        // dd($todos);
        // モデルが対応するテーブルにSELECT文を実行しレコードを取得
        return view('todo.index', ['hoge' => $hoge]);
        // todosという名前の変数に$todosの中身を入れて、todo/index.blade.phpで使えるように
    }

    public function show($id)
    {
        // dd($id);
        $todo = $this->todo->find($id);
        // モデルが対応するテーブルのプライマリーキーを引数に受け取り、その対象レコードを一件取得
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    // 追加
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }
}
