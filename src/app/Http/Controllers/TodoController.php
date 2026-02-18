<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    //
        public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        
        return view('todo.index', ['todos' => $todos]);
    }
        public function create()
    {
        // TODO: 第1引数を指定
        return view('todo.create'); 
    }
    

    public function store(Request $request) // 追記
{
    $content = $request->input('content'); // 追記
    $todo = new Todo(); 
    $todo->content = $content;
    $todo->save();

   return redirect()->route('todo.index');  // 追記
}
}



