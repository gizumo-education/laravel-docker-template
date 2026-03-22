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

        return view('todo.index', ['todos' => $todos]); //第一引数と第二引数を変更した場合どこを変えれば実行されるのか 　　//課題
    
    }
    public function create() //新規作成
    {
        return view('todo.create');
    }
    public function store(Request $request)
{
    $inputs = $request->all();//フォームから送信されたtodoデータの取得　　//課題//all();の引数　

    $todo = new Todo();
    $todo->fill($inputs); //課題 fillメソッドの処理
    $todo->save();
    return redirect()->route('todo.index'); //viewではない理由は？ 更新されたデータの取得されない　
}
}
