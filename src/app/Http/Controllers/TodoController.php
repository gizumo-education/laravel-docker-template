<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    //追記
    public function index()
    {
        // dd('Hello World!'); //黒い画面に緑色の文字で"Hello World!"が表示される。(http://localhost:8080/todo)
        return view('todo.index'); // 上記のを修正
    }
}
