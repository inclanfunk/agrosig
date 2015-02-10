<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompaniesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('companies', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('type', array('Farm', 'Distributer', 'Water Pump'));
			$table->string('name');
			$table->string('ceo_first_name');
			$table->string('ceo_last_name');
			$table->string('direction');
			$table->integer('zip');
			$table->string('state');
			$table->string('country');
			$table->string('phone');
			$table->string('fax');
			$table->string('website');
			$table->string('email');
			$table->string('description');
			$table->string('geojson');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('companies');
	}

}
