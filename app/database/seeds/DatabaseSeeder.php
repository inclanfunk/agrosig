<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		$this->call('CompanyTableSeeder');
		$this->call('GroupTableSeeder');
		$this->call('AdminTableSeeder');
		$this->call('DistributorTableSeeder');
		$this->call('FarmTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PivotTableSeeder');
		$this->call('WaterpumpTableSeeder');
		$this->call('OrderTableSeeder');
	}

}
