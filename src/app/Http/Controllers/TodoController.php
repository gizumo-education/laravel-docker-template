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
    return view('todo.index', ['todos' => $todos]);
    }
    public function create()
    {
        return view('todo.create');
    }
    public function store(Request $request)
    //引数の左隣にクラスを入れて自動インスタンス化
    {
    $inputs = $request->all();
    /* シングルアローはインスタンスの中のプロパティなどを呼ぶときに使用（$requestはオブジェクト型）
    $requestに何クラスからできたインスタンス化か*/
    $this->todo->fill($inputs);
    $this->todo->save();
    return redirect()->route('todo.index');
    }
    public function show($id)
    {
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
    }
}