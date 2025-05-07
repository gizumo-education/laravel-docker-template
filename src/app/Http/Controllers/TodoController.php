<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;


use App\Todo;

class TodoController extends Controller
{
    private $todo; 

    public function __construct(Todo $todoInstance)
    {
        $this->todo = $todoInstance;
    }

    public function index() //初期画面
    {
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]); 
    }
    //class Todo extends Modelのインスタンス化

    public function create() //新規作成画面
    {

        return view('todo.create' );
    }

    public function store(Request $request) 
    {
        $inputs = $request->all();
        $this->todo->fill($inputs);
        $this->todo->save();
        return redirect()->route('todo.index');
    }//storeメソッドの中身を調べる

    public function show($id)//どこのidのことか
    {
        $selectedTodo = $this->todo->find($id);
       //dd($todo);
       return view('todo.show', ['todo' => $selectedTodo]); //なんのキーか
    }

    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);
    
        return view('todo.edit', ['todo' => $todo]); 
    }

    public function update(Request $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
        // TODO: リクエストされた値を取得
        $inputs = $request->all();
        
        $todo = $this->todo->find($id);
        // TODO: 更新したい値の代入とUPDATE文の実行
        $todo->fill($inputs)->save();
        return redirect()->route('todo.show', $todo->id);
    }
}





// class TodoController extends Controller
// {
//     private $todo; // 追記

//     public function __construct(Todo $todo)
//     {
//         $this->todo = $todo; // 追記
//     }
// }見直すsection１７

