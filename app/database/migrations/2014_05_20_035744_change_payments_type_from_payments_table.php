<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ChangePaymentsTypeFromPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "ss_fee", "tutoring_session", "pending_for_ts")');
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "ss_fee", "tutoring_session")');
	}

}
