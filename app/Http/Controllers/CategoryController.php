<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
	}

	public function index() {
		$categories = Category::latest()->get();
		return view('categories.index', compact('categories'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$categories = Category::latest()->get();
		return view('categories.create', compact('categories'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'title' => ['required', 'min:20', 'max:200', 'unique:categories'],
			'name' => ['required', 'max:30'],
		];
		$message = [
			'title.required' => 'El Título es obligatorio.',
			'title.min' => 'El Título debe contener al menos 20 caracteres.',
			'title.max' => 'El Título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese Título ya está en uso.',
			'name.required' => 'El Nombre es obligatorio.',
			'name.max' => 'El Nombre debe contener 30 caracteres como máximo.',
		];
		$this->validate($request, $rules, $message);

		$category = new Category;
		$category->name = $request->name;
		$category->slug = str_slug($request->name);
		$category->save();
		return redirect('/categories');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$category = Category::whereSlug($slug)->first();
		return view('categories.show', compact('category'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::findOrFail($id);
		return view('categories.edit', compact('category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$input = $request->all();
		$category = Category::findOrFail($id);
		$category->update($input);
		return redirect('/categories');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Category  $category
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		$category = Category::findOrFail($id);
		$category->delete($request->all());
		return redirect('/categories');
	}
}
