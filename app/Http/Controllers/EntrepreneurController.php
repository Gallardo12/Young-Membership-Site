<?php

namespace App\Http\Controllers;

class EntrepreneurController extends Controller {
	public function __construct() {
		$this->middleware('entrepreneur');
	}

	public function index() {
		return view('admin.index');
	}
}
