<?php

namespace App\Http\Controllers;  //名前空間の宣言 関連するクラスやインターフェイス、関数、定数をひとまとめにして扱うもの

use Illuminate\Http\Request;

use App\Todo;  //appディレクトリのTodoModel Todoクラスをインポート

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();  //TodoControllerでTodoModelを使えるようにインスタンス化
        $todos = $todo->all();  //DBからtodosテーブルのレコード(Todoインスタンス)を全件取得して$todosに代入
        //allメソッドの返り値はIlluminate\Database\Eloquent\Collectionクラスのインスタンス
        
        return view('todo.index', ['todos' => $todos]);  //bladeファイル(index)にtodosテーブルのレコード情報を渡す→todos変数としてデータを表示
    }

    public function create()
    {
        return view('todo.create');
        //todo.create(bladeファイル/html)を画面に表示させる
    }

    public function store(Request $request)  //引数の()の中でRequestクラスをインスタンス化して$requestという名前で受け取る
    {
        $inputs = $request->all();    //フォームから送信された値を一括で配列として返す
        
        $todo = new Todo();    //todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo->fill($inputs);  //Todoインスタンス(Model)の各プロパティに保存したい値(取得した値)を一括代入
        $todo->save();         //Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index');  //一覧ページにリダイレクト
    }
}
