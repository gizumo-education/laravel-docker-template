<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Todo extends Model
{
    use SoftDeletes;
    // テーブル操作のためのマッピング
    protected $table = 'todos';
    // 一括代入を行うカラムの指定
    protected $fillable = [
        'content',
    ];
}
