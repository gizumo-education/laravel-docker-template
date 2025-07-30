<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        $todo = new Todo();  // TodoControllerでTodoModelを使えるようにする
        $todos = $todo->all();
        // dd($todos);  → todosテーブルのレコードを全件取得できているかデバッグする
        
        // return view('todo.index', ['helloWorld' => 'hello World!']);  // 取得したデータをHTML(→ blade)ファイルに渡す
        return view('todo.index', ['todos' => $todos]);
        // dd('Hello World!');
    }

    public function create()
    {
    // dd('新規作成画面のルート実行！');
    return view('todo.create');
    }
}
