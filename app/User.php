<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {
	use Notifiable;

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'username', 'name', 'email', 'password', 'role_id', 'about', 'website', 'facebook', 'twitter', 'photo_id', 'get_email',
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

	public function role() {
		return $this->belongsTo(Role::class);
	}

	public function service() {
		return $this->hasMany(Service::class);
	}

	public function blog() {
		return $this->hasMany(Blog::class);
	}

	public function photo() {
		return $this->belongsTo(Photo::class);
	}
}
