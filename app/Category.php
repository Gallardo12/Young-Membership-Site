<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	public function service() {
		return $this->belongsToMany(Service::class);
	}

	protected $fillable = ['name', 'slug'];
}
