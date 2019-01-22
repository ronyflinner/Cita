<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);
		DB::table('users')->insert([
			'name' => 'Luis Gomez',
			'email' => 'soporte@orange-360.com',
			'password' => bcrypt('123456'),
		]);
		DB::table('users')->insert([
			'name' => 'Ronald Lindo',
			'email' => 'sistema@orange-360.com',
			'password' => bcrypt('123456'),
		]);
	}
}
