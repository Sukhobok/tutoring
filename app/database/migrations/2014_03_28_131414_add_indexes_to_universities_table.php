<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddIndexesToUniversitiesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		DB::statement('ALTER TABLE `universities` ADD FULLTEXT (name)');
		DB::statement('ALTER TABLE `universities` ADD FULLTEXT (acronym)');
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		DB::statement('ALTER TABLE `universities` DROP INDEX name');
		DB::statement('ALTER TABLE `universities` DROP INDEX acronym');
	}

}
