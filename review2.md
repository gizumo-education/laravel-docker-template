# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
inputタグ
キー：_method
バリュー：PUT

### findメソッドの引数に指定しているIDは何のIDか
TodoModelのオブジェクト
### findメソッドで実行しているSQLは何か
更新したい値の代入とUPDATE文の実行
### findメソッドで取得できる値は何か
todotableのidカラム
### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
複数レコードの値をまとめて更新する場合はupdate
## Todo論理削除

### traitとclassの違いとは
インスタンスするかしないか
### traitを使用するメリットとは
複数のクラス間でコードを共通化・再利用することが可能
## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
いスタンスが作成された時
### RequestクラスからFormRequestクラスに変更した理由
バリデーションルールを適用するため
### $errorsのhasメソッドの引数・返り値は何か
引数：content
返り値：失敗を true で返して、成功を false で返す
### $errorsのfirstメソッドの引数・返り値は何か
引数：content
返り値：メッセージ
### フレームワークとは何か
laravel
### MVCはどういったアーキテクチャか
開発効率を高めるために作られた構造
### ORMとは何か、またLaravelが使用しているORMは何か
プログラミング言語のClassとデータベースのテーブルをマッピング（関連付け）することでSQLを直接操作することなく
データベースとマッピングされたClassのメソッドを用いることでDBとやり取りを行うこと
Eloquentエラクウェント
### composer.json, composer.lockとは何か
composer.json：依存するパッケージを定義するためのファイル(laravel)
composer.lock:composer.jsonに依存するファイル
### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
src