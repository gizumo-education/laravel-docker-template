<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    private $todo;

    // TodoControllerのインスタンスを作成するときに、Todoモデルを受け取り、プロパティに設定する
    //モデルのひな型を作成
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // Todo作成用のフォームを表示する
    public function create()
    {
        return view('todo.create');
    }

    // フォームから送信されたTodoを保存する
    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs); //fillメソッドですべての入力データをモデルに設定（ただ更新できるのはtodo.phpでホワイトリストにしているもののみ）
        $this->todo->save(); //モデルの状態をデータベースに保存している　update関数
        return redirect()->route('todo.index');
    }

    // すべてのTodoを取得して、一覧を表示する
    public function index()
    {
        $todos = $this->todo->all(); //Todoのホワイトリストに設定したすべてを取得　Select文　Collectionクラス
        return view('todo.index', ['todos' => $todos]); //第一引数は対象のBladeファイル　第二引数はそのBladeファイルで呼び出せる変数
        //dd($todos); 
    }

    // 特定のTodoを表示する
    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    // 特定のTodoを編集するためのフォームを表示する
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    // フォームから送信されたTodoを更新する
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }
}


//なぜfill()を利用したのか。そのメリットをご自身で調べてみてください（レビュー時に聞きます）。
