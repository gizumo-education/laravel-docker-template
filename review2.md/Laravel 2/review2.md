# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
<input type="hidden" name="_method" value="PUT">
※HTTPリクエストのメソッドをPUTとして扱う仕組み

### findメソッドの引数に指定しているIDは何のIDか
DB上のID

### findメソッドで実行しているSQLは何か
SELECT * FROM todos WHERE id = id番号 LIMIT 1~;
※DBからTodoを１件取得する

### findメソッドで取得できる値は何か
モデルにあるインスタンス（$todoの IDや中身など）
$todo
├── id = 2
├── todo = Laravelを勉強する
├── created_at = ...
└── updated_at = ...

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
モデルが既存のレコードなのか、新規のレコードなのかを基準に切り替えている

## Todo論理削除

### traitとclassの違いとは
classはオブエックトを作るための設計図でtraitはクラスに追加する機能セットのようなもの

### traitを使用するメリットとは
複数のクラスで共有して使いたい処理を再利用できる

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
クラスがインスタンス化された時

### RequestクラスからFormRequestクラスに変更した理由
バリデーションのため

### $errorsのhasメソッドの引数・返り値は何か
引数は'todo'、返り値はboolean（フィールドにバリデーションエラーがあるかどうかを返す）
つまりtrueかfalseが返ってくる

### $errorsのfirstメソッドの引数・返り値は何か
引数は'todo'（エラーを取得したフィールド名）、返り値はそのフィールドの最初のエラーメッセージ

### フレームワークとは何か
アプリケーション開発でよく使う機能や設計、ルールなどをあらかじめ用意した開発の土台やすい

### MVCはどういったアーキテクチャか
model、view、controllerに分けて処理を行う。
それぞれ、DBとのやりとり、HTMLや画面の表示、modelやviewとのやりとりなど

### ORMとは何か、またLaravelが使用しているORMは何か
PHPのオブジェクトとDBのテーブル・レコードを対応させて、PHPからDBを扱いやすくする仕組み

### composer.json, composer.lockとは何か
composer.json：このプロジェクトで使うライブラリの設計図・依存関係リスト
composer.lock：実際にインストールされた具体的なバージョンが記録される

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendor/