<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;


class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        //Todoインスタンスを作成し$todoにセット

        $todos = $todo->all();
        //Todoクラスのallメソッドを実行
        //TodoクラスはApp\Todo.phpにて定義されている

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        //入力欄のname属性 => 入力欄のvalue属性（入力値）の形式で連想配列を返す

        $todo = new Todo();
        $todo->fill($inputs);
        //$todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して代入
        
        $todo->save();

        return redirect()->route('todo.index');
    }
}
