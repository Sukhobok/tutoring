<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToClassroomUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('classroom_users', function(Blueprint $table) {
			$table->index('classroom_id');
			$table->index('user_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('classroom_users', function(Blueprint $table) {
			$table->dropIndex('classroom_users_classroom_id_index');
			$table->dropIndex('classroom_users_user_id_index');
		});
	}

}
