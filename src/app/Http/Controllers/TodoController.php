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
    $inputs = $request->all(); 
    dd($inputs);
    $todo = new Todo(); 
    $todo->fill($inputs);
    $todo->save();

   return redirect()->route('todo.index');  // 追記
}
}



