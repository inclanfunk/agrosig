<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class PivotTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$farms = Farm::all();
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();

		foreach(range(1, 500) as $index)
		{
			Pivot::create([
				'farm_id' 		=> $farms->shuffle()->first()->id,
				'company_id' 	=> $distributor_companies->shuffle()->first()->id,
				'name' 			=> 'Pivot' . $index
			]);
		}
	}

}