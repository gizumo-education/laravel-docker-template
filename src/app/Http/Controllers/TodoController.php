<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //追加
    private $todo;
    //todoモデルをcontrollerでインスタンス化
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }
    //コンストラクタの引数(Todo $todo)は、
    //$todo = new Todo();
    //$this->todo = $todo; を省略したもの
    //クラス内で別クラスを利用するときにクラス内で直接newせず、外部から引数で渡してあげて利用する

    public function index()
    {
        $todos = $this->todo->all();
        //dd($todos);
        return view('todo.index', ['todos' => $todos]);
        //view()第1引数は対象のBladeファイル、第2引数は、そのBlade内で利用できる変数を宣言
        //[Blade内での変数名 => 代入したい値]
        //todosという名前の変数に$todosの中身を入れて、todo/index.blade.phpで使えるようにします
        //下記でもOK
        //view('todo.index', ['todos' => $this->todo->all()])
    }

    //追加
    public function create()
    {
        return view('todo.create');
    }

    //追加
    public function store(TodoRequest $request)
    {
        //dd($request->all());
        //dd($this->todo);
        $inputs = $request->all();
        //$request -> all()で['カラム名' => '保存したい値']という連想配列を作り出す
        $this->todo->fill($inputs);
        //fill()の引数の中身を連想配列で渡すと、$this->todoに保存される
        $this->todo->save();
        //ORM(Eloquent)でDBにINSERT文を作成保存している

        //fill()を使用しない保存処理
        //$content = $request->input('content');// 焼肉
        //$this->todo->content = $content;
        //$this->todo->save();

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        //dd($id);
        $todo = $this->todo->find($id);
        //find()は引数にした、そのモデルが対応するテーブルのプライマリーキーを引数に受け取り、
        //対象レコード取得する

        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    public function update(TodoRequest $request, $id)
    {
        $inputs = $request->all();
        $todo = $this->todo->find($id);
        $todo->fill($inputs);
        $todo->save();
        //dd($this->todo->id, $todo->id);
        return redirect()->route('todo.show', $todo->id);
    }
}