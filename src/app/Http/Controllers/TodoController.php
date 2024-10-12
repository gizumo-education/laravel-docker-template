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
}
