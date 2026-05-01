<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // 追記 Laravel②

class Todo extends Model
{
   use SoftDeletes; // 追記 Laravel②

   protected $table = 'todos';

   protected $fillable = [
        'content',
    ];
}
