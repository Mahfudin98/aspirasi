<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name' => 'Mahfudin',
        	'email' => 'admin@admin.com',
        	'password' => bcrypt('admin123')
        ]);

        DB::table('users')->insert([
        	'name' => 'Nawawi',
        	'email' => 'nawawi@admin.com',
        	'password' => bcrypt('admin123')
        ]);

        DB::table('users')->insert([
        	'name' => 'Mustofa',
        	'email' => 'Mustofa@admin.com',
        	'password' => bcrypt('admin123')
        ]);
    }
}
