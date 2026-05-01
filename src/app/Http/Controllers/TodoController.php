<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request\TodoRequest; 
// 以下Laravel②
use App\Http\Requests\TodoRequest;
use App\Todo;

class TodoController extends Controller
{
    private $todo; //Lalavel②

    public function index()
    {
        // $todo = new Todo();
        // $todos = $todo->all();
        // 以下に変更  Laravel②
        $todos = $this->todo->all();
        
        return view('todo.index',  ['todos' => $todos]);
        
    }

    public function create()
    {
        return view('todo.create');
    }
    // Laravel①ではRequest 　↓
    public function store(TodoRequest $request)
    {
    $inputs = $request->all();

    // $todo = new Todo(); 
    // $todo->fill($inputs);
    // $todo->save();
    $this->todo->fill($inputs); // 変更 Laravel②
    $this->todo->save(); // 変更 Laravel②

    return redirect()->route('todo.index');
    }

// Lalavel②
    public function show($id)
    {
    // $model = new Todo();
    // $todo = $model->find($id);
    // 以下に変更
    $todo = $this->todo->find($id);

    return view('todo.show', ['todo' => $todo]);
    }

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
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
        $todo = $this->todo->find($id);
    // TODO: 更新したい値の代入とUPDATE文の実行
        $todo-> fill($inputs)->save();

         return redirect()->route('todo.show', $todo->id); // 追記
    }

}