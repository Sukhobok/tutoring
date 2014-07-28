<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangeTypeFromPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "ss_fee", "tutoring_session", "pending_for_ts", "pending_for_hire_now")');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "ss_fee", "tutoring_session", "pending_for_ts")');
	}

}
