<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddNotificationsAndSecurityToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->enum('notifications_friend_requests', array('Everybody', 'Friends of Friends', 'Nobody'))->default('Everybody');
			$table->enum('notifications_messages', array('Everybody', 'Friends of Friends', 'Only Friends'))->default('Everybody');
			$table->integer('notifications_hours_early')->unsigned()->default(3);
			$table->enum('security_see_profile', array('Everybody', 'Friends of Friends', 'Only Friends'))->default('Everybody');
			$table->enum('security_search_engine', array('Yes', 'No'))->default('Yes');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropColumn('notifications_friend_requests');
			$table->dropColumn('notifications_messages');
			$table->dropColumn('notifications_hours_early');
			$table->dropColumn('security_see_profile');
			$table->dropColumn('security_search_engine');
		});
	}

}
