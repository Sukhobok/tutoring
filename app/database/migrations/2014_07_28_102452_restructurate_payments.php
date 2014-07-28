<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class RestructuratePayments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('payments', function (Blueprint $table)
		{
			$table->dropColumn('type');
		});

		Schema::table('payments', function (Blueprint $table)
		{
			$table->enum('type', array(
				'funding',
				'studysquare_fee',
				'tutoring_session',
				'pending_hire',
				'pending_hire_now',
				'pending_tutoring_session'
			));
		});

		Schema::table('tutoring_sessions', function (Blueprint $table)
		{
			$table->dropColumn('hr_id');
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
			$table->dropColumn('type');
		});
		
		Schema::table('payments', function(Blueprint $table) {
			$table->enum('type', array('funding', 'ss_fee', 'tutoring_session', 'pending_for_ts', 'pending_for_hire_now'));
		});

		Schema::table('tutoring_sessions', function (Blueprint $table)
		{
			$table->integer('hr_id')->index()->unsigned();
		});
	}

}
