<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //セクション８追加
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
}
