<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePivotsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pivots', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('farm_id')->unsigned();
			$table->foreign('farm_id')->references('id')->on('farms');
			$table->integer('distributor_id')->unsigned();
			$table->foreign('distributor_id')->references('id')->on('users');
			$table->double('lat', 15, 8);
			$table->double('long', 15, 8);
			$table->decimal('radius', 5, 2);
			$table->string('name');
			$table->enum('g_brand', array('Valley', 'Linjsey', 'BTL', 'Reinke'));
			$table->enum('g_model', array('8000', '8120'));
			$table->string('g_quantity_of_arms_10_quantity');
			$table->string('g_quantity_of_arms_10_length');
			$table->double('g_quantity_of_arms_10_number_of_drops', 15, 8);
			$table->double('g_quantity_of_arms_10_distance_between_drops', 15, 8);
			$table->string('g_quantity_of_arms_8_5by8_quantity');
			$table->string('g_quantity_of_arms_8_5by8_length');
			$table->double('g_quantity_of_arms_8_5by8_number_of_drops', 15, 8);
			$table->double('g_quantity_of_arms_8_5by8_distance_between_drops', 15, 8);
			$table->string('g_quantity_of_arms_6_5by8_quantity');
			$table->string('g_quantity_of_arms_6_5by8_length');
			$table->double('g_quantity_of_arms_6_5by8_number_of_drops', 15, 8);
			$table->double('g_quantity_of_arms_6_5by8_distance_between_drops', 15, 8);
			$table->enum('g_sprinkler_model', array('IWOB', 'LDN', 'Spray'));
			$table->enum('g_sprikler_type', array('Flat', 'Concave'));
			$table->enum('g_sprinkler_counterweight', array('Yes', 'No'));
			$table->enum('g_regulator_brand', array('Nelson', 'Sennizer'));
			$table->enum('g_regulator_type', array('10 PCI', '15 PCI'));
			$table->enum('g_regulator_range', array('All Range', 'Low Flow', 'High Flow'));
			$table->enum('g_wheel_size', array('14x9x24', '16x10x20'));
			$table->enum('g_overhang_length', array('2', '6', '9', '16', '25'));
			$table->enum('g_overhang_diameter', array('3', '4', '5', '6'));
			$table->integer('g_overhang_distance_between_drops');
			$table->enum('g_alignment', array('Standard', 'Modified', 'Floating'));
			$table->enum('g_rolling_train_brand', array('Baldor', 'Emmerson'));
			$table->enum('g_rolling_train_type', array('High', 'Low'));
			$table->enum('g_rolling_train_rpm', array('34', '68'));
			$table->enum('g_rolling_train_relationship', array('52:1', '54:1', '68:1'));
			$table->enum('g_masa_brand', array('Valley', 'Lindsey'));
			$table->enum('g_masa_type', array('Fixed', 'Mobile', 'Dual'));
			$table->enum('g_masa_relation', array('36 RPM', '68 RPM'));
			$table->enum('g_spreader_type', array('Fixed', 'Mobile'));
			$table->string('s_rotation_time');
			$table->string('s_sheet');
			$table->string('s_minimum_working_pressure');
			$table->string('s_input_voltage');
			$table->string('s_shut_down_low_voltage');
			$table->string('s_minimum_voltage');
			$table->string('s_working_pressure');
			$table->string('s_shut_down_for_low_pressure');
			$table->string('s_last_wheel_cycle');
			$table->string('s_pressuring_time');
			$table->string('s_pressurization_recon_time');
			$table->string('s_electical_conn_time');
			$table->string('s_restart_time');
			$table->enum('eb_model', array('Basic', 'Std', 'Select', 'Select2', 'Pro', 'Pro2', 'Touch'));
			$table->string('eb_contactors');
			$table->enum('eb_brand', array('Weg', 'Siemens', 'Lindsay', 'TL', 'Reinke', 'Valley'));
			$table->string('eb_relay_board');
			$table->string('eb_protections');
			$table->enum('eb_main_fuses', array('10 amp', '12 amp', '15 amp', '17 amp', '20 amp', '25 amp'));
			$table->string('eb_main_fuses_comment');
			$table->enum('eb_panel_fuses', array('2 amp', '4 amp', '5 amp'));
			$table->string('eb_panel_fuses_comment');
			$table->string('eb_lightning_arrester_code');
			$table->string('eb_voltage_source_code');
			$table->string('eb_pressure_sensor_code');
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
		Schema::drop('pivots');
	}

}
