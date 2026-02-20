<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加
use App\Todo;

class TodoController extends Controller
{
  // <ここから>
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
      // dd('Hello World!');
        return view('todo.index', ['todos' => $todos]);
    }
    // <ここまで>
}
