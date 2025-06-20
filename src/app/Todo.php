<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // テーブル操作のためのマッピング
    protected $table = 'todos';
    // 一括代入を行うカラムの指定
    protected $fillable = [
        'content',
    ];
}
