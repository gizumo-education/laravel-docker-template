<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //private $todo;//TodoControllerのクラスプロパティ

    //public function __construct(Todo $todo)//Todoクラスのインスタンスを生成し、$todoという変数に代入
    //{
        //$this->todo = $todo;
    //}

    public function index()
    {
        $todos = $this->todo->all(); //$thisでインスタンス化されたオブジェクトを全件呼び出し$todosに格納
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

        $this->todo->fill($inputs);//指定した連想配列を一括代入
        $this->todo->save();//save()を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index');//処理が終われば、index.phpのページに遷移される。
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        
        return view('todo.show', ['todo' => $todo]);
    }
}