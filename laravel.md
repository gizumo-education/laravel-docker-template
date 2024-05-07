//Todo一覧機能//
## Todoモデルのallメソッドで実行しているSQLは何か
-SELECT * from todos;

## Todoモデルのallメソッドの返り値は何か
-array

## 配列の代わりにCollectionクラスを使用するメリット
-todosテーブルのレコード1つ1つに対応しているため、Todoインスタンスという形で取得できる。

## view関数の第1・第2引数の指定と何をしているか
-第一引数が表示するファイル名とフォルダ名、第二引数が渡すデータを連想配列として表したもので、MVCにおけるControllerからViewへデータを渡している。

## index.blade.phpの$todos・$todoに代入されているものは何か
-$todolistにはCollectionインスタンス、$todoにはCollectionインスタンスに格納されているTodoインスタンスが一つずつ代入されている。

//Todo作成機能//
## Requestクラスのallメソッドは何をしているか
-リクエストパラメータに格納されているデータをすべて取得している。

## fillメソッドは何をしているか
-request->all();が実行され連想配列が代入されている$inputをTodoモデルがインスタンス化された$todoに代入している。

## $fillableは何のために設定しているか
-fillメソッドを使いデータを一括代入する際に何も指定しないとユーザー側で不正にデータ操作を行うことができてしまうという脆弱性に対して、$fillableを利用し代入できる値をあらかじめ指定することによって対策を行っている。

## saveメソッドで実行しているSQLは何か
-UPDATE todos SET content = 'value' WHERE delete_at = null;

## redirect()->route()は何をしているか
-routeの引数に指定されているファイルにリダイレクトしている。(todo.index)

## テーブル構成をマイグレーションファイルで管理するメリット
-SQLを知らなくてもDB操作ができる点と複数人で同じマイグレーションファイルを共有できる点。

## マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
-up():php artisan migrate
-down():php artisan migrate:rollback

## Seederクラスの役割は何か
-migrateによって作成されたテーブルにテストデータを挿入すること。

## TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
-インスタンス化されたタイミング

## route関数の引数・返り値・使用するメリット
-引数：web.phpにおいてnameメソッドを用いて生成したルートの名前
-返り値：文字列(http)
-メリット：記述が簡潔になるため可読性、保守性が向上する。

## @extends・@section・@yieldの関係性とbladeを分割するメリット
-@extendsで継承する親Bladeを指定し、子Bladeの@Section('')~@endsectionで囲われた部分を親Bladeの@yield('')の部分に挿入している。

## @csrfは何のための記述か
-トークンを生成しcsrf対策を施すため。

## {{ }}とは
-Blade内でPHPの処理を実行する際に{{ }}で囲むことでPHPとして認識される。


