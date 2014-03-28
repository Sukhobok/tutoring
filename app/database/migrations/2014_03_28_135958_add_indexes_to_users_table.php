<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->index('price');
			$table->index('available');
		});

		DB::statement('ALTER TABLE `users` ADD FULLTEXT (name)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropIndex('users_price_index');
			$table->dropIndex('users_available_index');
		});

		DB::statement('ALTER TABLE `users` DROP INDEX name');
	}

}
