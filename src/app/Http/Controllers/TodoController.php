<?php

namespace App\Http\Controllers;

use App\Todo;
// TodoモデルをControllerにて呼び出し、インスタンス化/
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    // 追加
    public function __construct(Todo $todo)
    // Todo $todoでルートから呼び出されて内部でインスタンス化
    {
        $this->todo = $todo;
    }
    
    public function create()
    {
        return view('todo.create');
    }

    public function store(Request $request)
    {
        $inputs = $request->all();
        // Requestクラスのall()を使用し、フォームで入力された値を連想配列に変換して取得
        $this->todo->fill($inputs);
        dd($this->todo);
        // 連想配列を渡しその情報を$this->todoに保存
        $this->todo->save();
    }

}
