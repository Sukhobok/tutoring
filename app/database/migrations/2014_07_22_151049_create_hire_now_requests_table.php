<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHireNowRequestsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hire_now_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('student_id')->unsigned()->index();
			$table->integer('tutor_id')->unsigned()->index();
			$table->tinyInteger('hours')->unsigned();
			$table->decimal('price', 5, 2)->default(20);
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
		Schema::drop('hire_now_requests');
	}

}
