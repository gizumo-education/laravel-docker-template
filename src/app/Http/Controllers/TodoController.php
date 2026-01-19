<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all(); //todosテーブルから全てのレコードを取得

        return view('todo.index', ['todos' => $todos]); //todosテーブルのすべてのレコードをindexに渡す。第二引数は連想配列
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');

        return view('todo.create');
    }

    public function store(Request $request)
    {
        // dd('新規作成のルート実行！');

        $inputs = $request->all();
        // dd($inputs);

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->fill($inputs);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index');
    }
}
