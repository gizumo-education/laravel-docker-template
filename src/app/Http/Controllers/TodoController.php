<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();

        return view('todo.index',['todoList' => $todoList]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $content = $request->input('content');
        
        // 1.todosテーブルの1レコードを表すtodoクラスをインスタンス化
        $todo = new Todo();

        // 2.Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->content = $content;

        //3.Todoインスタンスの->save()を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();
    }
}
