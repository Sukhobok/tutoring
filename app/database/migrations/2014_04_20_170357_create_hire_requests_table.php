<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHireRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hire_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_id')->unsigned()->index();
			$table->integer('tutor_id')->unsigned()->index();
			$table->tinyInteger('hours')->unsigned();
			$table->decimal('price', 5, 2)->default(20);
			$table->enum('last', array('student', 'tutor'))->default('student');

			$table->timestamp('date1');
			$table->timestamp('date2');
			$table->timestamp('date3');
			
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
		Schema::drop('hire_requests');
	}

}
