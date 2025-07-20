<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

// ↑Todoモデルを使用すると書かれている

class TodoController extends Controller
{
    
    public function index()
    {

        $todo = new Todo();
        // Todoモデルをインスタンス化
        $todos = $todo->all();
        
        return view('todo.index', ['todos' => $todos]);
        // todoの配下にあるindex.blade.phpを表示
        // キーはtodo.indexで使用する変数名、バリューはコントローラーの値を指定している
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');
        return view('todo.create');

    }

    public function store(Request $request)
    {
        $inputs = $request->all();

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
