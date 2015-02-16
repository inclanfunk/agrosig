<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class DistributorTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		foreach(range(1, 50) as $index)
		{
			$user = Sentry::createUser(array(
				'email'     	=> $faker->email,
				'password'  	=> $faker->word,
				'first_name'	=> $faker->firstName,
				'last_name'		=> $faker->lastName,
				'phone'			=> $faker->phoneNumber,
				'activated' 	=> true,
			));

			$group = Sentry::findGroupById(3);

			$user->addGroup($group);

			$distributor_companies = Company::where('type', '=', 'Distributor')->get();

			$distributor_details = [
				'user_id' => $user->id,
				'company_id' => $distributor_companies->shuffle()->first()->id,
			];

			Distributor::create($distributor_details);
		}
	}

}