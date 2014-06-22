<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAliasesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aliases', function(Blueprint $table) {
			$table->increments('id');
			$table->string('alias');
			$table->enum('type', array('Group', 'Classroom', 'User', 'University', 'Highschool', 'Subject'));
			$table->integer('resource_id')->unsigned();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aliases');
	}

}
