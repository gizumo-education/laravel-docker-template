<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Todo;

class TodoController extends Controller
{
    public function index() //初期画面
    {
        $todo = new Todo();
        $todos = $todo->all();
        return view('todo.index', ['todos' => $todos]); 
    }
    //class Todo extends Modelのインスタンス化

    public function create() //新規作成画面
    {

        return view('todo.create' );
    }

    public function store(Request $request) //クラスを引数に指定
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
       //dd($todo);
       return view('todo.show', ['todo' => $todo]); 
    }
}//storeメソッドの中身を調べる


