<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

// use Illuminate\Support\Facades\Auth; //これがないとエラーになる

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

    // 1. フォームから送信された値を一括で取得
    // 2. 取得した値をModelに一括で代入(※todo.phpも変更)
    public function store(Request $request)
    {
        $inputs = $request->all();
        //dd($inputs); // section15の確認

        $todo = new Todo();
        // $todo->user_id = Auth::id();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }

    // (->all()を使用して、フォームから送信された値を個別ではなく一括で取得) ※変更1 追記1
    // (連想配列で取得した値を ->fill()を使用して、Todoインスタンスの各プロパティに一括で代入) ※変更2

}