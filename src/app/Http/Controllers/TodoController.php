<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todoList = $todo->all();//todosテーブル内のcontentカラムに登録されている文字列をオールメソッドですべて取得してcollectionメソッドでは配列として並べて取得している
        
        return view('todo.index',['todoList' => $todoList]);//todoList配列をtodo.indexに渡している。
    }

    public function create()
{
    return view('todo.create'); //.pathになっていて.でつなげていくたびにディレクトリを深く探してくれる　簡単に言うとcd todo/create の/の役割を担ってる
}

public function store(Request $request) //メソッドインジェクションでインスタンス化している　クラスと依存関係がなくなる
{
        $inputs = $request->all(); //フォームで入れられた入力値だけが入ってる　トークンと文字列
        
        $todo = new Todo(); 
        $todo->fill($inputs); 
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