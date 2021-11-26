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

        DB::table('images_upvotes')->insert([
            ['id' => '0', 'image_id' => -1, 'created_at' => '', 'updated_at' => '']
        ]);

        DB::table('cities')->insert(['name' => 'Istanbul']);
        DB::table('cities')->insert(['name' => 'Amsterdam']);
        DB::table('cities')->insert(['name' => 'London']);
        DB::table('cities')->insert(['name' => 'New York']);
        DB::table('cities')->insert(['name' => 'Tokyo']);

        DB::table('city_user')->insert(['user_id' => 1, 'city_id' => 1]);
        DB::table('city_user')->insert(['user_id' => 1, 'city_id' => 2]);
        DB::table('city_user')->insert(['user_id' => 1, 'city_id' => 3]);
    }
}
