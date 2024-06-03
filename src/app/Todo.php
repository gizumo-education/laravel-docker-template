<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    use SoftDeletes;
    // 追加
    protected $table = 'todos';
    // 追加
    protected $fillable = [
        'content'
    ];
}
