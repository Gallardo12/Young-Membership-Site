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
		$admin->website = 'a.com';
		$admin->facebook = 'facebook/a';
		$admin->twitter = 'twitter/a';
		$admin->about = 'Soy el Admin de esta página, cualquier cosa que necesites estoy a tus ordenes.';
		$admin->email = 'admin@admin.com';
		$admin->password = bcrypt('admin123');
		$admin->save();

		$entrepreneur = new User();
		$entrepreneur->role_id = 2;
		$entrepreneur->username = 'pedro_emprendedor';
		$entrepreneur->name = 'Pedro Pérez';
		$entrepreneur->website = 'a.com';
		$entrepreneur->facebook = 'facebook/a';
		$entrepreneur->twitter = 'twitter/a';
		$entrepreneur->about = 'Que tal, soy Pedro un emprendedor que, como tu, busco ofertar mis servicios al publico para darme a conocer e iniciar mi negocio propio';
		$entrepreneur->email = 'emprendedor@emprendedor.com';
		$entrepreneur->password = bcrypt('emprendedor123');
		$entrepreneur->save();

		$user = new User();
		$user->role_id = 3;
		$user->username = 'jorge_usuario';
		$user->name = 'Jorge Pérez';
		$user->website = 'a.com';
		$user->facebook = 'facebook/a';
		$user->twitter = 'twitter/a';
		$user->about = 'Soy Jorge, estudiante de Derecho en busca de servicios de buena calidad a un costo accesible';
		$user->email = 'usuario@usuario.com';
		$user->password = bcrypt('usuario123');
		$user->save();
	}
}
