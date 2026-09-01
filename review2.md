# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
inputタグ　 <input type="hidden" name="_method" value="PUT">
### findメソッドの引数に指定しているIDは何のIDか
{ route('todo.show', $todo->id) }などの選択してるカラム
### findメソッドで実行しているSQLは何か
select文
### findメソッドで取得できる値は何か
todoモデルのインスタンス化したもの
### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
すでに値がセットされていたらUPDATE
されていなかったらINSERT
## Todo論理削除

### traitとclassの違いとは
traitは複数のクラスに、同じ機能(メソッドやプロパティ)を分けて渡すための仕組み
classは自体をインスタンス化できるが、traitはインスタンス化できない。
### traitを使用するメリットとは
同じコードを何度も書かずに、複数のクラスで使い回せる
## その他
### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
web.phpが、対応するコントローラーを特定してから
### RequestクラスからFormRequestクラスに変更した理由
リクエストを受け取りつつ、バリデーションなどを専用クラスに切り出せる
### $errorsのhasメソッドの引数・返り値は何か
返り値：true　引数：キー
### $errorsのfirstメソッドの引数・返り値は何か
返り値：文字列　引数：フィールド名
### フレームワークとは何か
フレームワークとは、アプリケーションを作るときに必要になる「共通の骨組み・仕組み」を、あらかじめ用意してくれているツール
### MVCはどういったアーキテクチャか
・Model (モデル)
・View (ビュー)
・Controller (コントローラ)
「WEBサーバから受け取ったリクエストを受け取ってからWEBサーバに返却するまで」の一連の流れにおいて役割を持たせる概念
### ORMとは何か、またLaravelが使用しているORMは何か
ORM…SQL文を直接書かずにDB操作ができるようにする仕組み
Laravelが使用しているORM…エロクゥオント
### composer.json, composer.lockとは何か
composer.json = このパッケージの、だいたいこのバージョン範囲が欲しいという宣言
composer.lock = 実際にこのバージョンでインストールしたという正確な記録
### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendorディレクトリ