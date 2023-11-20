<?php

namespace App\Http\Controllers;

use App\Todo;;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    private $todo;


    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function index()
    {
        $todos = $this->todo->all(); //all():DBとの媒介のような役割を担う
        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        return view('todo.create');
    }


    public function store(Request $request)
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id); //インスタンスの実体として$this->todoのTodoと$todoのTodoは別物
        return view('todo.show', ['todo' => $todo]);
    }
}
