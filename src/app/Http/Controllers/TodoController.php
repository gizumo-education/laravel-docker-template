<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{

    private $todo; //クラスプロパティ

    public function index()
    {
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);


    }

    public function create()
    {
        //TODO; 第一引数を指定
        return view('todo.create');
    }
    
    public function store(Request $request) // 追記
    {
        $inputs = $request->all();
    
        $this->todo->fill($inputs);
        $this->todo->save();
        
        return redirect()->route('todo.index');

    }

    public function show($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);

    }
    
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function edit($id) //指定のレコードの編集をしたいので、引数には$idを渡す。
    {
        $todo = new todo(); //インスタンス化
        $todo = $todo->find($id); //編集したい指定のレコードをfind($id)で持ってくる。それを
        
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        return view('todo.edit', ['todo' => $todo]);

    }

}
