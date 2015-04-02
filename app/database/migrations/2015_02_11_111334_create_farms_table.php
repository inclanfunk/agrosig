<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFarmsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('farms', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('farm_company_id')->unsigned();
			$table->foreign('farm_company_id')->references('id')->on('companies');
			$table->integer('distributor_company_id')->unsigned();
			$table->foreign('distributor_company_id')->references('id')->on('companies');
			$table->string('name');
			$table->string('direction');
			$table->string('locality');
			$table->integer('zip');
			$table->string('state');
			$table->string('country');
			$table->string('phone');
			$table->string('fax');
			$table->string('email');
			$table->string('logo');
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
		Schema::drop('farms');
	}

}
