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
        //レコード1つずつに対応するtodosインスタンスがcollectionインスタンスの中に入る
        //collectionは配列操作に特化したクラス

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        //フォームの値を取得
        //フォームのname属性をキーに、フォームに入力した値をバリューとして連想配列を返す

        $todo = new Todo();
        $todo->fill($inputs);
        //$inputsに格納しているフォームの値に対応した連想配列をTodoインスタンスの各プロパティに一括で代入

        $todo->save();
        //オブジェクトの状態をDBに保存（INSERT文が実行される）

        return redirect()->route('todo.index');
        //ブラウザを再読み込みしたときもう一度DBの変更処理が走らないよう、redirect()で次のページに移る
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);

        return view('todo.show', ['todo' => $todo]);
    }
}
