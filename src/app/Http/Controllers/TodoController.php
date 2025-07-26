<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;


class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
        
    }
    
    public function index()
    {
        
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');
        return view('todo.create');

    }

    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $model = new Todo();
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = Todo::find($id);

        return view('todo.edit', ['todo' => $todo]);
        dd($todo);
    }

    public function update(TodoRequest $request, $id) 
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);   
    }

    public function delete($id)
    {
        $todo = Todo::findOrFail($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }

}
