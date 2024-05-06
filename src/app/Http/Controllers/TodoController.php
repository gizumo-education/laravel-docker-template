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

    // 一番最初に処理
    // Todo $todo：Todo.phpのTodoオブジェクトが入っている
    // $this；TodoControllerのオブジェクト
    
    public function index()
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todo' => $todos]);
    }
    
    // $todos オブジェクト
    
    public function create()
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
    
    // fill();　配列を使ってモデルを生成、更新するメソッド
    // $inputs 配列　$request->all()メソッドで受け取ったデータを['カラム名'=>'保存したい値']の連想配列にしたものが格納されている
    // $this->todo->fill($inputs)　$inputsを配列にしてモデルを生成更新している
    // 保存する
    // controller->Model->Databaseの順に処理を送っている

    public function show($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.show', ['todo' => $todo]);
    }
    
    // $todo App/Todo オブジェクト $this->todo->find($id);で取得した$idのデータを$todoに格納している？
    // 'todo.show'にtodoという変数名で$todoを連想配列で返す
    // $id id
    // find() 指定した要素を１個だけ取得したい時に使用　$idを取得したいからfind(id)
    
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }
    
    // function showと同じ
    
    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        return redirect()->route('todo.show', $todo->id);
    }

    // $request　TodoRequest.phpのTodoRequestのオブジェクトが入っている
    // $todo->fill($inputs)　$inputsを配列にしてモデルを生成更新している
    // $todo->save() 72行目で更新したものをデータベースに送る処理をしている

    public function delete($id)
    {
        $todo = $this->todo->find($id);
        $todo->delete();
        return redirect()->route('todo.index');
    }







}
