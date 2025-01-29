<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo(); //TodoModelのインスタンスを呼び出し
        $todos = $todo->all(); //$todoに格納されている配列を全て呼び出す
        //第一引数で指定し、第二引数に渡したいデータを連想配列の形で渡す
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    { //インスタンス化が自動で行われる。メソッドインジェクション
        $inputs = $request->all();//フォームから送信された値を個別ではなく一括で取得

        $todo = new Todo();//TodoModelのインスタンスを呼び出し
        $todo->fill($inputs);//指定した連想配列を一括代入
        $todo->save();//save()を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index');//処理が終われば、index.phpのページに遷移される。
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }
}