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
        DB::table('users')->insert([
            ['email' => 'admin@admin', 'name' => 'admin', 'password' => bcrypt('admin'), 'role' => 'admin', 'darkmode' => 1]
        ]);
    }
}
