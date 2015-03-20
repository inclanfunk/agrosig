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
			$table->enum('g_brand', array('Rotorpump', 'KSB', 'Grundfos', 'Sylwan', 'Banfy'));
			$table->enum('g_type', array('Submergible', 'Mechanical', 'Centrifuged'));
			$table->string('g_power');
			$table->string('g_volume');
			$table->string('g_hieght');
			$table->enum('g_engine_type', array('Capped', 'Rewindable'));
			$table->enum('g_voltage', array('380', '380/660V'));
			$table->string('g_amperage');
			$table->string('s_time_shift_boot');
			$table->string('s_imbalance');
			$table->string('s_restart_time');
			$table->string('s_low_voltage');
			$table->string('s_high_voltage');
			$table->string('s_low_charge');
			$table->string('s_amps_phase_r');
			$table->string('s_amps_phase_s');
			$table->string('s_amps_phase_t');
			$table->string('s_line_phase_r');
			$table->string('s_line_phase_s');
			$table->string('s_line_phase_t');
			$table->string('s_power_phase_r');
			$table->string('s_power_phase_s');
			$table->string('s_power_phase_t');
			$table->enum('eb_type', array('Triangle', 'Star', 'Soft', 'Direct'));
			$table->enum('eb_protection', array('Thermal', 'Electronic', 'Sub-Monior'));
			$table->string('eb_line_fuse_caliber');
			$table->enum('eb_contactor_brand', array('Weg', 'Siemens', 'Telemecanique', 'AEG', 'Schneider', 'Others',));
			$table->string('eb_contactor_power');
			$table->enum('eb_contactor_triange', array('Yes', 'No'));
			$table->string('eb_contactor_triangle_comment');
			$table->enum('eb_contactor_star', array('Yes', 'No'));
			$table->string('contactors_star_comment');
			$table->enum('eb_contactor_line', array('Yes', 'No'));
			$table->string('eb_contactor_line_comment');
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
