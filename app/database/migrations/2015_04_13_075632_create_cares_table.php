<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCaresTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cares', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('crop_section_id')->unsigned();
			$table->foreign('crop_section_id')->references('id')->on('crop_sections');
			$table->integer('achieve_density');
			$table->integer('distance_between_lines');
			$table->enum('irrigation', array('July', 'August', 'September', 'October', 'November', 'December', 'January', 'February', 'March', 'April', 'May', 'June'));
			$table->integer('irrigation_quantity');
			$table->double('nitrogen', 15, 2);
			$table->double('phosphorus', 15, 2);
			$table->double('potassium', 15, 2);
			$table->double('sulphur', 15, 2);
			$table->double('other', 15, 2);
			$table->timestamp('date_of_harvest');
			$table->integer('humidity');
			$table->integer('yield');
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
		Schema::drop('cares');
	}

}
