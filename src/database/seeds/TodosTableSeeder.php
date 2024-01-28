<?php

use Illuminate\Database\Seeder;

class TodosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('todos')->insert([
            [
                'content' => '開発環境を開発する',
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'to install Laravel',
                'is_completed' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'To Learn Laravel',
                'is_completed' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
