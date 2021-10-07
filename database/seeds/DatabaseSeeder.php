<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('themes')->insert(['name' => 'Light', 'path' => 'light-theme']);
        DB::table('themes')->insert(['name' => 'Dark', 'path' => 'dark-theme']);
        DB::table('themes')->insert(['name' => 'Violet', 'path' => 'violet-theme']);
    }
}
