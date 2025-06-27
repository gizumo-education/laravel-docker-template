# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
　select * from todos;

### Todoモデルのallメソッドの返り値は何か
　Illuminate\Database\Eloquent\Collectionクラスのインスタンス

### 配列の代わりにCollectionクラスを使用するメリットは
　Laravelで用意されているクラスで配列操作に特化したクラスのため

### view関数の第1・第2引数の指定と何をしているか
　第一引数で画面に表示したいbladeファイルを指定。
　第二引数で渡したいデータを連想配列の形で渡す

### index.blade.phpの$todos・$todoに代入されているものは何か
  $todosには、Controllerにて取得したCollectionインスタンスが代入

  $todos
    Illuminate\Database\Eloquent\Collection {#265 ▼
      #items: array:4 [▶]
    }

  todosテーブルのレコードが代入
  $todo
    App\Todo {#266 ▼
    #table: "todos"
    #fillable: array:1 [▼
      0 => "content"
    ]
    #connection: "mysql"
    #primaryKey: "id"
    #keyType: "int"
    +incrementing: true
    #with: []
    #withCount: []
    #perPage: 15
    +exists: true
    +wasRecentlyCreated: false
    #attributes: array:4 [▼
      "id" => 1
      "content" => "PHP Appセクションを終える"
      "created_at" => "2025-06-04 04:36:05"
      "updated_at" => "2025-06-04 04:36:05"
    ]
    #original: array:4 [▼
      "id" => 1
      "content" => "PHP Appセクションを終える"
      "created_at" => "2025-06-04 04:36:05"
      "updated_at" => "2025-06-04 04:36:05"
    ]
    #changes: []
    #casts: []
    #dates: []
    #dateFormat: null
    #appends: []
    #dispatchesEvents: []
    #observables: []
    #relations: []
    #touches: []
    +timestamps: true
    #hidden: []
    #visible: []
    #guarded: array:1 [▼
      0 => "*"
    ]
  }

## Todo作成機能

### Requestクラスのallメソッドは何をしているか
　フォームから送信された値を個別ではなく連想配列で一括取得する

### fillメソッドは何をしているか
　引数に指定した連想配列を一括代入できる
　->fill()は$todo->{連想配列のkey} = {連想配列のvalue}を配列の全ての要素に対して行う。

### $fillableは何のために設定しているか
　一括代入には脆弱性があるので、$fillableを定義して代入できる項目に制限をかけるため

### saveメソッドで実行しているSQLは何か
　オブジェクトの状態をDBに保存するINSERT文を実行

### redirect()->route()は何をしているか
　リダイレクトさせることができる

## その他

### テーブル構成をマイグレーションファイルで管理するメリット
　SQLを知らなくても、PHPコードでテーブル操作ができるため学習コストが不要。
　マイグレーションファイルをGitで共有することで、開発者全員が同じテーブルを作成することができる。

### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
　up()はartisanコマンド　php artisan migrate
　down()はrollbackコマンド　php artisan migrate:rollback

### Seederクラスの役割は何か
　レコードの作成

### route関数の引数・返り値・使用するメリット
　route関数でいれた引数は返り値でURLを作成できる。
　使用することでURL作成ができ、URLの記述が簡単になり、可読性が向上。

### @extends・@section・@yieldの関係性とbladeを分割するメリット
　@extends()で継承する親Bladeを指定
　@section()~@endsectionで囲われた部分を、親親Bladeの@yield()の部分に挿入
　@section()@yield()の引数を同じ文字列を指定することで紐づけ。

　Bladeを分割することで、
　重複するコードを共通化して再利用できるようになるため、保守性が向上

### @csrfは何のための記述か
　CSRF対策のため

### {{ }}とは何の省略系か
　PHPの処理として認識する
　<?php ?>の省略
