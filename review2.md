# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
<input type="hidden" name="_method" value="PUT">が出力され、POSTリクエストをPUTとして扱えるようにする。

### findメソッドの引数に指定しているIDは何のIDか
todosテーブルに登録されている、取得対象レコードの主キーID。

### findメソッドで実行しているSQLは何か
SELECT * FROM todos WHERE id = 〇 LIMIT 1;

### findメソッドで取得できる値は何か
指定したIDに一致するTodoモデルのインスタンス。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
Eloquentモデルのexistsプロパティを基準に判断する。falseならINSERT、trueならUPDATE。

## Todo論理削除

### traitとclassの違いとは
トレイトはクラスの継承とは異なり1つのクラスに複数のトレイトを追加することができる。
トレイトはインスタンス化できない。

### traitを使用するメリットとは
共通処理を再利用でき、コードの重複を減らして保守性を高められる。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
TodoControllerのインスタンス生成タイミングで実行。

### RequestクラスからFormRequestクラスに変更した理由
バリデーション処理をコントローラから分離し、可読性と保守性を高めるため。

### $errorsのhasメソッドの引数・返り値は何か
引数は入力項目名。返り値はエラーの有無を表すboolean型（trueまたはfalse）。

### $errorsのfirstメソッドの引数・返り値は何か
引数は入力項目名。返り値は最初のエラーメッセージの文字列。エラーがなければ空文字列。

### フレームワークとは何か
アプリケーション開発に必要な共通機能や基本構造を提供する仕組み。

### MVCはどういったアーキテクチャか
Model（データ処理）、View（画面表示）、Controller（処理の制御）の3つに役割を分離する設計方式。

### ORMとは何か、またLaravelが使用しているORMは何か
オブジェクトとデータベースを対応付けて操作する仕組み。
LaravelではEloquent ORMを使用する。

### composer.json, composer.lockとは何か
composer.jsonは必要なパッケージとバージョン条件を定義するファイル。
composer.lockは実際に解決されたパッケージのバージョンを記録するファイル。

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
基本的にプロジェクト直下のvendorディレクトリに格納される。