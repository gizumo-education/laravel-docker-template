<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class TodoController extends Controller
{
    private $todo; //TodoControllerのクラスプロパティ（コンストラクタインジェクション）

    public function __construct(Todo $todo) //引数はTodoクラスのインスタンスを生成し、$todo変数に代入
    {
        $this->todo = $todo; //コンストラクタインジェクションで生成したTodoクラスのインスタンスをプロパティに代入
    }

    public function index()
    {
        //$todo = new Todo();
        //$todos = $todo->all(); //todosテーブルから全てのレコードを取得
        // [
        //     ["id" => 1, ...],
        //     ["id" => 1, ...],
        //     ...
        // ]
        // dd($todos); 配列型array
        $todos = $this->todo->all();

        return view('todo.index', ['todos' => $todos]); //変数名を 'todos' と定義し、todosテーブルのすべてのレコードをindexに渡す。第二引数は連想配列
    }

    public function create()
    {
        // dd('新規作成画面のルート実行！');

        return view('todo.create'); //create.blade.php（ToDo入力画面）を表示させる。
    }

    public function store(Request $request) //$requestにRequestクラスのインスタンスを代入。 メソッドインジェクション…メソッドの引数の左側にクラス名を書くことで、インスタンス化が自動で行われる
    {
        // dd('新規作成のルート実行！');

        $inputs = $request->all(); //送られてきた入力データを連想配列として一括取得し、変数 $inputs に代入
        // dd($inputs); 連想配列

        $this->todo->fill($inputs); //Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $this->todo->save(); //Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行

        return redirect()->route('todo.index');
    }

    public function show($id)
    {
        $todo = $this->todo->find($id); //find()メソッドにより指定のIDのデータを取得 //$this->todoはTodoControllerのクラスプロパティでTodoクラスのインスタンスが代入
        return view('todo.show', ['todo' => $todo]);
    }

    public function edit($id)
    {
        $todo = $this->todo->find($id);
        return view('todo.edit', ['todo' => $todo]);
    }
}

