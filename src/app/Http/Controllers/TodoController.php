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
    public function index() //一覧表示
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }
    public function create() //新規作成
    {
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
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    } 
    public function edit($id) //編集
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
   }
    public function update(TodoRequest $request, $id) //更新
    {
       $inputs = $request->all();
       $todo = $this->todo->find($id);
       $todo->fill($inputs)->save();
       return redirect()->route('todo.show', $todo->id);
    }
    public function delete($id)
    {
    $todo = $this->todo->find($id);
    $todo->delete();
    return redirect()->route('todo.index');
    }
}
