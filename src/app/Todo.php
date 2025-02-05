<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; //トレイト クラスにプロパティやメソッドを追加するための機能

class Todo extends Model
{
    use SoftDeletes;

    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
}
