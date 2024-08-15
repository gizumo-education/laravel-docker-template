<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Todo;

class TodoController extends Controller
{
    public function index()
    {

        $todo = new Todo();


        $todos = $todo->all();


        return view('todo.index', ['todos' => $todos]);

    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');
        // TODO: 第1引数を指定
        return view('todo.create'); // 追記(todoファイルの中にある、create.blade.phpを指定)
    }
}
