<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ComplaintsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('complaints')->insert([
                'nama'          => $faker->name,
                'email'         => $faker->email,
                'keterangan'    => 'mahasiswa',
                'file'          => 'noimage.jpg',
                'masukan'       => $faker->text,
                'jenis_privasi' => 'anonim',
                'kategori'      => 'keluhan',
                'created_at'    => $faker->date,
	        ]);
        }

        $faker = Faker::create();
    	foreach (range(1,10) as $index) {
	        DB::table('complaints')->insert([
                'nama'          => $faker->name,
                'email'         => $faker->email,
                'keterangan'    => 'umum',
                'file'          => 'noimage.jpg',
                'masukan'       => $faker->text,
                'jenis_privasi' => 'umum',
                'kategori'      => 'masukan',
                'created_at'    => $faker->date,
	        ]);
	    }
    }
}
