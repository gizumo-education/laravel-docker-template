<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * どのseederを実行するかの制御
     *
     * @return void
     */
    public function run()
    {
        $this->call(TodosTableSeeder::class);
    }
}
