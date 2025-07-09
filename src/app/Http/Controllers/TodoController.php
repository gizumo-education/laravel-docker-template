<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index',['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        // $todo = new Todo();
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        // $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        // $todo->save();

        $this->todo->fill($inputs);
        $this->todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        // $model = new Todo();
        // $todo = $model->find($id);
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
    
    public function edit($id)
    {
        $todo =$this->todo->find($id);
        return view('todo.edit',['todo' =>$todo]);
    }
}

