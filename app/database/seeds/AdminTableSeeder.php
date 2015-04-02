<?php

class AdminTableSeeder extends Seeder {

	public function run()
	{
		$user = Sentry::createUser(array(
			'email'     	=> 'julienbaudet@sigagro.com',
			'password'  	=> 'Sigagro2015',
			'first_name'	=> 'Julien',
			'last_name'		=> 'Baudet',
			'phone'			=> '9999999999',
			'activated' 	=> true,
			'last_active'	=> Carbon::now()
		));

		$superAdmin = Sentry::findGroupById(1);

		$user->addGroup($superAdmin);
	}

}