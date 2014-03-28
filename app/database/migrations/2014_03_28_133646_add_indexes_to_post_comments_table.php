<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToPostCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('post_comments', function(Blueprint $table) {
			$table->index('post_id');
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
		Schema::table('post_comments', function(Blueprint $table) {
			$table->dropIndex('post_comments_post_id_index');
			$table->dropIndex('post_comments_user_id_index');
		});
	}

}
