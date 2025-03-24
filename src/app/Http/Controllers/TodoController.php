<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Todo;

class TodoController extends Controller
{
    public function index() //初期画面
    {
        $todo = new Todo();
        $todos = $todo->all();
        
        return view('todo.index', ['todos' => $todos]);
    }
    //class Todo extends Modelのインスタンス化

    public function create() //新規作成画面
    {
        return view('todo.create' );
    }

    public function store(Request $request) //新規作成機能
{

    $content = $request->input('content'); // 追記

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo(); 
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->content = $content;
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();
    return redirect()->route('todo.index');

}

}

