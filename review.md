# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か

- allメソッドで実行しているSQLは、「SELECT * FROM (テーブル名)」で、
  all()は、ORMを使用してデータベースから選択したテーブル名の全てのレコードを取得するためのメソッドです。

※ ORM ... SQL文を書かなくてもSQLの処理が実行できる。



### Todoモデルのallメソッドの返り値は何か

- allメソッドの返り値は、 Illuminate\Database\Eloquent\Collection クラスのインスタンスです。

- Collectionインスタンスは、Laravelで用意されているクラスとなっていて、 " 配列操作 に特化したクラス " となっています。

※ Collectionは、Laravelが元々持っている「箱」のようなもので、データを簡単に操作したり、整理するための便利なメソッドがたくさん入っています。



### 配列の代わりにCollectionクラスを使用するメリットは

- Collectionインスタンスは、Laravelで用意されているクラスとなっていて、 " 配列操作 に特化したクラス " となっています。

※ Collectionは、Laravelが元々持っている「箱」のようなもので、データを簡単に操作したり、整理するための便利なメソッドがたくさん入っています。


(memo) クラスが設計図、インスタンスは設計図から作った具体的な物



### view関数の第1・第2引数の指定と何をしているか

- view関数は、画面表示したいHTMLを指定して、生成するときに使用します。
- view関数の第一引数では、表示させたいBladeファイルを指定しています。
- view関数の第二引数には、渡したいデータを連想配列の形で渡すことが出来て、ビューに渡したいデータを指定します。

--

1. view関数の第一引数

(例)
- resources/views/todo/index.blade.php という表示したいHTMLが書かれている。
- TodoController.phpに一覧画面表示処理を記述されている。

< app/Http/Controllers/TodoController.php >

    class TodoController extends Controller
     {
      public function index()
      {
          return view('todo.index');
      }
    }

  ※ view関数の引数には、resources/views/から対象の*.blade.phpまでの相対パスを.区切りで指定しています。

--

2. view関数の第二引数

(例)

  < pp/Http/Controllers/TodoController.php >

    public function index()
    {
      $todo = new Todo();
      $todos = $todo->all();

    return view('todo.index', ['todos' => $todos]);
    }

  ※ new todo() ... Todoモデルの新しいインスタンスを作成
  ※ todos ... ビュー内で使う変数名
  ※ $todos ... コントローラーで取得したデータを入れる変数名。このデータがビュー内で$todosという名前で使える。
  ※ view関数の第二引数の連想配列は、[blade内での変数名 => 代入したい値]となっている。

  ※ view関数は、画面表示するHTMLを指定して、そのHTMLを生成するために使います。
     第一引数 ... 表示させたいBladeファイルを指定します。
     第二引数 ... ビューに渡したいデータを連想配列で渡すことで、データがビューの中で使えるようになります。


これにより、ビュー内でデータを使用して動的にコンテンツを生成出来るようになります。


### index.blade.phpの$todos・$todoに代入されているものは何か

< resources/views/todo/index.blade.php >

  @foreach ($todos as $todo)
    <div class="d-flex align-items-center p-2">
    <span class="col-9">{{ $todo->content }}</span>
    </div>
  @endforeach

- $todos ... $todos には、all() メソッドを使ってデータベースから取得したデータの一覧が全て代入されています。

- $todo ... $todo は、@foreachでループ処理が行われるたびに、1つ1つのタスクが代入されています。


## Todo作成機能

### Requestクラスのallメソッドは何をしているか

< app/Http/Controllers/TodoController.php >

$inputs = $request->all();

- Requestクラスの->all() は、フォームから送信された値を個別ではなく一括で取得しています。


### fillメソッドは何をしているか

- fillメソッドは、連想配列で取得した値を->fill()に渡すことで、Todoインスタンスを一括で代入します。

※ ->fill()は$todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して行ってくれます。


### $fillableは何のために設定しているか

- fillableは、fillで一括代入を行う際に、攻撃者に悪用されてしまい、被害者のユーザが意図しないところで、攻撃者がなりすまして悪意あることを行う攻撃を防ぐために設定する必要があります。

< app/Todo.php >
 protected $fillable = [
     'content',
 ];

- そのため、->fill()を使用した一括代入を行う際は、入力された値を信用せずにModelに$fillableを適切に設定し、意図しないカラムを更新されないように気をつける必要があります。


### saveメソッドで実行しているSQLは何か

public function store(Request $request)
{
    $content = $request->input('content');

    // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
    $todo = new Todo();
    // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
    $todo->content = $content;
    // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
    $todo->save();
}

- saveメソッドは、Todoインスタンスの ->save() を実行すると、オブジェクトの状態のレコードをDBに保存する「 INSERT文 」を実行することが出来ます。


### redirect()->route()は何をしているか

return redirect()->route('todo.index');

redirect()->route('ルート名')を使用することで、リダイレクトさせることができます。

※ 処理が終了したら、redirect()->route('todo.index')を使って、ウェブサイトをtodo.indexに移動します。


### RequestクラスからFormRequestクラスに変更した理由 (※ 後のカリキュラムでやるため、後でやる)
### $errorsのhasメソッドの引数・返り値は何か (※ 後のカリキュラムでやるため、後でやる)
### $errorsのfirstメソッドの引数・返り値は何か (※ 後のカリキュラムでやるため、後でやる)




## その他

### テーブル構成をマイグレーションファイルで管理するメリット

マイグレーションファイルで管理するメリットは下記に点となります

- SQLを知らなくても、PHPコードでテーブル操作ができるため学習コストが不要です。

- チームでアプリケーションを開発する際に、開発者同士のテーブルは全く同じにする必要があるため、
　マイグレーションファイルをGitで共有することで、開発者全員が同じテーブルを作成することができます。


### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか

- up : データベースに新しいテーブル、カラム、またはインデックスを追加するために使用します。

- down : upメソッドによって実行する操作と逆の操作を実装し、以前の状態へ戻す必要があります。


### Seederクラスの役割は何か

- Seederとは、レコードの作成を担うことが出来るもので、SQLを直接書かずPHPでDBを動かすことが出来ます。

### route関数の引数・返り値・使用するメリット

route('ルート名')

- route関数とは ... route関数を使用することでそのルートに対応するURLを生成することが出来ます。

- 引数

・第一引数には、定義済みのルートの名前を指定します。(例) route('todo.create')

・第二引数には、第二引数には、ルートパラメータを指定できます。(例) href="{{ route('todo.show', $todo->id) }}"

- 返り値 ... 引数で指定したルートのURLが返されます。(例) route('todo.create') を実行した時の返り値は 「 http://localhost:8080/todo/create 」

- 使用するメリット ... ルート名を使用してURLを生成するため、ルートのパスが変更されても書き換える部分が少なく、保守性が向上します。

### @extends・@section・@yieldの関係性とbladeを分割するメリット

・「@extends」・「@section」・「@yield」の関係性は、@extendsが設計図のようなもので、@sectionで設計図に具体的に組み立てる、@yieldで内容を入れて装飾することが出来る関係性です。

bladeを分割することで、保守性を高めることが出来る。

### @csrfは何のための記述か

- Laravelではフォーム内に@csrfを入力することで、CSRFの対策をすることが出来ます。

※CSRFとは...不特定多数の人に対して意図しないリクエスト送信をさせる攻撃

### {{ }}とは

- {{ }}は変数の値や出力を表示するために使います。

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか (※ 後のカリキュラムでやるため、後でやる)