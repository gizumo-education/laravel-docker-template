<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;
use App\Http\Requests\TodoRequest;

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

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        //dd($todo);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        //dd($inputs);
        $todo = $this->todo->find($id);
        //dd($todo);
        $todo->fill($inputs)->save();

        return redirect()->route('todo.show', $todo->id);
    }

    public function create()
    {
        return view('todo.create');
    }

    public function store(TodoRequest $request)
    {
        $inputs = $request->all();
        //dd($inputs);
        //$content = $request->input('content');
        //dd($content);
        //$todo = $this->todo;
        //$todo->content = $inputs['content'];
        //$todo->fill($inputs);
        $this->todo->fill($inputs);
        $this->todo->save();
        
        return redirect()->route('todo.index');
    }

    public function delete($id)
    {
        //dd('削除のルート実行！');
        $todo = $this->todo->find($id);
        //dd($todo);
        $todo->delete();
        return redirect()->route('todo.index');
    }
} 
