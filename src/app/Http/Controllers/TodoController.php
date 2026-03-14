<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index() //一覧表示
    {
        $todo = new Todo(); //Todoモデルのインスタンス生成 //Eloquentモデル
        $todos = $todo->all(); //todosテーブルの全レコード取得　SELECT * FROM todos;　 //返り値：Collectionのインスタンス　//Collectionとは？todosのデータは？何が入ってる？

        return view('todo.index', ['todos' => $todos]); //view関数?なぜ関数とわかるのか //view関数の書き方
    
    }
    public function create() //新規作成
    {
        return view('todo.create');
    }
    public function store(Request $request)
{
    $inputs = $request->all();//フォームから送信されたtodoデータの取得

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo();
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();
    return redirect()->route('todo.index'); //viewではない理由は？なぜredirect？
}
}
