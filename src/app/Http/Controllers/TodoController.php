<?php

namespace App\Http\Controllers;
// 追加
use App\Todo;
// 追記
use Illuminate\Http\Request;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    // 一覧画面の表示
    public function index()
    {
        // TodoControllerでTodoModelを使えるように、インスタンス化
        // $todo = new Todo();
        // todosテーブルから全てのレコードを取得することができる
        // $todoList = $todo->all();
        $todoList = $this->todo->all();

        // view関数を使って取得したデータをHTMLファイルに渡す
        // 第1引数：表示したいbladeファイルを指定
        // 第2引数：渡したいデータを連想配列で指定
        return view('todo.index', ['todoList' => $todoList]);
    }

    public function create()
    {
        return view('todo.create');
    }

    // 新規作成機能
    // メソッドインジェクション：メソッドの引数の左側にクラス名を書くことで、インスタンス化が自動で行われる
    public function store(Request $request)
    {
        // フォームから送信されたToDoの内容を取得
        // 値を取得したい入力欄のname属性を指定
        // $content = $request->input('content');
        // -------------------------------------------
        // フォームから送信された値を個別ではなく一括で取得する
        $inputs = $request->all();


        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();


        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        // $todo->content = $content;
        // $todo->content = $inputs['content'];
        // ----------------------------------------------------
        // Todoインスタンスの各プロパティに一括で代入
        // $todo->fill($inputs);
        $this->todo->fill($inputs);


        // 3. Todoインスタンスの->save()を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        // $todo->save();
        $this->todo->save();

        // 一覧画面にリダイレクトする処理
        return redirect()->route('todo.index');// 追記
    }

    public function show($id)
    {
        // $model = new Todo();
        // $todo = $model->find($id);
        $todo = $this->todo->find($id);

        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);

        return view('todo.edit', ['todo' => $todo]);
    }
}