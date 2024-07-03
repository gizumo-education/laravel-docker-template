<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;

use App\Http\Controllers\Controller;

class TodoController extends Controller
{
    private $todo;

    // TodoControllerのインスタンスを作成するときに、Todoモデルを受け取り、プロパティに設定する
    //モデルのひな型を作成
    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // Todo作成用のフォームを表示する
    public function create()
    {
        return view('todo.create');
    }

    // フォームから送信されたTodoを保存する
    public function store(TodoRequest $request)//型指定してる
    {
        $inputs = $request->all();
        $this->todo->fill($inputs); //fillメソッドですべての入力データをモデルに設定（ただ更新できるのはtodo.phpでホワイトリストにしているもののみ）
        $this->todo->save(); //モデルの状態をデータベースに保存している　インサート関数 
        return redirect()->route('todo.index');
    }

    // すべてのTodoを取得して、一覧を表示する
    public function index()
    {
        $todos = $this->todo->all(); //Select文　Collectionクラス 配列を操作ができる
        return view('todo.index', ['todos' => $todos]); //第一引数は対象のBladeファイル　第二引数はそのBladeファイルで呼び出せる変数
        //dd($todos); 
    }

    // 特定のTodoを表示する
    public function show($id)
    {
        $todo = $this->todo->find($id); //find()で参照している　Serect文
        return view('todo.show', ['todo' => $todo]);
    }

    // 特定のTodoを編集するためのフォームを表示する
    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }

    // フォームから送信されたTodoを更新する
    public function update(TodoRequest $request, $id) 
    {
        // フォームから送信されたデータを取得
        $inputs = $request->all();
        
        // 指定されたIDに対応するToDoレコードをデータベースから検索
        $todo = $this->todo->find($id);
        
        // 取得したデータでToDoレコードの属性を更新
        $todo->fill($inputs);
        
        // 更新したToDoレコードをデータベースに保存
        $todo->save(); // Update関数
        
        // 更新後のToDoの詳細ページにリダイレクト
        return redirect()->route('todo.show', $todo->id);
    }
    
    // 論理削除
    public function delete($id)
    {
        $todo = $this->todo->find($id); //指定のIDのTodoを取得
        $todo->delete(); // DELETE文を実行してレコードを削除
        return redirect()->route('todo.index'); //ホームに戻る
    }

    //完了のリクエスト
    public function complete($id) 
    {
        $todo = $this->todo->find($id);
        $todo->is_completed = !$todo->is_completed;
        $todo->save();
        return response()->json(['is_completed' => $todo->is_completed]);
    }
}
