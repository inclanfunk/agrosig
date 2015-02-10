<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CompanyTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		DB::table('companies')->truncate();

		foreach(range(1, 100) as $index)
		{
			Company::create([
				'type' => $faker->randomElement([1, 2, 3]),
				'name' => $faker->company,
				'ceo_first_name' => $faker->firstNameMale,
				'ceo_last_name' => $faker->lastName,
				'direction' => $faker->buildingNumber . ' ' . $faker->streetSuffix,
				'zip' => $faker->postcode,
				'state' => $faker->state,
				'country' => $faker->country,
				'phone' => $faker->phoneNumber,
				'fax' => $faker->phoneNumber,
				'website' => 'www.example.com',
				'email' => $faker->email,
				'description' => $faker->paragraph($nbSentences = 3)
			]);
		}
	}

}