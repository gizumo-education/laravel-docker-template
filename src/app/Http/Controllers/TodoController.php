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
        //TODO; 第一引数を指定
        return view('todo.create');
    }
    
    public function store(Request $request) // 追記
    {
        $inputs = $request->all();
    
            //
        $todo = new Todo(); // 1. 
        $todo->fill($inputs); // 2.
        $todo->save(); // 3. 

        return redirect()->route('todo.index'); //

    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $model->find($id);

        return view('todo.show', ['todo' => $todo]);
    }
    
}
