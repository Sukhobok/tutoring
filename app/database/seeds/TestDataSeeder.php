<?php

class TestDataSeeder extends Seeder {

	public function run()
	{
		DB::disableQueryLog();

		$users = array(
		  array(
		  	'first_name' => 'Alex',
		  	'last_name' => 'Dachin',
		  	'name' => 'Alex Dachin',
		  	'email' => 'alex_tm2010@yahoo.com',
		  	'password' => Hash::make('alex123')
		  ),

		  array(
		  	'first_name' => 'Sorin',
		  	'last_name' => 'Dachin',
		  	'name' => 'Sorin Dachin',
		  	'email' => 'snowdev@yahoo.com',
		  	'password' => Hash::make('sorin123')
		  ),

		  array(
		  	'first_name' => 'Sonia',
		  	'last_name' => 'Albu',
		  	'name' => 'Sonia Albu',
		  	'email' => 'marcisoniaalbu@yahoo.com',
		  	'password' => Hash::make('sonia123')
		  ),

		  array(
		  	'first_name' => 'Florin',
		  	'last_name' => 'Dachin',
		  	'name' => 'Florin Dachin',
		  	'email' => 'dachin_florin1973@yahoo.com',
		  	'password' => Hash::make('florin123')
		  ),
		);

		// Run the seeder
		$c = count($users);
		foreach ($users as $i => $user)
		{
			echo $i+1 . " / " . $c . " users inserted\r";
			DB::table('users')->insert($user);
		}
		echo "\nDone\r\n";
	}

}
