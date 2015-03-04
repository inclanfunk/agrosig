<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWaterpumpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('waterpumps', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('farm_id')->unsigned();
			$table->foreign('farm_id')->references('id')->on('farms');
			$table->integer('waterpump_reseller_id')->unsigned();
			$table->foreign('waterpump_reseller_id')->references('id')->on('users');
			$table->double('lat', 15, 8);
			$table->double('long', 15, 8);
			$table->string('name');
			$table->enum('brand', array('Rotorpump', 'KSB', 'Grundfos', 'Sylwan', 'Banfy'));
			$table->enum('type', array('Submergible', 'Mechanical', 'Centrifuged'));
			$table->string('power');
			$table->string('volume');
			$table->string('height');
			$table->enum('engine_type', array('Capped', 'Rewindable'));
			$table->enum('voltage', array('380', '380/660V'));
			$table->string('amperage');
			$table->string('time_shift_boot');
			$table->string('imbalance');
			$table->string('restart_time');
			$table->string('low_voltage');
			$table->string('high_voltage');
			$table->string('low_charge');
			$table->string('amps_phase_r');
			$table->string('amps_phase_s');
			$table->string('amps_phase_t');
			$table->string('line_phase_r');
			$table->string('line_phase_s');
			$table->string('line_phase_t');
			$table->string('power_phase_r');
			$table->string('power_phase_s');
			$table->string('power_phase_t');
			$table->enum('electrical_board_type', array('Triangle', 'Star', 'Soft', 'Direct'));
			$table->enum('electrical_board_protection', array('Thermal', 'Electronic', 'Sub-Monior'));
			$table->string('line_fuse_caliber');
			$table->enum('contactor_brand', array('Weg', 'Siemens', 'Telemecanique', 'AEG', 'Schneider', 'Others',));
			$table->string('contactor_power');
			$table->enum('contactor_triange', array('Yes', 'No'));
			$table->string('contactor_triangle_comment');
			$table->enum('contactor_star', array('Yes', 'No'));
			$table->string('contactors_star_comment');
			$table->enum('contactor_line', array('Yes', 'No'));
			$table->string('contactor_line_comment');
			$table->string('deepwell_info');
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
		Schema::drop('waterpumps');
	}

}
