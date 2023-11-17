<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 追記

class Todo extends Model
{

    use SoftDeletes; // 追記
    //論理削除用

    //追加
    protected $table = 'todos';

    //追加
    //fill()を利用したい場合には、下記のプロパティを定義する
    protected $fillable = [
        'content'
    ];
}
