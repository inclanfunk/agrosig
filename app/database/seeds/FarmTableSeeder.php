<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class FarmTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$farm_companies = Company::where('type', '=', 'Farm')->get();
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();

		foreach(range(1, 100) as $index)
		{
			Farm::create([
				'name' => $faker->company,
				'farm_company_id' => $farm_companies->shuffle()->first()->id,
				'distributor_company_id' => $distributor_companies->shuffle()->first()->id,
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