# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
SELECT * FROM todos;

### Todoモデルのallメソッドの返り値は何か
Illuminate\Database\Eloquent\Collection

### 配列の代わりにCollectionクラスを使用するメリットは
複数のレコードをまとめて操作する便利なメソッドを、メソッドチェーンで簡潔に書けること

### view関数の第1・第2引数の指定と何をしているか
第1引数は、画面に表示したいbladeファイル（todo/index.blade.php）を指定している。
第2引数は、キーにblade内での変数名（todos）を指定し、バリューにキーの変数に代入したい値を$todosという名前で渡している。

### index.blade.phpの$todos・$todoに代入されているものは何か
$todosには、データベースから取得したTodoの一覧（Collection）
$todoには、その中の1件のTodoモデルが代入されている

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
リクエストで送られてきた入力データを配列型にして一括で取得している。

### fillメソッドは何をしているか
引数（$inputs）に代入されている配列を$todoに代入している

### $fillableは何のために設定しているか
一括代入の項目を指定して、意図しない項目を書き換えられることを防ぐため

### saveメソッドで実行しているSQLは何か
INSERT INTO todos VALUES $todo

### redirect()->route()は何をしているか
route()で指定したURLの画面へ移動する

## その他

### テーブル構成をマイグレーションファイルで管理するメリット
SQLを知らなくても、PHPコードでテーブル操作ができる
マイグレーションファイルを共有することで、同じテーブルを作成することができる

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
php artisan migrate
php artisan migrate:rollback

### Seederクラスの役割は何か
データベースにあるレコードを削除し、テストデータを挿入する

### route関数の引数・返り値・使用するメリット
引数はルート名で（todo.store）、返り値はURL、メリットは、URLを直接記述する必要がなくなること、およびURLが変更されてもRouteクラス（Route::）のみの修正で済むこと。

### @extends・@section・@yieldの関係性とbladeを分割するメリット
@extendsは子ファイル側で親ファイルを指定し親ファイルの内容を挿入、
@sectionで表示したい内容を定義（@section('content') ~ @endsection）、
@yieldで表示する場所の指定をし、指定した引数と同じ文字列の@sectionの内容を表示している

メリットは、それぞれのbladeファイルで共通で重複する部分（親ファイルで指定）を一括で管理できること、また再利用も可能であること。

### @csrfは何のための記述か
トークンを生成しフォームに埋め込む記述であり、正しい送信元からのアクセスか確認するため

### {{ }}とは何の省略系か
中で記述した処理をPHPの処理と認識し、HTMLエスケープを行い文字列のみに変換し、画面に表示させる。