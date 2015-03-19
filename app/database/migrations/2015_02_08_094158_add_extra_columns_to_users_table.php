<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddExtraColumnsToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->string('phone')->nullable();
			$table->string('photo')->nullable();
			$table->string('description')->nullable();
			$table->timestamp('last_active')->nullable();
			$table->string('facebook');
			$table->string('twitter');
			$table->string('locale')->default('en');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table)
		{
			$table->dropColumn('phone');
			$table->dropColumn('photo');
			$table->dropColumn('description');
			$table->dropColumn('last_active');
			$table->dropColumn('facebook');
			$table->dropColumn('twitter');
			$table->dropColumn('locale');
		});
	}

}
