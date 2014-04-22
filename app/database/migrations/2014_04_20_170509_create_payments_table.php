<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('from_id')->unsigned()->index();
			$table->integer('to_id')->unsigned()->index();
			$table->decimal('amount', 5, 2);
			$table->enum('type', array('funding', 'ss_fee', 'tutoring_session'));
			$table->integer('type_id')->unsigned()->default(0);
			$table->timestamp('award_date');

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
		Schema::drop('payments');
	}

}
