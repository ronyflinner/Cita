<?php

use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		// $this->call(UsersTableSeeder::class);

		User::create(['name' => 'Luis Gomez',
			'email' => 'soporte@orange-360.com',
			'password' => bcrypt('123456'),
			'apellidoP' => 'Gomez',
			'apellidoM' => 'Gomez',
			'dni' => '1-12345678',
			'numero' => '930264784',
			'slug' => str_random(150),
			'tipo' => 2, 'status' => 1]);

		User::create(['name' => 'Ronald Lindo',
			'email' => 'sistema@orange-360.com',
			'password' => bcrypt('123456'),
			'apellidoP' => 'Lindo',
			'apellidoM' => 'Jaimes',
			'dni' => '1-76188250',
			'numero' => '930265065',
			'slug' => str_random(150),
			'tipo' => 2, 'status' => 1]);

	}
}
