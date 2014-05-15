<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class IncreaseAmountSize2 extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->decimal('amount', 10, 2)->default(0);
		});

		Schema::table('hire_requests', function(Blueprint $table) {
			$table->decimal('price', 10, 2)->default(0);
		});

		Schema::table('tutoring_sessions', function(Blueprint $table) {
			$table->decimal('price', 10, 2)->default(0);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('payments', function(Blueprint $table) {
			$table->dropColumn('amount');
		});

		Schema::table('hire_requests', function(Blueprint $table) {
			$table->dropColumn('price');
		});

		Schema::table('tutoring_sessions', function(Blueprint $table) {
			$table->dropColumn('price');
		});
	}

}
