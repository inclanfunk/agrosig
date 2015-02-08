<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Creatin an instance of Faker
		$faker = Faker::create();

		DB::table('users')->truncate();
		DB::table('groups')->truncate();

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Super Administrator',
			'permissions' => array(
			        'system' => 1,
			),
		));

		$user = Sentry::createUser(array(
			'email'     	=> 'julienbaudet@sigagro.com',
			'password'  	=> 'password',
			'first_name'	=> 'Julien',
			'last_name'		=> 'Baudet',
			'activated' 	=> true,
		));

		$superAdmin = Sentry::findGroupById(1);

		$user->addGroup($superAdmin);


		/*foreach(range(1, 10) as $index)
		{
			User::create([

			]);
		}*/
	}

}