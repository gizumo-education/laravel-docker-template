<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo; //Lalavel②

    public function index()
    {
        // $todo = new Todo();
        // $todos = $todo->all();
        // 以下に変更  Laravel②
        $todos = $this->todo->all();
        
        return view('todo.index',  ['todos' => $todos]);
        
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
{
    $inputs = $request->all();

    // $todo = new Todo(); 
    // $todo->fill($inputs);
    // $todo->save();
    $this->todo->fill($inputs); // 変更 Laravel②
    $this->todo->save(); // 変更 Laravel②

    return redirect()->route('todo.index');
}

// Lalavel②
public function show($id)
{
    // $model = new Todo();
    // $todo = $model->find($id);
    // 以下に変更
    $todo = $this->todo->find($id);

    return view('todo.show', ['todo' => $todo]);
}

public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
}