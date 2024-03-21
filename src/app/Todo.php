<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // モデルが使用するデータベーステーブルの名前を指定します
    protected $table = 'todos';

    // モデルの属性をホワイトリストで設定します。ここで指定された属性のみ、fillメソッドで一括代入できます
    protected $fillable = [
        'content'
    ];
}
