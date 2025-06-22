<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\TodoRequest; 

use App\Todo;

class TodoController extends Controller
{   
    private $todo;
    // コンストラクタインジェクション
    public function __construct(Todo $todo)
    {
        
        // $todoプロパティにTodoインスタンスを代入
         $this->todo = $todo; 
    }
    // 一覧のためのデータ取得と表示
    public function index()
    {
        // Todosテーブルのデータを全件取得
        $todos = $this->todo->all();
    //   index.create.phpの返却とそれに対するデータの受け渡し
        return view('todo.index', ['todos' => $todos]); 
    }
    // create.blade.phpの表示
    public function create()
    {
        return view('todo.create');
    }

    // フォーム入力時のデータ保存
    public function store(TodoRequest $request) {
        // 入力値の全件取得
        $inputs = $request->all();
        // 'content'カラムへの一括代入
        $this->todo->fill($inputs);
        // データ保存
        $this->todo->save();
        // リダイレクト
        return redirect()->route('todo.index');
    }

    public function show($id)
    {
    
    // 指定されたIDにおけるレコードのデータ取得
    $todo = $this->todo->find($id);
    // 詳細画面と指定IDのコンテンツを表示
    return view('todo.show', ['todo' => $todo]); 
    }
    // TODO: ルートパラメータを引数に受け取る
    public function edit($id)
    {
        // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($id);
        // TODO: view()を使用して編集画面を表示
        return view('todo.edit', ['todo' => $todo]); 
    }
    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
    {
    // TODO: リクエストされた値を取得
    $inputs = $request->all();
    // TODO: 更新対象のデータを取得
    $todo = $this->todo->fill($inputs);
    // TODO: 更新したい値の代入とUPDATE文の実行
    $todo->save();
    
    return redirect()->route('todo.show', $todo->id);
    }
}

