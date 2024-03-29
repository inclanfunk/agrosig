<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLayersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('layers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('care_id')->unsigned();
			$table->foreign('care_id')->references('id')->on('cares');
			$table->enum('layer', array('0-20 cm', '20-40 cm', '40-60 cm', '60-80 cm', '80-100 cm'));
			$table->double('mo', 15, 2);
			$table->double('nno3', 15, 2);
			$table->double('ntot', 15, 2);
			$table->double('pbray', 15, 2);
			$table->double('polsen', 15, 2);
			$table->double('dap', 15, 2);
			$table->double('ph', 15, 2);
			$table->double('ce', 15, 2);
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
		Schema::drop('layers');
	}

}
