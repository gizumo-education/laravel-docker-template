# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
- todosテーブルから全件取得するため、内部的には SELECT * FROM todos; が実行されている
### Todoモデルのallメソッドの返り値は何か
- Illuminate\Database\Eloquent\Collectionクラスのインスタンス

- 補足
Illuminate
これは Laravelの内部で使われている名前空間「Laravelが提供しているクラス」という目印
CollectionインスタンスはLaravelで用意されているクラスで、配列操作に特化している。
Eloquent
LaravelのORM（テーブルのレコードをオブジェクトとして扱う仕組み）

### 配列の代わりにCollectionクラスを使用するメリットは
- Laravelの、ORM (Object-Relational Mapping) の一つEloquentを用いることでDBの操作を行うことができる。
- ORMとは？
プログラミング言語のClassとデータベースのテーブルをマッピング（関連付け）することでSQLを直接操作することなく
データベースとマッピングされたClassのメソッドを用いることでDBとやり取りを行うことができる。
★Laravelでは、データベースのテーブルとマッピングするClassがModelに当たる。
-  Laravelが標準でCollectionを返す
-  中身がモデルだから機能が使える
-  リレーションも全部Collection
### view関数の第1・第2引数の指定と何をしているか
- 【第1引数】
指定するもの： 表示したいBladeファイルの名前（resources/views フォルダからのパス）。

### index.blade.phpの$todos・$todoに代入されているものは何か
- $todosに代入されている値
→Controllerにて取得したCollectionインスタンスが代入されている
例： 'todo.index' （これは resources/views/todo/index.blade.php を指す
- 【第2引数】
指定するもの： 画面に渡したいデータを 「連想配列」 の形で指定。

例： ['todos' => $todos]

左側の 'todos' が、Blade側で使う時の変数名になる。
右側の $todos が、コントローラーで取得した実際のデータ
「Blade側でどの変数名として扱うかを明確にするためです。['todos' => $todos] と渡すことで、Blade側では $todos という変数名でデータの塊（Collection）を扱えるようになる
【何をしているか】

コントローラーで用意したデータを、指定したBladeテンプレートに流し込み、最終的なHTMLを生成してブラウザに返す処理をしている。
## Todo作成機能

### Requestクラスのallメソッドは何をしているか
- 新規作成画面で作成されたフォームのデータをすべて配列で実行している。
### fillメソッドは何をしているか
- 引数に指定した連想配列のデータをモデルの属性へ一括代入するメソッドなので、$inputsに含まれるデータを$todoへ一括代入している。
### $fillableは何のために設定しているか
- 一括代入のデメリットとして、脆弱性があげられる。name="user_id"のinputタグを生成して、被害者のユーザIDと犯行予告などの悪意のある投稿を不正に送信できたりする。
このような攻撃を防ぐために、代入できる項目に制限をかける必要がある。今回はtodo.phpでtodosには'content'しか代入できないように制限をかけている。
また、User.php でもユーザーが遅れるデータに制限をかけている。
### saveメソッドで実行しているSQLは何か
- オブジェクトの状態をDBに保存するINSERT文を実行している。
### redirect()->route()は何をしているか
- ルートにリダイレクトさせる処理
- todo.index という名前のルートへリダイレクトする処理で、そのルートに対応するコントローラのメソッドが実行され、結果としてビューが表示されるようにしている。
- 関係する処理としては、scr/routes/web.phpに記載されている
- Route::get('/todo', [TodoController::class, 'index'])->name('todo.index');
- Route::get('/todo', 'TodoController@index')->name('todo.index'); 
- 上記の記述でTodoControllerのindexメソッドを呼び、操作することができる。今回はindexメソッド内のtodoモデルを取得しViewに表示することができる。例えばcreate画面にて「カレー」と入力されたら、todoTodoControllerのindexメソッド内のtodoモデルから全件取得して一覧表示画面に戻り、「カレー」と新たに表示される仕組み
順番としては「カレー」と新規作成画面（create）で入力されpost（送信）される→scr/routes/web.phpへ送られる→TodoController の store メソッドで「カレー」を Todoモデルに保存→'todo.index'ルートが実行される。→todoTodoControllerのindexメソッド内のtodoモデルから全件取得して一覧表示画面に戻り、「カレー」と一覧に新たに表示される
## その他

### テーブル構成をマイグレーションファイルで管理するメリット
1. sqlを知らなくてもphpコードでテーブルを作成できる
1. Gitで共有すれば開発者全員で同じテーブルを作成できる
- 再現性が高いので、新参者がきてもphp artisan migrateだけで同じDB構造を再現可能→開発者全員が同じテーブルを作成することができるので実行と管理が楽
- gitを使用することによって履歴を確認できる。
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
- up : データベースに新しいテーブル、カラム、またはインデックスを追加するために使用
-  down : upメソッドによって実行する操作と逆の操作を実装し、以前の状態へ戻すために使用
### Seederクラスの役割は何か
レコードの作成を担う。テストデータを導入したりするときに使用する。デバックを行ったりできる
### route関数の引数・返り値・使用するメリット
- ->name('ルート名')を使用することで名前付きルートを定義でき、route('ルート名')を使用することでそのルートに対応するURLを生成することができる。
- 返り値はURLの文字列となる→可読性向上につながる
### @extends・@section・@yieldの関係性とbladeを分割するメリット
- @extends('layouts.base')の記述で、継承する親Bladeを指定できる

- 継承先の子として
@section~ @endsectionで囲まれた部分を
親Bladeの@yield('content')の部分に挿入する。引数に同じ文字列'content'を指定することで、@section()と@yield()を紐づけることができる。

- 複数のBladeを組み合わせて1枚のHTMLを生成することが可能になり、重複するコードを共通化して再利用できるようになるので、保守性の向上につながる。
### @csrfは何のための記述か
CSRFトークンを埋め込むBladeディレクティブなので、下記のHTMLが入力される
＜input type="hidden" name="_token" value="ランダムな文字列"＞
- 補足
CSRFトークンは、フォームが正規の画面から送信されたかどうかを確認し、外部サイトからの不正なリクエストを防ぐための仕組み
### {{ }}とは何の省略系か
phpを記述するときに使用する
*Bladeテンプレートエンジンのエコー構文（Echo構文）
役割：
変数を画面に表示する

自動でHTMLエスケープしてくれる（XSS対策）