<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TodoSeeder::class,
        ]);
    }
}


// publicはどこからでも使える

// this->call は、登録したクラスを実行するための命令

// $this ... 現在のクラスの中(自分が今いる場所)
// call ... 呼び出す
//  TodoSeeder::class, ... シーダークラスを指定してる(ーダーがどこにあるかを教えてあげるための方法)

// 今いる場所を呼び出す処理...$this->call([TodoSeeder::class]):
// 「今自分がいるクラスから、TodoSeeder というシーダークラスを呼び出して実行してください」という意味

// DatabaseSeeder.php ファイルは、Laravel プロジェクトを初めて作成したときに自動的に生成されます。
