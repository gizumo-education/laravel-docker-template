<?php

use Illuminate\Database\Seeder;

class DabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);削除
        $this->call(TodosTableSeeder::class);
    }
}
