<?php

namespace Database\Seeders;

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
            'name' => 'admin',
            'email' => 'admin@admin.ad',
            'password' => bcrypt('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'gestionnaire',
            'email' => 'gestionnaire@gestionnaire.ge',
            'password' => bcrypt('gestionnaire'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.us',
            'password' => bcrypt('user'),
        ]);
    }
}
