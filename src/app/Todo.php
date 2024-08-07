<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    //追記 // どのテーブルとつなげるかを教える
    protected $table = 'todos';
}
