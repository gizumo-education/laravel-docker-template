<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{

    use SoftDeletes;

    // モデルが使用するデータベーステーブルの名前を指定します
    protected $table = 'todos';

    // モデルの属性をホワイトリストで設定します。ここで指定された属性のみ、fillメソッドで一括代入できます
    protected $fillable = [
        'content'
    ];
}
