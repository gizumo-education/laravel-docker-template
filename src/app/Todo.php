<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 追記

class Todo extends Model
{

  use SoftDeletes; // 追記
   // 追加
    protected $table = 'todos';
    // 追記
    protected $fillable = [
        'content',
    ];
}
