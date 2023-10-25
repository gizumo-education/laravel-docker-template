<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //追加
    protected $table = 'todos';

    //追加
    //fill()を利用したい場合には、下記のプロパティを定義する
    protected $fillable = [
        'content'
    ];
}
