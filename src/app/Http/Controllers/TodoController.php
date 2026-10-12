<?php
// クラス宣言・事前準備（インポート部分）
// このファイルが「App\Http\Controllersというフォルダ配下にある」位置情報定義
namespace App\Http\Controllers;
// データベースのtodosテーブルのやり取りを担当するtodoモデルを呼び出して使う宣言
use App\Http\Requests\TodoRequest;
// フォームから送信されてきたデータ（リクエストデータ）を取り扱うための **Request** **クラス**を読み込む
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    // indexメソッド一覧表示処理
     public function index()
    {
        // モデルの実体（インスタンス）を作成
        $todos = $this->todo->all();
        return view('todo.index', ['todos' => $todos]);
    }
    
    public function create()
    {
        // Todoを新規追加するための入力フォーム画面（`resources/views/todo/create.blade.php`）を表示
        return view('todo.create'); 
    }

    public function edit($id)
    {
    // URLから受け取ったIDでToDoを1件取得
    $todo = Todo::find($id);
    // 編集画面に渡す
    return view('todo.edit', ['todo' => $todo]);
}



//Collectionの便利なメソッドを利用できる状態　複数のデータをまとめ、便利なメソッドで操作できる仕組み
    public function store(TodoRequest $request)
{
    // フォームで送信されたすべての入力値を連想配列　検索・絞り込み・並び替えなどのメソッドが用意
    $inputs = $request->all(); 

    // デバッグ用の命令　処理を一時停止

    $this->todo->fill($inputs); // 変更
    $this->todo->save();

    // 保存が完了したら、先ほどルーティングで名前をつけた **todo.index** **（一覧画面）へ自動的に画面を移動（リダイレクト**
    return redirect()->route('todo.index');
}

public function show($id)
{
    $todo = $this->todo->find($id);
    return view('todo.show', ['todo' => $todo]);
}

 public function __construct(Todo $todo)
{
        $this->todo = $todo;
}

    public function update(TodoRequest $request, $id) // 第1引数: リクエスト情報の取得　第2引数: ルートパラメータの取得
{
    // TODO: リクエストされた値を取得
    $inputs = $request->all();
    $todo = $this->todo->find($id);
    // TODO: 更新したい値の代入とUPDATE文の実行
    $todo->fill($inputs);
    $todo->save();
    return redirect()->route('todo.show', $todo->id); 
}

    public function delete($id)
{
    $todo = $this->todo->find($id);
    $todo->delete();
    return redirect()->route('todo.index');
}
}

