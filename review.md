# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
SELECT * FROM todos;

### Todoモデルのallメソッドの返り値は何か
Todoモデルのインスタンス
### 配列の代わりにCollectionクラスを使用するメリットは
配列に対するメソッドを多く持っているため操作を簡潔に書ける
### view関数の第1・第2引数の指定と何をしているか
指定したファイルにデータを渡す
### index.blade.phpの$todos・$todoに代入されているものは何か
$todosはtodosテーブルのレコード情報　$todoは$todosを一つずつ取り出したもの
## Todo作成機能

### Requestクラスのallメソッドは何をしているか
フォームから送信された値を一括で取得
### fillメソッドは何をしているか
Todoインスタンスの各プロパティに一括で代入します。
### $fillableは何のために設定しているか
画面の入力項目が増減しても常に同じコードで登録処理が実現できるようになり保守性と可読性が向上させるため
また許可していない項目は処理されないためセキュリティ対策にもなる
### saveメソッドで実行しているSQLは何か
INSERT INTO `todos` (`content`, `created_at`, `updated_at`) 
### redirect()->route()は何をしているか
指定した名前付きルートに遷移
## その他

### テーブル構成をマイグレーションファイルで管理するメリット
他の開発者とテーブル構成を共有しやすい
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
up()　php artisan migrate
down()　php artisan migrate:rollback
### Seederクラスの役割は何か
テーブルにテストデータを入れる
### route関数の引数・返り値・使用するメリット
引数　名前付きルート名　返り値　指定した名前付きルートのURL　メリット　 URLの変更が容易
### @extends・@section・@yieldの関係性とbladeを分割するメリット
@extendsが指定したファイルに継承される宣言
@sectionの内容を継承
@yieldに@sectionを挿入

メリット　再利用性と保守性に優れている
### @csrfは何のための記述か
不特定多数の人に対して意図しないリクエスト送信をさせる攻撃を防ぐための記述
### {{ }}とは何の省略系か
<?php echo htmlspecialchars() ?>