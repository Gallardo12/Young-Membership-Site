<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$role_admin = new Role();
		$role_admin->name = "Administrador";
		$role_admin->save();

		$role_entrepreneur = new Role();
		$role_entrepreneur->name = "Emprendedor";
		$role_entrepreneur->save();

		$role_user = new Role();
		$role_user->name = "Usuario";
		$role_user->save();
	}
}
