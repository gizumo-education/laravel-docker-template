<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model //Todoというクラスを定義し、それをModelクラスから継承
{
    protected $table = 'todos'; //データベースの todos というテーブルと対応していることを指定
    
    protected $fillable = [
        'content',
    ]; //->fill()によってModelに代入可能なプロパティを記述し、代入できる項目に制限をかける
}
