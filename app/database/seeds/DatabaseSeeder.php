<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('ClassroomsTableSeeder');
		$this->call('HighschoolsTableSeeder');
		$this->call('UniversitiesTableSeeder');
		$this->call('MajorsTableSeeder');
		$this->call('MainSubjectsTableSeeder');
		$this->call('SubjectsTableSeeder');
		$this->call('AliasesTableSeeder');
	}

}
