<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostsSeeder extends Seeder
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
	        DB::table('posts')->insert([
                'title'        => $faker->sentence,
                'content'      => $faker->text,
                'image'        => 'noimage.jpg',
                'author'       => $faker->name,
                'created_at'   => $faker->date,
	        ]);
	    }
    }
}
