<?php

namespace App\Http\Controllers;

use App\Todo;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //
    public function index()
    {
        $todo = new Todo();
        $todos = $todo->all();
        // dd($todos);

        return view('todo.index', ['todos' => $todos]);
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');

        return view('todo.create');
    }

    public function store(Request $request)
    {
        // dd('新規作成のルート実行！');

        $inputs = $request->all();
        // dd($inputs);

        $todo = new Todo();
        // $todo->content = $inputs['content'];

        // dd($todo);
        // dd($todo->fill($inputs));

        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');

        // dd($content);
    }

    public function show($id)
    {
        // dd($id);

        $model = new Todo();
        $todo = $model->find($id);

        // dd($todo);

        return view('todo.show', ['todo' => $todo]);
    }

}
