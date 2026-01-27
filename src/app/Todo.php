<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $table = 'todos'; //データベースの todos というテーブルと対応していることを指定
    
    protected $fillable = [
        'content',
    ];
}
