# Laravel Lesson レビュー①

## Todo一覧機能

### Todoモデルのallメソッドで実行しているSQLは何か
→ SELECT * FROM todos;

### Todoモデルのallメソッドの返り値は何か
→ Collectionクラス

### 配列の代わりにCollectionクラスを使用するメリットは
→ 配列の場合だとKeyが存在しない時にエラーが返ってくるが、Collectionクラスだとnullが返る。<br/>またCollectionクラスなのでallやgetのようなEloquentメソッドが使用できる
### view関数の第1・第2引数の指定と何をしているか
→ 第1にはテンプレート、第2引数には連想配列(テンプレート側に変数として渡される)
### index.blade.phpの$todos・$todoに代入されているものは何か
→ $todosにはTodoControllerのview関数から渡される連想配列が代入される。

  $todoにはforeach構文で連想配列から取り出される変数が代入される
## Todo作成機能

### Requestクラスのallメソッドは何をしているか
→ create.blade.phpのinputタグのname属性の値をformから取得している

### fillメソッドは何をしているか
→ $todo（Model）の各プロパティに対してformの値を一括代入している
### $fillableは何のために設定しているか
→ 一括代入するにあたり、一括代入できるプロパティを設定
### saveメソッドで実行しているSQLは何か
→ INSERT INTO todos (プロパティ名) VALUE (値) 
### redirect()->route()は何をしているか
→ route()の()に記述されている先に対してredirectする
## その他

### テーブル構成をマイグレーションファイルで管理するメリット
→ １.PHPコードでテーブル操作をすることができる

→ 2.マイグレーションファイルをGitで共有することで、開発者全員が同じテーブルを作成することができる
### マイグレーションファイルのup()、down()は何のコマンドを実行した時に呼び出されるのか
→ php artisan migrate

### Seederクラスの役割は何か
→ テストデータを作成する役割

### route関数の引数・返り値・使用するメリット
→ 引数は、string|null
→ 返り値は、\Illuminate\Routing\Route|object|string|null
→ メリットは、直接urlを書かなくても良くなるので可読性が高くなる点と、urlの修正が起こった場合でもルート名が変わらなければ修正箇所がweb.phpだけに収められる点tenn。
### @extends・@section・@yieldの関係性とbladeを分割するメリット
→ @extendsで継承するファイル(親blade)を指定し、親bladeの@yieldに挿入する内容を@sectionに記述する。

→ メリットは重複するコードが共通化されることで保守性が高まる

### @csrfは何のための記述か
→ クロスサイトリクエストフォージェリの対策のため、Laravelはformを送信する際、@csrfをform内に記載しておくことで、CSRF対策のためのトークンが含まれたinputタグが生成され、

→ CSRF対策のトークンも一緒に送信され、Laravel側でトークンの検証も自動的に行われる。

### {{ }}とは何の省略系か
→ <?php echo  ?>