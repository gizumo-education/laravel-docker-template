<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest; // 追加
use App\Todo;

// use Illuminate\Http\Request;

// // 追加
// use App\Todo;



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

   public function store(TodoRequest $request)
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

   public function edit($id)
{
    // TODO: 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
    $todo = $this->todo->find($id);
    return view('todo.edit', ['todo' => $todo]);
}

   public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
   {
      // TODO: リクエストされた値を取得
      $inputs = $request->all();
      $todo = $this->todo->find($id);
      $todo->fill($inputs)->save();

      return redirect()->route('todo.show', $todo->id); // 追記

   }

}
