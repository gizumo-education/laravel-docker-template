<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    // 追加
    protected $table = 'todos';
    // 追加
    protected $fillable = [
        'content'
    ];
}
