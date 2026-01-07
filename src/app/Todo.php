<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';  //todosテーブルとマッピング

    //取得した値をModelに一括で代入・複数代入の脆弱性対策
    protected $fillable = [
        'content',
    ];
}
