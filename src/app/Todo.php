<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //セクション８追加
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];
    //こうすることで、画面の入力項目が増減しても常に同じコードで登録処理が実現できるようになり保守性と可読性が向上しました。

}
