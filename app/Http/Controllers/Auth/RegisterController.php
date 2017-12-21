<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller {
	/*
		    |--------------------------------------------------------------------------
		    | Register Controller
		    |--------------------------------------------------------------------------
		    |
		    | This controller handles the registration of new users as well as their
		    | validation and creation. By default this controller uses a trait to
		    | provide this functionality without requiring any additional code.
		    |
	*/

	use RegistersUsers;

	/**
	 * Where to redirect users after registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/users';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('guest');
	}

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	protected function validator(array $data) {
		$message = array(
			'username.required' => 'El usuario es obligatorio',
			'username.max' => 'El usuario debe contener 50 caracteres como máximo.',
			'username.min' => 'El usuario debe contener 5 caracteres como mínimo.',
			'username.alpha_dash' => 'El usuario sólo puede contener letras, números y guiones (a-z, 0-9, -_).',
			'username.unique' => 'Ese usuario ya está en uso.',
			'name.required' => 'El nombre es obligatorio.',
			'name.string' => 'Ingresa un nombre válido.',
			'name.max:' => 'El nombre debe contener 100 caracteres como máximo.',
			'email.required' => 'El correo electrónico debe ser obligatorio.',
			'email.string' => 'Ingresa un correo electrónico válido.',
			'email.email' => 'Ingresa un correo electrónico válido.',
			'email.max' => 'El correo electrónico debe contener 100 caracteres como máximo.',
			'email.unique' => 'Ese correo electrónico ya esta en uso.',
			'password.required' => 'La contraseña es obligatoria.',
			'password.string' => 'Ingresa una contraseña válida.',
			'password.min' => 'La contraseña debe contener 6 caracteres como mínimo.',
			'password.confirmed' => 'La contraseña y su confirmación deben ser iguales.',
		);
		return Validator::make($data, [
			'username' => 'required|max:50|min:5|alpha_dash|unique:users',
			'name' => 'required|string|max:100',
			'email' => 'required|string|email|max:100|unique:users',
			'password' => 'required|string|min:6|confirmed',
		], $message);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return \App\User
	 */
	protected function create(array $data) {
		return User::create([
			'username' => $data['username'],
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
			'role_id' => 3,
		]);
	}
}
