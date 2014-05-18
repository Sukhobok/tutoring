<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddHrIdToTutoringSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tutoring_sessions', function(Blueprint $table) {
			$table->integer('hr_id')->index()->unsigned();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tutoring_sessions', function(Blueprint $table) {
			$table->dropColumn('hr_id');
		});
	}

}
