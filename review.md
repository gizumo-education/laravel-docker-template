# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
SELECT * FROM ['todos'];

### Todoモデルのallメソッドの返り値は何か
Illuminate\Database\Eloquent\Collectionインスタンスを返しています。

### 配列の代わりにCollectionクラスを使用するメリットは
Collectionクラスは配列データを操作するためのラッパーで、配列を操作するためにチェーンで繋げることができ、
またメソッド名によって何を行うか明白なため、コードが読みやすくなるメリットがあります。

### view関数の第1・第2引数の指定と何をしているか
Controllerから、HTMLを表すbladeファイルへデータを渡している。
第1引数は、画面に表示したいbladeファイルを指定しています。
第2引数は、渡したいデータを連想配列の形で渡しています。

### index.blade.phpの$todos・$todoに代入されているものは何か
 $todos Illuminate\Database\Eloquent\Collectionインスタンスが代入されています。
 $todo Todoインスタンスが代入されています。


## Todo作成機能

### Requestクラスのallメソッドは何をしているか
フォームから送信された値を個別ではなく一括で取得しています。

### fillメソッドは何をしているか
連想配列で取得した値を->fill()を使用して、Todoインスタンスの各プロパティに一括で代入しています。

### $fillableは何のために設定しているか
一括代入には脆弱性があるため、代入可能なプロパティを記述をして制限をかけることで悪意のある攻撃を防いでいます。

### saveメソッドで実行しているSQLは何か
INSERT INTO todos VALUES ($inputs);

### redirect()->route()は何をしているか
一覧画面にリダイレクトする処理をしています。

### RequestクラスからFormRequestクラスに変更した理由


### $errorsのhasメソッドの引数・返り値は何か


### $errorsのfirstメソッドの引数・返り値は何か


## その他


### テーブル構成をマイグレーションファイルで管理するメリット
現在のデータベースの状態を他の開発者に共有することが出来る為です。

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
up()→　php artisan make:migration
down()→ php artisan migrate:rollback

### Seederクラスの役割は何か
開発者間のテストデータに差異が生じないようにする役割

### TodoControllerクラスのコンストラクタはどのタイミングで実行されるか
一覧画面表示のタイミングで実行されます。

### route関数の引数・返り値・使用するメリット
route('ルート名')とすることで、ルート名からそのルートで設定したURLを生成することができます。

### @extends・@section・@yieldの関係性とbladeを分割するメリット
@extends()で継承する親bladeを指定しています。
@section() ~ @endsection で囲われている部分を親bladeの @yield() の部分に挿入することができます。
メリット：複数のbladeを組み合わせて１枚のHTMLを作成することができます。
重複するコードを共通化して再利用が出来るようになるため、保守性が向上します。


### @csrfは何のための記述か
フォームを送信した時に、CSRF対策のトークンが送信されないと無効なページと判断されてしまうためです。あとCSRF対策の記述です。

### {{ }}とは
bladeで、phpを記述する時に使います。{{ }}部分はPHP処理として認識されます。
