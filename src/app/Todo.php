<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos';

    // 配列にして渡せるから、複数の値を渡すときに便利になる？
    protected $fillable = [
        'content'
    ];
}
