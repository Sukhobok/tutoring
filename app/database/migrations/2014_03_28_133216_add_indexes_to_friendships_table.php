<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToFriendshipsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('friendships', function(Blueprint $table) {
			$table->index('user_id');
			$table->index('friend_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('friendships', function(Blueprint $table) {
			$table->dropIndex('friendships_user_id_index');
			$table->dropIndex('friendships_friend_id_index');
		});
	}

}
