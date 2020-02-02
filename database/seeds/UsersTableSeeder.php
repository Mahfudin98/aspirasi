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
            'password' => bcrypt('admin123'),
            'jabatan' => 'Sekertaris',
            // 'phonenumber' => '083823386071',
        ]);
    }
}
