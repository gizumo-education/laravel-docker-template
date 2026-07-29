<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
//LaravelのModelクラスを継承したTodoクラスを定義
//Modelクラスはvendor/laravel/framework/src/Illuminate/Database/Eloquent/Model.phpにて定義されている
{
    protected $table = 'todos';
    //後から変更しない値のためprotectedで代入（定数のようなイメージ）

    protected $fillable = [
        'content',
        //$fillableは変更可能なカラムを指定する
        //contentカラム以外は一括代入できないように制限
    ];
}