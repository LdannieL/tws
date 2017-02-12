<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

use Faker\Factory as Faker;


class UsersTableSeeder extends Seeder
{
    public function run()
    {
		$faker = Faker::create();

		foreach(range(1, 5) as $index)
		{
			App\models\User::create([
                'email' => $faker->email(),
                'name' => $faker->name(),
                'password' => Hash::make('dannie123')
			]);
		}
    }
}
