<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('farm_id')->unsigned();
			$table->foreign('farm_id')->references('id')->on('farms');
			$table->integer('company_id')->unsigned();
			$table->foreign('company_id')->references('id')->on('companies');
			$table->integer('pivot_id')->unsigned();
			$table->foreign('pivot_id')->references('id')->on('pivots');
			$table->integer('waterpump_id')->unsigned();
			$table->foreign('waterpump_id')->references('id')->on('waterpumps');
			$table->string('order_number');
			$table->enum('pivot_task', array('Labor', 'Changing Parts'));
			$table->enum('pivot_category', array('Gear Train', 'Electricity', 'Sprinkling'));
			$table->enum('gear_train', array('Masa', 'Motor Reduction', 'Cross Head'))->nullable();
			$table->enum('electricity', array('Electronic', 'Box Section', 'Panels'))->nullable();
			$table->enum('sprinkling', array('Wear', 'Flow Changes', 'Others'))->nullable();
			$table->string('pivot_cost');
			$table->enum('waterpump_task', array('Labor', 'Changing Parts'));
			$table->enum('waterpump_category', array('Motor', 'Electrical Board', 'Waterpump'));
			$table->enum('motor', array('Mechanical Break', 'Burnout'))->nullable();
			$table->enum('electrical_board', array('Protection Failure', 'Others'))->nullable();
			$table->enum('waterpump', array('Mechanical Break', 'Lack of Water', 'Extration of Sand'))->nullable();
			$table->string('waterpump_cost');
			$table->string('total_cost');
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
		Schema::drop('orders');
	}

}
