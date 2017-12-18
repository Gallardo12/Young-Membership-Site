<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'description', 'photo_id', 'cost', 'location', 'slug', 'meta_title', 'meta_desc', 'status', 'user_id'];

	public function category() {
		return $this->belongsToMany(Category::class);
	}

	public function photo() {
		return $this->belongsTo(Photo::class);
	}

	public function user() {
		return $this->belongsTo(User::class);
	}
}
