<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加 2
use App\Todo;

class TodoController extends Controller
{
    //追記 1
    public function index()
    {
        // 追加 2
        $todo = new Todo();

        // 追加 3
        $todos = $todo->all();

        // 追加 4
        // dd($todos); //「dd」関数を使って、デバッグ（プログラムの確認）をする (黒い画面で表示される)

        // dd('Hello World!'); //黒い画面に緑色の文字で"Hello World!"が表示される。(http://localhost:8080/todo)
        return view('todo.index'); // 上記のを修正
    }
}
