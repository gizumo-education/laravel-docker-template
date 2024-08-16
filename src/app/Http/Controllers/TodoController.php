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


    // public function store(Request $request) // フォームから送信されたToDoの内容を取得
    // {
    //     $content = $request->input('content');

    //     // dd($content);

    //     // DBへの接続処理や複雑なSQLを記述することなく、DBを操作することができる
    //     // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    //     $todo = new Todo();
    //     // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    //     $todo->content = $content;
    //     // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行(ここまでで追加されるが、ページは遷移しない)
    //     $todo->save();

    //     // リダイレクト
    //     return redirect()->route('todo.index');
    // }


    // 1. フォームから送信された値を一括で取得
    // 2. 取得した値をModelに一括で代入(※todo.phpも変更)
    public function store(Request $request)
    {
        $inputs = $request->all(); // 変更1
        dd($inputs); // 追記1

        $todo = new Todo();
        $todo->fill($inputs); // 変更2
        $todo->save();

        return redirect()->route('todo.index');
    }

    // (->all()を使用して、フォームから送信された値を個別ではなく一括で取得) ※変更1 追記1
    // (連想配列で取得した値を ->fill()を使用して、Todoインスタンスの各プロパティに一括で代入) ※変更2
    /
}