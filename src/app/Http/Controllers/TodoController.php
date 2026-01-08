<?php

namespace App\Http\Controllers;  //名前空間の宣言 関連するクラスやインターフェイス、関数、定数をひとまとめにして扱うもの

use Illuminate\Http\Request;

use App\Todo;  //appディレクトリのTodoModel Todoクラスをインポート

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
        return view('todo.index', ['todos' => $todos]);  //bladeファイル(index)にtodosテーブルのレコード情報を渡す→todos変数としてデータを表示
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)  //引数の()の中でRequestクラスをインスタンス化して$requestという名前で受け取る
    {
        $inputs = $request->all();    //フォームから送信された値を一括で配列として返す
        
        $this->todo->fill($inputs);  //Todoインスタンス(Model)の各プロパティに保存したい値(取得した値)を一括代入
        $this->todo->save();         //Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
}
