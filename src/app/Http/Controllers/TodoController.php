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
     $inputs = $request->all(); // 追記
     dd($inputs); 

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo(); 
    $todo->user_id = Auth::id();
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->fill($inputs);     // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();

    return redirect()->route('todo.index');
}
}
