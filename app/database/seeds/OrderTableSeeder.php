<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class OrderTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		$farms = Farm::with('pivots', 'waterpumps')->get();
		$distributor_companies = Company::where('type', '=', 'Distributor')->get();

		foreach(range(1, 1000) as $index)
		{
			$farm_id = $farms->shuffle()->first()->id;

			if(Pivot::where('farm_id', '=', $farm_id)->count() && Waterpump::where('farm_id', '=', $farm_id)->count()){
				$pivot_id = Pivot::where('farm_id', '=', $farm_id)->get()->shuffle()->first()->id;
				$waterpump_id = Waterpump::where('farm_id', '=', $farm_id)->get()->shuffle()->first()->id;
			}else{
				continue;
			}
			

			Order::create([
				'farm_id' 			=> $farm_id,
				'company_id' 		=> $distributor_companies->shuffle()->first()->id,
				'pivot_id'			=> $pivot_id,
				'waterpump_id'		=> $waterpump_id,
				'order_number'		=> 'Order' . $index,
				'date'				=> $faker->dateTimeThisYear($max = 'now'),
				'total_cost'		=> $faker->numberBetween(1, 500),

			]);
		}
	}

}