<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToThumbsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('thumbs', function(Blueprint $table) {
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
		Schema::table('thumbs', function(Blueprint $table) {
			$table->dropIndex('thumbs_post_id_index');
			$table->dropIndex('thumbs_user_id_index');
		});
	}

}
