<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->truncate(); // 2. 追記(テーブルに追加する前に、テーブルに入っている古いデータを削除する命令)

        $testData = [
            [
                'content' => 'PHP Appセクションを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Laravel Lessonを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];
    
        DB::table('todos')->insert($testData); // 1. 追記(テーブルに追加する命令)
    }
}
