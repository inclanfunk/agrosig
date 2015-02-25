<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('parts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->enum('type', array('Gear Train', 'Electricity', 'Sprinkling'));
			$table->string('code');
			$table->string('description');
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
		Schema::drop('parts');
	}

}
