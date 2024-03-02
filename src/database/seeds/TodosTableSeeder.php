<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todos')->insert([
            [
                'content' => '開発環境を構築する',
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Laravelをインストール',
                'is_completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
