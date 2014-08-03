<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddSaveSessionOptionToPaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "studysquare_fee", "tutoring_session", "pending_hire", "pending_hire_now", "pending_tutoring_session", "saved_session")');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE `payments` CHANGE type type ENUM("funding", "studysquare_fee", "tutoring_session", "pending_hire", "pending_hire_now", "pending_tutoring_session")');
	}

}
