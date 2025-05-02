<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Todo;

class TodoController extends Controller
{
    private $todo; 

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index() //初期画面
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]); 
    }
    //class Todo extends Modelのインスタンス化

    public function create() //新規作成画面
    {

        return view('todo.create' );
    }

    public function store(Request $request) 
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }//storeメソッドの中身を調べる

    public function show($id)
    {
        $todo = $this->todo->find($id);
       //dd($todo);
       return view('todo.show', ['todo' => $todo]); 
    }
}



// class TodoController extends Controller
// {
//     private $todo; // 追記

//     public function __construct(Todo $todo)
//     {
//         $this->todo = $todo; // 追記
//     }
// }見直す
