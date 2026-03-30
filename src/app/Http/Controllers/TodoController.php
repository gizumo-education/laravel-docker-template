<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;

use App\Todo;

class TodoController extends Controller
{

    private $todo;
    
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    //データ取得し一覧画面の表示するために値を渡す
    public function index()
    {
       
        $todos = $this->todo->all();
       
        return view('todo.index', ['todos' => $todos]); 
    }

    //ボタンを押し新規作成画面に遷移し表示させる
    public function create()
{
    return view('todo.create');
}

public function store(TodoRequest $request)
{
    //フォームから送信された値を一括で取得
    $inputs = $request->all();

    $this->todo->fill($inputs);
    $this->todo->save();

    return redirect()->route('todo.index');
}

//詳細取得
public function show($id)
{
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}

//編集対象のデータ取得
// TODO: ルートパラメータを引数に受け取る
public function edit($id)
{
    // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = $this->todo->find($id);
    return view('todo.edit', ['todo' => $todo]);
}

//リクエストされた値取得
public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
{
    // TODO: リクエストされた値を取得
    $inputs = $request->all();
    $todo = $this->todo->find($id);
    $todo->fill($inputs)->save();
    return redirect()->route('todo.show', $todo->id);
}

}