<?php
// `app` フォルダ直下に配置されている」という位置情報を定義
namespace App;
// Laravelでデータベース操作を担当する機能（**Eloquent / エロクアント**）の基本クラスである `Model` を読み込む
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

// クラスを継承（`extends`）して、**Todo** という名前のモデルクラスを作成
class Todo extends Model
{
    use SoftDeletes;
    // テーブルと確実に紐付け
    protected $table = 'todos';

    // **データをまとめて保存（一括割り当て）する際に、変更を許可するカラム名を指定
    // フィラブル
    protected $fillable = [
        'content',
    ];
}
// →　MYSQLのtodosテーブル　todoデータを保存
