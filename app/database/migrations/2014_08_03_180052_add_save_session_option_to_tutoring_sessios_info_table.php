<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSaveSessionOptionToTutoringSessiosInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('tutoring_sessions_info', function(Blueprint $table) {
			$table->enum('saved', array('yes', 'no', 'pending', 'only_for_complaint'))->default('pending');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('tutoring_sessions_info', function(Blueprint $table) {
			$table->dropColumn('saved');
		});
	}

}
