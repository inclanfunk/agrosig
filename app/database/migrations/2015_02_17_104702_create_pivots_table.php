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
			$table->enum('brand', array('Valley', 'Linjsey', 'BTL', 'Reinke'));
			$table->enum('model', array('8000', '8120'));
			$table->string('quantity');
			$table->enum('coa_diameter', array('8 5/8', '6 5/8', '10'));
			$table->string('coa_length');
			$table->double('ndd', 15, 8);
			$table->double('ddd', 15, 8);
			$table->string('quantity2');
			$table->enum('coa_diameter2', array('8 5/8', '6 5/8', '10'));
			$table->string('coa_length2');
			$table->double('ndd2', 15, 8);
			$table->double('ddd2', 15, 8);
			$table->enum('sprinkler_model', array('IWOB', 'LDN', 'Spray'));
			$table->enum('sprikler_type', array('Flat', 'Concave'));
			$table->enum('sprikler_counterweight', array('Yes', 'No'));
			$table->enum('regulator_brand', array('Nelson', 'Sennizer'));
			$table->enum('regulator_type', array('10 PCI', '15 PCI'));
			$table->enum('regulator_range', array('All Range', 'Low Flow', 'High Flow'));
			$table->enum('wheel_size', array('14x9x24', '16x10x20'));
			$table->enum('co_length', array('2', '6', '9', '16', '25'));
			$table->enum('co_diameter', array('3', '4', '5', '6'));
			$table->integer('co_drops');
			$table->enum('alignment', array('Standard', 'Modified', 'Floating'));
			$table->enum('re_brand', array('Baldor', 'Emmerson'));
			$table->enum('re_type', array('High', 'Low'));
			$table->enum('re_rpm', array('34', '68'));
			$table->enum('re_relation', array('52:1', '54:1', '68:1'));
			$table->enum('masa_brand', array('Valley', 'Lindsey'));
			$table->enum('masa_type', array('Fixed', 'Mobile', 'Dual'));
			$table->enum('masa_relation', array('36 RPM', '68 RPM'));
			$table->enum('spreader_type', array('Fixed', 'Mobile'));
			$table->string('rotation_time');
			$table->string('sheet');
			$table->string('minimum_working_pressure');
			$table->string('input_voltage');
			$table->string('shut_down_low_voltage');
			$table->string('minimum_voltage');
			$table->string('working_pressure');
			$table->string('shut_down_for_low_pressure');
			$table->string('last_wheel_cycle');
			$table->string('pressuring_time');
			$table->string('pressurization_recon_time');
			$table->string('electical_conn_time');
			$table->string('restart_time');
			$table->enum('electrical_board_model', array('Basic', 'Std', 'Select', 'Select2', 'Pro', 'Pro2', 'Touch'));
			$table->string('electrical_board_contactors');
			$table->enum('electrical_board_brand', array('Weg', 'Siemens', 'Lindsay', 'TL', 'Reinke', 'Valley'));
			$table->string('relay_board');
			$table->string('protections');
			$table->enum('main_fuses', array('10 amp', '15 amp', '20 amp'));
			$table->string('main_fuses_comment');
			$table->enum('panel_fuses', array('10 amp', '15 amp', '20 amp'));
			$table->string('panel_fuses_comment');
			$table->string('panel_code');
			$table->string('lightning_arrester_code');
			$table->string('voltage_source_code');
			$table->string('pressure_sensor_code');
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
