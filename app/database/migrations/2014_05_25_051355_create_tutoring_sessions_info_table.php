<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTutoringSessionsInfoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('tutoring_sessions_info', function(Blueprint $table) {
			$table->integer('ts_id')->unsigned()->primary();
			$table->timestamp('started_at');
			$table->integer('started_by')->unsigned()->default(0);
			$table->timestamp('ended_at');
			$table->integer('ended_by')->unsigned()->default(0);

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
		Schema::drop('tutoring_sessions_info');
	}

}
