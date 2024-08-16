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
        // dd('新規作成画面のルート実行！');
        // TODO: 第1引数を指定
        return view('todo.create'); // 追記(todoファイルの中にある、create.blade.phpを指定)
    }

    public function store(Request $request) // フォームから送信されたToDoの内容を取得
    {
        $content = $request->input('content');

        // dd($content);

        // DBへの接続処理や複雑なSQLを記述することなく、DBを操作することができる
        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->content = $content;
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行(ここまでで追加されるが、ページは遷移しない)
        $todo->save();

        // リダイレクト
        return redirect()->route('todo.index');
    }
}