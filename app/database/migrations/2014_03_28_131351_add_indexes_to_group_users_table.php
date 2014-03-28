<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToGroupUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('group_users', function(Blueprint $table) {
			$table->index('group_id');
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
		Schema::table('group_users', function(Blueprint $table) {
			$table->dropIndex('group_users_group_id_index');
			$table->dropIndex('group_users_user_id_index');
		});
	}

}
