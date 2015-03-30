<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class WaterpumpTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$farms = Farm::all();
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();

		foreach(range(1, 500) as $index)
		{
			Waterpump::create([
				'farm_id' 		=> $farms->shuffle()->first()->id,
				'company_id' 	=> $distributor_companies->shuffle()->first()->id,
				'name' 			=> 'Waterpump' . $index
			]);
		}
	}

}