<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToUserEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('user_education', function(Blueprint $table) {
			$table->index('user_id');
			$table->index('education_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('user_education', function(Blueprint $table) {
			$table->dropIndex('user_education_user_id_index');
			$table->dropIndex('user_education_education_id_index');
		});
	}

}
