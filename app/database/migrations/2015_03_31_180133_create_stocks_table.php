<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStocksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('stocks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->date('fecha');
			$table->string('PRODUCTO');
			$table->string('PUERTO_ABREVIADO');
			$table->string('ENTREGA');
			$table->decimal('PRECIO_AJUSTE', 5, 2);
			$table->decimal('MAXIMO_OPERADO', 5, 2);
			$table->decimal('MINIMO_OPERADO', 5, 2);
			$table->decimal('PRIMER_OPERADO', 5, 2);
			$table->decimal('ULTIMO_OPERADO', 5, 2);
			$table->integer('OI');
			$table->integer('OI_VOL');
			$table->string('MONEDA');
			$table->string('TIPO_OPERACION');
			$table->integer('DIF_OI');
			$table->integer('DIF_OI_VOL');
			$table->decimal('PRECIO_AJUSTE_ANTERIOR', 5, 2);
			$table->decimal('Dif', 5, 2);
			$table->integer('VOLUMEN');
			$table->integer('VOLINTONS');
			$table->string('DESCUNIDAD');
			$table->string('DESCTIPOOPE');
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
		Schema::drop('stocks');
	}

}
