<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEducationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_education', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned();
			$table->string('education_type');
			$table->integer('education_id')->unsigned();
			$table->integer('major_id')->unsigned()->default(0);
			$table->enum('type', array('highschool', 'college', 'graduation'));
			$table->enum('degree', array('n/a', 'bachelor', 'master', 'doctorate'));
			$table->smallInteger('from')->unsigned();
			$table->smallInteger('to')->unsigned();
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
		Schema::drop('user_education');
	}

}
