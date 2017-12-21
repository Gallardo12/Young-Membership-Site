<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$admin = new User();
		$admin->role_id = 1;
		$admin->username = 'juan_Admin';
		$admin->name = 'Juan Pérez';
		$admin->email = 'admin@admin.com';
		$admin->password = bcrypt('admin123');
		$admin->save();

		$entrepreneur = new User();
		$entrepreneur->role_id = 2;
		$entrepreneur->username = 'pedro_emprendedor';
		$entrepreneur->name = 'Pedro Pérez';
		$entrepreneur->email = 'emprendedor@emprendedor.com';
		$entrepreneur->password = bcrypt('emprendedor123');
		$entrepreneur->save();

		$user = new User();
		$user->role_id = 3;
		$user->name = 'Jorge Pérez';
		$user->username = 'jorge_usuario';
		$user->email = 'usuario@usuario.com';
		$user->password = bcrypt('usuario123');
		$user->save();
	}
}
