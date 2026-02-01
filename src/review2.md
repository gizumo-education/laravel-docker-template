# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
`<input type="hidden" name="_method" value="PUT">`

### findメソッドの引数に指定しているIDは何のIDか
todosテーブルのidカラム

### findメソッドで実行しているSQLは何か
`SELECT * FROM todos WHERE id={};`

### findメソッドで取得できる値は何か
Todoインスタンスの指定した１レコード

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
saveメソッドを呼び出す場所
INSERT : Todoインスタンス`($this->todo → private $todo;)`
UPDATE : DBから取得したデータを代入している$todo`($this->todo->find($id))`

## Todo論理削除

### traitとclassの違いとは
traitは、クラスにプロパティやメソッドを追加するための機能で
1つのクラスに複数のトレイトを追加できるが　（クラスは複数継承できない）
トレイト自体はインスタンス化できない　（クラスはインスタンス化できる）

### traitを使用するメリットとは
複数のクラス間でコードを共通化・再利用できる

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
ルーティング後にメソッドへ飛ぶ前
（Todoモデルのインスタンスを生成する）

### RequestクラスからFormRequestクラスに変更した理由
バリデーション実装のため
→ バリデーション専用の`TodoRequestクラス`は`FormRequestクラス`を継承している
　`FormRequestクラス`はバリデーションを行うクラスの基本となるクラス

### $errorsのhasメソッドの引数・返り値は何か
引数 : content → TodoRequestの`rules()`の返り値のキー
返り値 : true/false
エラーメッセージが存在しているかを判定するために使う

### $errorsのfirstメソッドの引数・返り値は何か
引数 : content → TodoRequestの`rules()`の返り値のキー
返り値 : TodoRequestの`messages()`の返り値のバリュー

### フレームワークとは何か
`枠組み`のこと
すでに用意された枠組みに肉付けするだけで、誰でも一定の品質のプロダクトを作成できるようにしたもの

### MVCはどういったアーキテクチャか
・開発効率を高めるために作られた構造(=ｱｰｷﾃｸﾁｬ)
・再利用性・可読性に優れ、保守性を高めてくれる

### ORMとは何か、またLaravelが使用しているORMは何か
`Object-Relational Mapping`
Classとテーブルを紐づけ、SQLを直接操作しなくてもテーブル操作ができる
LaravelのORMは`Eloquent`

### composer.json, composer.lockとは何か
`composer.json`
プロジェクト立ち上げ時にインストールしたいパッケージをComposerへ伝える
バージョンの範囲指定が可能
`composer.lock`
「どんなパッケージをインストールしたのか」という情報が記録される
チーム開発のとき、メンバーが効率的に同じパッケージをインストールできるようにする
　↓
両方を管理することで開発環境と本番環境での一貫性が保たれ「動作環境が違う」といった問題を防ぐことができる

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
プロジェクト直下の`vendor`ディレクトリ

#### - - - - メモ - - - -
###### composer : PHPのパッケージ管理ソフト
###### パッケージライブラリ : 便利な機能（関数やクラスなど）がすでに実装されている機能のまとまり
`composer install`コマンドでcomposer.jsonに記述したパッケージや依存関係にあるパッケージが自動的にインストールされる
初めて`composer install`を実行する → 実際にインストールされた具体的なバージョンをcomposer.lockファイルに記録
composer.lockファイルがある状態で`composer install`を実行すると、Composerは`.json`ではなく、`.lock`を参照する
　→ composer.lockが存在する場合：記録された正確なバージョンをインストール
　　composer.lockが存在しない場合：composer.jsonから適切なバージョンを解決
パッケージを`更新（修正）`または`追加`したいときは、別のコマンドを使用
