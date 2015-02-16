<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class GroupTableSeeder extends Seeder {

	public function run()
	{
		$faker = Faker::create();

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Super Administrator',
			'permissions' => array(
			        'system' => 1,
			),
		));

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Manager',
		));

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Distributor',
		));

		Sentry::getGroupProvider()->create(array(
			'name'        => 'Water Pump Reseller',
		));

		/*foreach(range(1, 10) as $index)
		{
			Group::create([

			]);
		}*/
	}

}