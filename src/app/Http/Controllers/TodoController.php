<?php

namespace App\Http\Controllers;

//インポート
use App\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    //一覧画面表示
    public function index()
    {
        //Todoクラスをインスタンス化
        $todo = new Todo();
        //TodoModelをインスタンス化・todosテーブルの全件取得
        $todos = $todo->all();

        //一覧画面を表示・todosテーブルのレコード情報を渡す
        return view('todo.index', ['todos' => $todos]);
    }

    //新規作成画面表示
    public function create()
    {
        //新規作成画面を表示
        return view('todo.create');
    }

    //新規作成機能
    public function store(Request $request)
    {
        //Requestのデータを代入
        $inputs = $request->all();
        
        //Todoクラスをインスタンス化
        $todo = new Todo();
        //入力した値を代入
        $todo->fill($inputs);
        //DBにデータを保存
        $todo->save();
        
        //一覧画面にリダイレクト
        return redirect()->route('todo.index');

    }
}
