# Laravel Lesson レビュー②

## Todo編集機能

### @method('PUT')を記述した行に何が出力されているか
`@method('PUT')`は、

`<input type="hidden" name="_method" value="PUT">`

というコードを出力する。

例えば、
```html
<form method="POST" action="{{ route('todo.update', $todo->id) }}">
  @csrf
  @method('PUT')
<!-- 以下略 -->
```
なら、
```html
<form method="POST" action="{{ route('todo.update', $todo->id) }}">
  @csrf
  <input type="hidden" name="_method" value="PUT">
<!-- 以下略 -->
```
になる。

HTMLの仕様上、`method`属性に`PUT`は書けない。

しかし、`name`属性が`_method`のデータを送信すると、Laravelは`value`属性の値をHTTPメソッドとして解釈する。

また、`@method('PUT')`と書くと、`<input type="hidden" name="_method" value="PUT">`と書くより短いコードで`PUT`メソッドを指定できる。

### findメソッドの引数に指定しているIDは何のIDか
ルートパラメータから受け取った、詳細表示や削除などの処理を行いたいレコードのID。

### findメソッドで実行しているSQLは何か
引数のIDと、DBのIDカラムのIDが一致するレコードを取得するSELECT文。

### findメソッドで取得できる値は何か
findメソッドで取得したレコードに対応するモデルクラスのインスタンス。

### saveメソッドは何を基準にINSERTとUPDATEを切り替えているのか
Modelクラスの`exists`プロパティを基準にしている。

`exists`プロパティが`true`なら`UPDATE`文、`false`なら`INSERT`文を実行する。

<details>
<summary>existsプロパティとは</summary>

ModelクラスからTodoクラスへ継承されているプロパティ。

DBに存在するレコードを取得し作るTodoインスタンスなら`true`に、新しくインスタンス化するTodoインスタンスは`false`に設定される。
</details>

## Todo論理削除
### traitとclassの違いとは
| トレイト | クラス |
| ---- | ---- |
| インスタンス化できない | インスタンス化できる |
| 1つのクラスに複数のトレイトを追加できる | 1つのクラスに1つの親クラスしか継承できない |

### traitを使用するメリットとは
複数のクラスでコードを共通化し再利用できること。

⇒同じコードを何度も書かなくて済み、修正も一か所で済む！

また、1つのクラスに複数のトレイトを追加できる

⇒クラスに必要な機能を組み合わせやすい！

## その他

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
TodoControllerクラスがインスタンス化されたタイミング。
TodoControllerクラスは、Todo一覧画面を表示するときや、Todoを作成するときなど、Todoリストに関する処理を行う様々なタイミングで呼ばれる。

### RequestクラスからFormRequestクラスに変更した理由
バリデーション（リクエストされた値を検証すること）し、チェックに通らなかった際にエラーメッセージを表示させるため。

FormRequestクラスによって、Todoの入力を必須にしたり、文字数の制限をつけたり、エラーの原因となる入力を防ぐことができる。

### $errorsのhasメソッドの引数・返り値は何か
| 引数 | 返り値 |
| ---- | ---- |
| 判定したい入力欄のname属性 | エラーメッセージが出ているかの判定（bool値） |

### $errorsのfirstメソッドの引数・返り値は何か
- 引数
  - 入力欄のname属性
- 返り値
  - エラーメッセージ（String型）
  - 複数のエラーメッセージが出ているときは、一番最初に見つかったエラーメッセージを返す

### フレームワークとは何か
すでに用意された枠組みに肉付けをするだけで、誰でも一定品質のプロダクトを作成できるようにしたもののこと。最も使用されているPHPフレームワークの一つがLaravel。

### MVCはどういったアーキテクチャか
コードをModel、View、Controllerの3つに役割分担し、開発効率を高めるために作られたアーキテクチャ（構造）。

| Model | View | Controller |
| ---- | ---- | ---- |
| DBとやりとり | 見た目を作る | ModelやViewに指示出し |

役割によってファイルを分けることで、コードが読みやすく、再利用しやすくなる。
### ORMとは何か、またLaravelが使用しているORMは何か
| ORMとは |
| ---- |
| Object-Relational Mappingの略 |
| オブジェクト指向コードとリレーショナルデータベースを対応させる仕組み |
| SQLを直接操作せず、Classのメソッドで直観的にDBとやり取りできるようにする |

| Laravelが使用しているORM |
| ---- |
| Eloquent ORM |

### composer.json, composer.lockとは何か
ComposerというPHPのパッケージ管理ツールで使うファイル。
パッケージのインストールが一括で行える。

| composer.json |
| ---- |
| これを元にライブラリがインストールされる |
| 手動で作成するか、compserのコマンドで作成する |

| composer.lock |
| ---- |
| composer.lockがあるときは、これを元にライブラリがインストールされる |
| composer.jsonのライブラリをインストールすると生成される

### composerでインストールしたパッケージ（ライブラリ）はどのディレクトリに格納されるのか
src\vendorディレクトリに格納される。