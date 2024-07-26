<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    //シーダークラスを登録
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TodoSeeder::class
        ]);
    }
}