<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {

	protected $fillable = ['title', 'photo'];

	public function service() {
		return $this->belongsTo(Service::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
