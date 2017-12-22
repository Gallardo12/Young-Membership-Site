<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller {

	public function __construct() {
		$this->middleware('admin', ['only' => ['userlist', 'destroy']]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {
		$users = User::all();
		$roles = Role::pluck('name', 'id');
		return view('users.index', compact('users', 'roles'));
	}

	public function userslist() {
		$users = User::all();
		$roles = Role::pluck('name', 'id');
		return view('users.userslist', compact('users', 'roles'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($username) {
		$user = User::whereUsername($username)->first();
		return view('users.show', compact('user'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($username) {
		$user = User::whereUsername($username)->first();
		if (Auth::user()->id == $user->id) {
			return view('users.edit', ['user' => $user]);
		} else {
			return back();
		}

	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $username) {
		$rules = [
			'name' => ['min:1', 'max:32'],
			'about' => ['min:20', 'max:20000'],
			'photo_id' => ['mimes:jpeg,jpg,png', 'max:5000'],
		];
		$message = [
			'name.min' => 'El nombre debe contener 1 caracter como mínimo',
			'name.max' => 'El nombre debe contener 32 caracteres como máximo',
			'about.min' => 'Acerca de, debe contener 20 caracteres como mínimo',
			'about.max' => 'Acerca de, debe contener 2000 caracteres como máximo',
			'photo_id.mimes' => 'La imagen debe ser jepg, jpg o png.',
			'photo_id.max' => 'El tamaño de la imagen debe ser menor a 1GB.',
		];
		$this->validate($request, $rules, $message);

		$input = $request->all();
		$user = User::whereUsername($username)->first();
		if (Auth::user()->id == $user->id) {
			if ($file = $request->file('photo_id')) {
				if ($user->photo) {
					unlink('images/' . $user->photo->photo);
					$user->photo()->delete('photo');
				}
				$name = Carbon::now() . '.' . $file->getClientOriginalName();
				$file->move('images', $name);
				$photo = Photo::create(['photo' => $name, 'title' => $name]);
				$input['photo_id'] = $photo->id;
			}
		}
		$user->update($input);

		notify()->flash('El Usuario se modificó con éxito!!', 'success', [
			'timer' => 6000,
			'text' => 'Puedes visualizar los cambios en el Panel de Usuarios.',
		]);

		return back();
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy($id) {
		$user = User::findOrFail($id);
		$user->delete();

		notify()->flash('El Usuario se elimino con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Puedes visualizar los cambios en el Panel de Usuarios.',
		]);

		return back();
	}
}
