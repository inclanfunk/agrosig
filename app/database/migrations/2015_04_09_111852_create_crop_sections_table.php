<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCropSectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('crop_sections', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('crop_id')->unsigned();
			$table->foreign('crop_id')->references('id')->on('crops');
			$table->integer('pivot_id')->unsigned();
			$table->foreign('pivot_id')->references('id')->on('pivots');
			$table->decimal('start_angle', 5, 1);
			$table->decimal('stop_angle', 5, 1);
			$table->string('variety_or_hybrid');
			$table->integer('predecessor')->unsigned();
			$table->foreign('predecessor')->references('id')->on('crops');
			$table->enum('years', array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '10+'));
			$table->enum('seeding_system', array('Direct', 'Traditional'));
			$table->integer('density');
			$table->enum('density_type', array('KG/Hectares', 'Seeds/Hectares'));
			$table->timestamp('date_of_seeding');
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
		Schema::drop('crop_sections');
	}

}
