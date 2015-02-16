<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FarmTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$group = Sentry::findGroupByName('Distributor');
		$users = Sentry::findAllUsersInGroup($group);

		foreach(range(1, 100) as $index)
		{
			Farm::create([
				'name' => $faker->company,
				'company_id' => $faker->numberBetween(1, 100),
				'distributor_id' => $users->shuffle()->first()->id,
				'direction' => $faker->buildingNumber . ' ' . $faker->streetSuffix,
				'zip' => $faker->postcode,
				'state' => $faker->state,
				'country' => $faker->country,
				'phone' => $faker->phoneNumber,
				'fax' => $faker->phoneNumber,
				'email' => $faker->email,
			]);
		}
	}

}