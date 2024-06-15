<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 追記

// TodoModelをデータベースのtodosテーブルとマッピング
// SQL文を組み立てることなくtodosテーブルを操作することができる
class Todo extends Model
{
    use SoftDeletes; // 追記

    protected $table = 'todos';

    // contentカラムはfillメソッドによる値の登録・書き換えが可能、それ以外のカラムは不可
    protected $fillable = [
        'content',
    ];
}
