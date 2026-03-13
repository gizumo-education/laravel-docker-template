<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// 追加
use App\Todo;



class TodoController extends Controller
{

  private $todo; 

  public function __construct(Todo $todo)
    {
      $this->todo = $todo;
    }

   // <ここから>
   public function index()
   {
      $todos = $this->todo->all();
      // dd('Hello World!');
      return view('todo.index', ['todos' => $todos]); //array型
   }
   // <ここまで>

   public function create()
   {
      // TODO: 第1引数を指定
      return view('todo.create'); // 追記
   }

   public function store(Request $request)
   {
      $inputs = $request->all(); // 変更

      $this->todo->fill($inputs); // 変更
      $this->todo->save(); // 変更

      return redirect()->route('todo.index');
   }

   public function show($id)
   {
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
   }



}
