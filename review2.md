# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
<input type="hidden" name="_method" value="PUT">

### findメソッドの引数に指定しているIDは何のIDか
ルート定義で指定したルートパラメータのIDです。

### findメソッドで実行しているSQLは何か
SELECT id FROM todos where id = $id;

### findメソッドで取得できる値は何か
App\Todoインスタンスです。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
INSERT時はTODOインスタンスを代入している、$this->todoから呼び出していましたが、UPDATE時はDBから取得してきたデータを代入している、$todoから呼び出している為、呼び出し元を基準に切り替えています。

## Todo論理削除

### traitとclassの違いとは
- トレイトはインスタンスができないです。
- クラスの継承とは異なり1つのクラスに複数のトレイトを追加することができます。

### traitを使用するメリットとは
複数のクラス間でコードを共通化・再利用することが可能になります。

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
一覧画面が表示されるときに実行されます。

### RequestクラスからFormRequestクラスに変更した理由
TodoRequest.phpで設定したバリデーションルールを適用させる為です。

### $errorsのhasメソッドの引数・返り値は何か
引数はcontentです。inputタグのname属性がcontentのため、contentを指定しています。
Illuminate\Support\MessageBagのインスタンスを返しています。

### $errorsのfirstメソッドの引数・返り値は何か
引数はcontentです。inputタグのname属性がcontentのため、contentを指定しています。
Illuminate\Support\MessageBagのインスタンスを返しています。

### フレームワークとは何か
アプリケーション開発やシステム開発において、必要な機能があらかじめ用意された枠組みのことです。  フレームワークのメリットは、開発に必要な時間や機能を作り直す手間を減らすことができたり、共通的なルールに沿ってコードを書くことが出来ることで、開発ミスを減らすことができたり作業の効率化につながります。

### MVCはどういったアーキテクチャか
Webフレームワークなどで、プログラムを役割ごとに管理するソフトウェア設計のことです。システムの保守性や生産性の向上を図ることができます。M：model、V：view、C：controllerです。  modelでは、アプリケーションのデータ構造やデータベースとのやりとり、データ操作や処理を書きます。  viewでは、実際に表示したり、入力する機能の処理を書きます。  controllerでは、modelでのデータ取り出しの処理やmodelからデータを受け取る処理、また、受け取ったデータをviewに送信する処理を書きます。

### ORMとは何か、またLaravelが使用しているORMは何か
オブジェクト関係マッピング（Object-Relational Mapping））と言いORMの基本的な構造は、プログラミング言語のクラスとデータベースのテーブルをマッピングを行うことです。これにより、直接SQL文を記述することなく、オブジェクトのメソッドでDB操作ができます。
Laravelでは、EloquentのORMを使用しています。

### composer.json, composer.lockとは何か
### composer.json
- インストールするパッケージやライブラリを管理するファイル
- プロジェクトのルートディレクトリに作成する
- チーム開発を開始するとき、共有するcomposer.lockを作成する際に作成・編集する

### composer.lock
- インストールしたパッケージやライブラリを管理するファイル
- composer installコマンドを実行したときに、プロジェクトのルートディレクトリに自動生成される
- composer.lockには、composer.jsonより詳細な情報が記載されている
- チーム開発の時は、composer.lockを共有する

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
vendorディレクトリに格納されます。