# Laravel Lesson レビュー②

## Todo編集機能
### @method('PUT')を記述した行に何が出力されているか
<input type="hidden" name="_method" value="PUT">

### findメソッドの引数に指定しているIDは何のIDか
todsテーブルの主キー（id）

### findメソッドで実行しているSQLは何か
SELECT * FROM todos WHERE id = ? LIMIT 1;

### findメソッドで取得できる値は何か
該当レコードの Modelインスタンスである（Todoオブジェクト）
※存在しない場合は nullの出力

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
主キー（id）が存在しているかどうかの基準
idなし → INSERT　idあり → UPDATE

## Todo論理削除
### traitとclassの違いとは
・class：インスタンス化できる
・trait：クラスにプロパティやメソッドを追加するための機能で、インスタンス化は不可

### traitを使用するメリットとは
・複数クラスでコードを共通・再利用できる
・多重継承の代替として機能を追加できる

## その他
### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
ルーティングによってコントローラが呼ばれたタイミングで実行される
※インスタンス生成時

### RequestクラスからFormRequestクラスに変更した理由
バリデーション処理をコントローラから分離するため

### $errorsのhasメソッドの引数・返り値は何か
・引数：フィールド名（例：content）
・返り値：boolean（エラーがあればtrue）

### $errorsのfirstメソッドの引数・返り値は何か
・引数：フィールド名
・返り値：最初のエラーメッセージ（string）

### フレームワークとは何か
アプリケーション開発のための共通処理や構造を提供する土台

### MVCはどういったアーキテクチャか
処理を3つに分離する構造
Model：データ、ロジック　View：表示　Controller：制御

### ORMとは何か、またLaravelが使用しているORMは何か
・ORM：DBのレコードをオブジェクトとして扱う仕組み
・Laravelが使用しているORM：Eloquent ORM

### composer.json, composer.lockとは何か
・composer.json：依存パッケージの定義ファイル
・composer.lock：実際にインストールされたバージョンの固定ファイル

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendor/
