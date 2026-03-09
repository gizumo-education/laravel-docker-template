<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
       
        $todo = new Todo();
        $todos = $todo->all();
       
        return view('todo.index', ['todos' => $todos]); 
    }

    public function create()
{
    return view('todo.create');
}

public function store(Request $request)
{
    //フォームから送信された値を一括で取得
    $inputs = $request->all();
    dd($inputs);

     // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo(); 
    // 2. Todoインスタンスの各プロパティに保存したい値を一括で代入
    $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();

    return redirect()->route('todo.index');
}

}