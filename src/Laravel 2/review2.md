# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
\<input type="hidden" name="_method" value="PUT">

### findメソッドの引数に指定しているIDは何のIDか
Todosテーブルのid

### findメソッドで実行しているSQLは何か
select * from todos where id = $id;

### findメソッドで取得できる値は何か
該当するレコードのCollectionインスタンス

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
対象のレコードが存在するかどうか（主キー参照）

## Todo論理削除

### traitとclassの違いとは
クラス本体とその拡張機能の違い  
Class：インスタンス化を行い使用する  
Trait：Classで呼び出すことによって共通の部品を流用する目的で使用する

### traitを使用するメリットとは
上記にも記載したが、同じような処理（確認処理など）を各クラスに記述したい場合がある。  
そうした処理をまとめておいて呼び出すだけで使用可能となるため、各コントローラーではそのコントローラーの目的に応じた内容以外の記述が少なくて済むようになる。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
ルーティングでクラスを呼び出されたとき

### RequestクラスからFormRequestクラスに変更した理由
バリデーションを実行するため

### $errorsのhasメソッドの引数・返り値は何か
引数　：text  
返り値：bool  

### $errorsのfirstメソッドの引数・返り値は何か
引数　：text  
返り値：text  

### フレームワークとは何か
セキュリティ対策や対象となる言語の操作を簡略化してくれるパッケージ

### MVCはどういったアーキテクチャか
処理をモデル（DB操作）、ビュー（画面表示）、コントローラー（内部ロジック）に分割して考える設計思想及び開発手法

### ORMとは何か、またLaravelが使用しているORMは何か
DB操作を簡略化してくれるパッケージでLaravelのORMはEloquent

### composer.json, composer.lockとは何か
composer.json：Composerでインストールしたいパッケージを指定する  
composer.lock：上記で指定したファイルの依存関係を管理してくれる  

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendor配下
