<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    // 一覧のためのデータ取得と表示
    public function index()
    {
        // Model機能の使用のためTodoクラスのインスタンス化
        $todo = new Todo();
        // Todosテーブルのデータを全件取得
        $todos = $todo->all();
    //   index.create.phpの返却とそれに対するデータの受け渡し
        return view('todo.index', ['todos' => $todos]); 
    }
    // create.blade.phpの表示
    public function create()
    {
        return view('todo.create');
    }

    // フォーム入力時のデータ保存
    public function store(Request $request) {
        // 入力値の全件取得
        $inputs = $request->all();
        // Model機能の使用のためTodoインスタンスの生成
        $todo = new Todo();
        // 'content'カラムへの一括代入
        $todo->fill($inputs);
        // データ保存
        $todo->save();
        // リダイレクト
        return redirect()->route('todo.index');
    }
   
}

