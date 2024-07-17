<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model //todoclassがModelclassを継承しています。つまりIlluminate\Database\Eloquent\Model内で定義した処理が使用できるようになっています。
{
    protected $table = 'todos'; //これはtodosというテーブルを$tableに代入しています。

    protected $fillable = [
        'content', 
    ];//ここでfillメソッドでとってくる値を指定している
}
