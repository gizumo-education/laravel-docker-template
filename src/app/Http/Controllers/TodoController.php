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
        //TODO; 第一引数を指定
        return view ('todo.create');
    }
    
    public function store(Request $request) // 追記
    {
        $inputs = $request->all();
        dd($inputs);
    
            //DBにデータの新規登録を行なっていく
        $todo = new Todo(); // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo->fill($inputs); // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入(その後書き換え済)
        $todo->save(); // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index'); //一覧画面へのリダイレクトを実装するための処理

    }

    
}
