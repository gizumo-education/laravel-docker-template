<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    // 論理削除のためのトレイトの適用
    use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
}
