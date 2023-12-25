<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //追加
    protected $table = 'todos';
    
    protected $fillable = [ //リクエストから取得した値をtodosテーブルに登録
        'content'
    ];
}
