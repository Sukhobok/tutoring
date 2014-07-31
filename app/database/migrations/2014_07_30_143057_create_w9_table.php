<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateW9Table extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('w9', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->unsigned()->index();
			$table->string('name');
			$table->string('address');
			$table->string('city');
			$table->string('state');
			$table->string('zip');
			$table->tinyInteger('tax_status');
			$table->tinyInteger('tin_type');
			$table->string('tin');
			
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
		Schema::drop('w9');
	}

}
