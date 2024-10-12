<?php

namespace App\Http\Controllers;
use App\Todo; 
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        // dd($todos);

         return view('todo.index', ['todos' => $todos]); // 修正
    }
    public function create()
    {
        // dd('新規作成画面のルート実行成功');
        return view('todo.create',);
    }
    public function store(Request $request)
{
    $inputs = $request->all();
    // dd($input);

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo(); 
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->fill($inputs);
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();

    return redirect()-> route('todo.index');
}
public function show($id)
{
    // dd($id);
    $model = new Todo();
    $todo = $model->find($id);

    return view('todo.show', ['todo' => $todo]);
}



}
