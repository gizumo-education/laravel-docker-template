# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
  <input type="hidden" name="_method" value="PUT">と同等のinputタグを生成する。
  HTMLの仕様として、<form method="PUT">のようにPUTメソッドを指定することができないため、
  代わりに@method('PUT')を使うことで、PUTメソッドでリクエストを送信できるようになる。

### findメソッドの引数に指定しているIDは何のIDか
  データベースのidカラムが$idの値と一致するレコードを取得。

### findメソッドで実行しているSQLは何か
  select * from `todos` where `todos`.`deleted_at` is null

### findメソッドで取得できる値は何か
  find()メソッドを使用して、指定のIDのデータを取得。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
  fill()->save()の記述を、新規作成時は$this->todoから呼び出して
  オブジェクトの状態をDBに保存するINSERT文を実行していたが、
  更新処理はDBから取得してきたデータを代入している$todoから呼び出すことで
  オブジェクトの状態をDBに保存するUPDATE文を実行。

## Todo論理削除

### traitとclassの違いとは
  トレイトは、クラスにプロパティやメソッドを追加するための機能。
  クラスの継承とは異なり1つのクラスに複数のトレイトを追加することができる。
  また、クラスはインスタンス化できるが、トレイト自体はインスタンス化できない。
  トレイトの内容をインスタンス化するときは、クラスを使う。

### traitを使用するメリットとは
  複数のクラス間でコードを共通化・再利用することが可能になる。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
　データを取得する際の最初に
  Todoクラスのインスタンスを生成し、$todoという変数に代入するとき。

### RequestクラスからFormRequestクラスに変更した理由
  FormRequestクラスは、バリデーションを行うクラスの基本となるクラスで
  FormRequestクラスにバリデーションルールの設定だけを行えば、複雑なロジックを実装する必要がないため。

### $errorsのhasメソッドの引数・返り値は何か
  引数は'content'
  返り値はreturn ['content' => 'required|max:10',];

### $errorsのfirstメソッドの引数・返り値は何か
  引数は'content'
  返り値はreturn ['content' => 'required|max:10',];

### フレームワークとは何か
  すでに用意された枠組みに肉付けをするだけで誰でも一定品質のプロダクトを作成できるようにしたもの

### MVCはどういったアーキテクチャか
  MVSは、開発効率を高めるために作られたアーキテクチャ

### ORMとは何か、またLaravelが使用しているORMは何か
  ORMはClass（Model）とテーブルを紐付け（マッピング）、SQL文を直接操作することなく、
  DBとのやり取りを可能にするもの。
  LaravelのORMはEloquent

### composer.json, composer.lockとは何か
  composer.jsonは依存するパッケージを定義するためのファイル。
  composer installをすると、composer.jsonを基にパッケージがインストールされ、
  パッケージの情報が書かれたcomposer.lockが生成される。
  二回目以降は、composer installをするとcomposer.lockを基にパッケージがインストールされる
  （composer.jsonのパッケージ情報は書き変わらない）

  installコマンド実行時に、composer.lockファイルが存在する場合は
  composer.lockに書きだされているバージョンをダウンロードする。
  composer.lockをGit管理して共有すれば、それだけでメンバー間でパッケージやパッケージのバージョンを統一できる

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
  vendorディレクトリ内