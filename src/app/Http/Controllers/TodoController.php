<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    // 追加
    public function create()
    {
        return view('todo.create');
    }
        // 追加
    public function store(Request $request)
    {
        dd($request->all());
    }
}