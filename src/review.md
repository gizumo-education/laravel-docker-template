# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
`SELECT * FROM todos;`

### Todoモデルのallメソッドの返り値は何か
`Illuminate\Database\Eloquent\Collection` のインスタンス
 → todosテーブルのレコード(Todoインスタンス)
   → create.bladeファイルの `form` タグの中身
     連想配列
     `@csrf` で作成したtoken と 入力した値(contentキーの値)

### 配列の代わりにCollectionクラスを使用するメリットは
Collectionインスタンスは配列操作に特化している
 → レコードをオブジェクトとして保存/削除できる

### view関数の第1・第2引数の指定と何をしているか
第1引数 ・・・ 画面に表示したいbladeファイル(HTML)
第2引数 ・・・ 渡したいデータ(連想配列)
画面として表示したいHTMLファイルを指定し、HTMLを返す

### index.blade.phpの `$todos` ・ `$todo` に代入されているものは何か
`$todos` ・・・ Controllerでインスタンス化したCollectionクラス(Todoクラス)
`$todo` ・・・ Collectionインスタンスに格納されているTodoインスタンス

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
フォームから送信された値(Todoインスタンス)を一括で取得

### fillメソッドは何をしているか
連想配列で取得した値をTodoインスタンスの各プロパティに一括で代入

### $fillableは何のために設定しているか
複数代入の脆弱性への対策 → contentカラム以外は書き換えられない

### saveメソッドで実行しているSQLは何か
INSERT INTO todos (content) VALUES (" 入力した値 ");

### redirect()->route()は何をしているか
`route()` で指定した名前付きルートへリダイレクト
 → `redirect()->route('ルート名')` とすることでリダイレクトさせることができる

## その他

### テーブル構成をマイグレーションファイルで管理するメリット
SQLを知らなくてもPHPコードでテーブル操作ができる
Gitで共有することで開発者全員が同じテーブルを作成できる  ➡再現性が高い
現在のデータベースの状態を他の開発者に共有できる

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
up ・・・ `php artisan migrate` コマンドを実行 → データベースに新しいテーブル、カラム、インデックスを追加する
down ・・・ `php artisan migrate:rollback` コマンドを実行 → 以前の状態へ戻す

### Seederクラスの役割は何か
SQLを知らなくてもPHPコードでテーブル操作ができる
シーダーファイルをGit管理することでテストデータを開発者間で共有できる

### route関数の引数・返り値・使用するメリット
引数 ・・・ ルート名、ルートに定義されたパラメータパラメータ
返り値 ・・・ そのルートに対応するURLを生成 → 文字列
メリット ・・・ 名前付きルートを使用することで、Blade内のURLの記述が簡潔になる → 可読性向上
URLに変更がある場合でも、ルート名さえ変わらなければ修正箇所はweb.phpのみで済む → 保守性向上

### @extends・@section・@yieldの関係性とbladeを分割するメリット
@extends ・・・ 継承する親Bladeを指定
@section ・・・ 継承先の子Blade
@yield ・・・ 親Blade

`@extends('Bladeファイルのパス')` で他のBladeファイルを継承できる
`@section('任意の文字列') ~ @endsection` で囲った部分を、継承したBladeファイルの `@yield('任意の文字列')` の箇所に挿入される

<bladeを分割するメリット>
複数のBladeを組み合わせて1枚のHTMLを生成することが可能になる
重複するコードを共通化して再利用できるようになる → 保守性向上

### @csrfは何のための記述か
CSRF対策、トークンを生成
 → トークンが含まれたinputタグが生成される  `<input type="hidden" name="_token" value="～～～">`

### {{ }}とは何の省略系か
PHPの処理 → `<?php` ~ `?>`