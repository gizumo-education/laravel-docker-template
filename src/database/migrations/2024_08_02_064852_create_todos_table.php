<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content'); // 追加 //todosテーブルのcontentカラムを追加している
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}

// app コンテナ(ターミナル)
// 1. マイグレーションファイルの作成で、作成されたページ

// PS C:\Users\msait\Laravel-Lesson> docker-compose exec app bash
// root@024c0ead41ee:/var/www/src# php artisan make:migration create_todos_table

