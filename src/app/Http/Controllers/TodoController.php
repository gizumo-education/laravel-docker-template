<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo;  //ここのクラス内でのみ使えるプロパティ

    public function __construct(Todo $todo)
    {
        $this->todo = $todo; 
    }

    public function index()
    {
        $todos = $this->todo->all();
        
        return view('todo.index',['todos' => $todos]);//todoList配列をtodo.indexに渡している。
    }

    public function create()
{
    return view('todo.create'); //.pathになっていて.でつなげていくたびにディレクトリを深く探してくれる　簡単に言うとcd todo/create の/の役割を担ってる
}

public function store(Request $request) //メソッドインジェクションでインスタンス化している　クラスと依存関係がなくなる
{
        $inputs = $request->all(); //フォームで入れられた入力値だけが入ってる　トークンと文字列
        
        $this->todo->fill($inputs); 
        $this->todo->save();

        return redirect()->route('todo.index'); 
}
public function show($id)
{
    $todo = $this->todo->find($id);

    return view('todo.show', ['todo' => $todo]);
}
}