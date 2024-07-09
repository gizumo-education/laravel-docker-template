<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //マッピング
    protected $table = 'todos';

    protected $fillable = [
        'content',
    ];

}