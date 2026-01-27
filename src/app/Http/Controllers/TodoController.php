<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all(); //todosテーブルから全てのレコードを取得
        // [
        //     ["id" => 1, ...],
        //     ["id" => 1, ...],
        //     ...
        // ]
        // dd($todos);
        return view('todo.index', ['todos' => $todos]); //変数名を 'todos' と定義し、todosテーブルのすべてのレコードをindexに渡す。第二引数は連想配列
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');

        return view('todo.create'); //create.blade.php（ToDo入力画面）を表示させる。
    }

    public function store(Request $request)
    {
        // dd('新規作成のルート実行！');

        $inputs = $request->all(); //送られてきた入力データを連想配列として一括取得し、変数 $inputs に代入
        // dd($inputs);

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->fill($inputs);
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id); //find()メソッドにより指定のIDのデータを取得
        // dd($todo);

        return view('todo.show', ['todo' => $todo]);
    }
}

