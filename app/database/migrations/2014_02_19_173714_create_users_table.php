<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table) {
			$table->increments('id');
			$table->string('nickname');
			$table->string('name');
			$table->string('email');
			$table->string('password');
			$table->date('birthday');
			$table->enum('gender', array('male', 'female', 'unknown'))->default('unknown');
			$table->text('bio');
			$table->decimal('price', 5, 2)->default(20);
			$table->boolean('available')->default(0);
			$table->enum('verified', array('not sent', 'pending', 'complete'))->default('not sent');
			$table->enum('w9', array('unchecked', 'required', 'complete', 'no need'))->default('unchecked');
			$table->enum('type', array('normal', 'admin'))->default('normal');
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
		Schema::drop('users');
	}

}
