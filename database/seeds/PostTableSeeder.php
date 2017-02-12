<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

use Faker\Factory as Faker;

class PostTableSeeder extends Seeder {

    public function run()
    {
    	$faker = Faker::create();
    	
		foreach(range(1, 10) as $index)
		{
			App\models\Post::create([
				'title' => $faker->sentence(),
				'body' => $faker->realText(1000),
				'user_id' => rand(1,5)

			]);
		}
    }

}