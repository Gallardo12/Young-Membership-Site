<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model {

	use SoftDeletes;

	protected $dates = ['deleted_at'];

	protected $fillable = ['title', 'description', 'cost', 'location', 'approved'];

	public function category() {
		return $this->belongsToMany(Category::class);
	}
}
