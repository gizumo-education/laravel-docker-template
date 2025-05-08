<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 追記

class Todo extends Model
{
    use SoftDeletes; // 追記

    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
    //こうすることで、画面の入力項目が増減しても常に同じコードで登録処理が実現できるようになり保守性と可読性が向上しました。

}
