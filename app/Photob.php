<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photob extends Model {
	protected $fillable = ['title', 'photob'];

	public function blog() {
		return $this->belongsTo(Blog::class);
	}
}
