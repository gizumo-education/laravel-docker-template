<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'content', //contentカラム以外は一括代入できないように制限
    ];
}