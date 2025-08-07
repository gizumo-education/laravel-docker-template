<?php

namespace App\Http\Controllers;
use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        // Todoクラスとは？
        $todos = $todo->all();
        return view('todo.index', ['todos' => $todos]);
        // view関数の文法について
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    //引数の左隣にクラスを入れて自動インスタンス化
    {
    $inputs = $request->all();
    /* シングルアローはインスタンスの中のプロパティなどを呼ぶときに使用（$requestはオブジェクト型）
    $requestに何クラスからできたインスタンス化か*/
    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo();
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();
    return redirect()->route('todo.index');
    }
    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
}