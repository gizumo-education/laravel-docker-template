<?php

namespace App\Http\Controllers;
use App\Todo; 
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
        $todos = $this->todo->all();
         return view('todo.index', ['todos' => $todos]); // 修正
    }
    public function create()
    {
        // dd('新規作成画面のルート実行成功');
        return view('todo.create',);
    }
    public function store(Request $request)
{
    $inputs = $request->all();

    $todo= $this->todo->fill($inputs);
    $todo->save();
    
    return redirect()-> route('todo.index');
}
public function show($id)
{
    // dd($id);
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}



}
