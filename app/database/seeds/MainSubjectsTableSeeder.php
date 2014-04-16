<?php

class MainSubjectsTableSeeder extends Seeder {

	public function run()
	{
		DB::disableQueryLog();

		$main_subjects = array(
		  array('name' => 'Math'),
		  array('name' => 'English'),
		  array('name' => 'Science'),
		  array('name' => 'Language'),
		  array('name' => 'Test Prep'),
		  array('name' => 'Business'),
		  array('name' => 'Computer'),
		  array('name' => 'Music'),
		  array('name' => 'Sports'),
		  array('name' => 'Others')
		);

		// Run the seeder
		$c = count($main_subjects);
		foreach ($main_subjects as $i => $main_subject)
		{
			echo $i+1 . " / " . $c . " records inserted\r";
			DB::table('main_subjects')->insert($main_subject);
		}
		echo "\nDone\r\n";
	}

}
