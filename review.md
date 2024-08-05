# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
レコードを全件取得する処理を行っている。
SELECT * FROM ‘todos’;というSQL文を、記述せずにDB操作を行っている。

### Todoモデルのallメソッドの返り値は何か
Collectionインスタンス。

### 配列の代わりにCollectionクラスを使用するメリットは
map、filter、reduce、pluck、groupByなどのメソッドが標準で準備されており、可読性の高いコードが書けることや、求めたKeyが取得できなかったなど時、nullを返す（エラーメッセージを準備しなくていい場面もあり、そういう時に役立つ）ことが挙げられる。

### view関数の第1・第2引数の指定と何をしているか
第一引数で画面に表示したいbladeファイルを指定し、
第二引数は[blade内での変数名 => 代入したい値]と書くことで、連想配列の形でデータを渡すことができる。

例：return view('todo.index', ['todos' => $todos]);
⇒todoファイル内にあるindex.blade.phpを画面に表示するよう指定し、blade.index.phpにある$todosにはTodocontroller.phpの処理で定義された$todosを代入して渡すよう記述している。

### index.blade.phpの$todoList・$todoに代入されているものは何か
$todoには、$todosの配列データ一つ一つがforeachによって代入されている。（また、現時点で$todoListはまだ定義されていない。）

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
フォームから入力されたデータを連想配列の形で取得している。
    public function store(Request $request)
    {
        $inputs = $request->all();

        $todo = new Todo();
        $todo->fill($inputs);
        $todo->save();

        return redirect()->route('todo.index');
    }
上記の(Request $request)という記述から、Requestインスタンスを$requestに格納し、Requestインスタンスのメソッドであるallメソッドを使い、入力された値を連想配列の形で取得し、その結果を$inputsへ格納している。

### fillメソッドは何をしているか
fillメソッドは、連想配列の形で値を指定すると、複数のカラムに値をセットする（データの追加・更新に利用できる）処理を行う。今回の場合は、引数として渡した$inputsに格納された入力値の連想配列のデータを、DBの複数カラムにセットしている。

### $fillableは何のために設定しているか
一括代入を許可する属性を指定するために設定している。

例えば、$inputsに格納された連想配列のデータが、
['content' => 'りんご', ‘other’=>’おはよう’]だった場合、$todo->fill($inputs)の処理によって $todo->content には 'りんご' が設定されるが、$todo->otherは無視される（$fillableにotherという属性は含まれていないため許可されない）。
また、一括代入をマス・アサインメントと呼ぶこともある。

### saveメソッドで実行しているSQLは何か
saveメソッドは、INSERTやUPDATEの処理を実行している。
・新規レコードの作成（INSERT）：新しいインスタンスを作成し、saveメソッドを呼び出すことで新規レコードがDBへ挿入される。Saveが呼び出された時点でcreate_atとupdated_atのタイムスタンプは自動で設定される。
・レコードの更新（UPDATE）：既にあるモデルを取得し、更新したい属性をセットしてからsaveメソッドを呼び出すことで、DBの既存レコードが更新される。

### redirect()->route()は何をしているか
まずredirect関数を引数なしで呼び出し、結果としてリダイレクタインスタンスが返る。
続いて、リダイレクタインスタンスのメソッドが呼び出せるようになり、routeメソッドを使うことで名前付きルートに対するURLを生成できる。

今回の場合、route('todo.index')のため、'todo.index'というルートに対応するURLを生成してリターンし、リダイレクトレスポンスを受け取ったブラウザは指定されたURLのページを表示することになる。（ちなみに'todo.index'というルートの定義はweb.php内にある⇒Route::get('/todo', 'TodoController@index')->name('todo.index');）

### RequestクラスからFormRequestクラスに変更した理由

### $errorsのhasメソッドの引数・返り値は何か

### $errorsのfirstメソッドの引数・返り値は何か

## その他

### テーブル構成をマイグレーションファイルで管理するメリット

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか

### Seederクラスの役割は何か

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか

### route関数の引数・返り値・使用するメリット

### @extends・@section・@yieldの関係性とbladeを分割するメリット

### @csrfは何のための記述か

### {{ }}とは
