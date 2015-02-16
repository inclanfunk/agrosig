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
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');
			$table->integer('distributor_id')->unsigned();
			$table->foreign('distributor_id')->references('id')->on('users');
			$table->string('name');
			$table->string('direction');
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
