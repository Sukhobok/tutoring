<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToFriendshipRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('friendship_requests', function(Blueprint $table) {
			$table->index('from_id');
			$table->index('to_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('friendship_requests', function(Blueprint $table) {
			$table->dropIndex('friendship_requests_from_id_index');
			$table->dropIndex('friendship_requests_to_id_index');
		});
	}

}
