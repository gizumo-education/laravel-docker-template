<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //追記 // どのテーブルとつなげるかを教える
    protected $table = 'todos';

    // 追記2
    protected $fillable = [
        'content',
    ];
}

// 取得した値をModelに一括で代入
// この処理を行うことで、画面の入力項目が増減しても常に同じコードで登録処理が実現できるようになり保守性と可読性が向上する