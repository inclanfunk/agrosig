<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run()
	{
		// Creatin an instance of Faker
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

		$user = Sentry::createUser(array(
			'email'     	=> 'julienbaudet@sigagro.com',
			'password'  	=> 'password',
			'first_name'	=> 'Julien',
			'last_name'		=> 'Baudet',
			'phone'			=> $faker->phoneNumber,
			'activated' 	=> true,
		));

		$superAdmin = Sentry::findGroupById(1);

		$user->addGroup($superAdmin);


		foreach(range(1, 100) as $index)
		{

			switch ($faker->numberBetween(2, 4)){
				case 2:

					$user = Sentry::createUser(array(
						'email'     	=> $faker->email,
						'password'  	=> $faker->word,
						'first_name'	=> $faker->firstName,
						'last_name'		=> $faker->lastName,
						'phone'			=> $faker->phoneNumber,
						'activated' 	=> true,
					));

					// Decide group for user using random number which is used later to create add. info
					$group = Sentry::findGroupById(2);

					$user->addGroup($group);

					$farm_companies = Company::where('type', '=', 'Farm')->get();
					$farms = Farm::all();

					$manager_details = [
						'user_id' => $user->id,
						'company_id' => $farm_companies->shuffle()->first()->id,
						'farm_id' => $farms->shuffle()->first()->id,
					];

					Manager::create($manager_details);

					break;
				case 3:

					$user = Sentry::createUser(array(
						'email'     	=> $faker->email,
						'password'  	=> $faker->word,
						'first_name'	=> $faker->firstName,
						'last_name'		=> $faker->lastName,
						'phone'			=> $faker->phoneNumber,
						'activated' 	=> true,
					));

					// Decide group for user using random number which is used later to create add. info
					$group = Sentry::findGroupById(3);

					$user->addGroup($group);

					$distributor_companies = Company::where('type', '=', 'Distributor')->get();

					$farms = Farm::all();

					$distributor_details = [
						'user_id' => $user->id,
						'company_id' => $distributor_companies->shuffle()->first()->id,
						'farm_id' => $farms->shuffle()->first()->id,
					];

					Distributor::create($distributor_details);

					break;
				case 4:

					$user = Sentry::createUser(array(
						'email'     	=> $faker->email,
						'password'  	=> $faker->word,
						'first_name'	=> $faker->firstName,
						'last_name'		=> $faker->lastName,
						'phone'			=> $faker->phoneNumber,
						'activated' 	=> true,
					));

					// Decide group for user using random number which is used later to create add. info
					$group = Sentry::findGroupById(4);

					$user->addGroup($group);

					$water_pump_companies = Company::where('type', '=', 'Water Pump')->get();

					$water_pump_reseller_details = [
						'user_id' => $user->id,
						'company_id' => $water_pump_companies->shuffle()->first()->id,
					];

					WaterPumpReseller::create($water_pump_reseller_details);
					break;
			}
		}
	}

}