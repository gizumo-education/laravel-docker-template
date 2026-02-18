<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
  // <ここから>
    public function index()
    {
        // dd('Hello World!');
        return view('todo.index');
    }
    // <ここまで>
}
