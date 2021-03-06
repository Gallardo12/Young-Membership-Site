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
		$this->middleware('admin')->except('show');
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
			'name' => ['required', 'min:1', 'max:50', 'unique:categories'],
		];
		$message = [
			'name.required' => 'El nombre es obligatorio.',
			'name.min' => 'El nombre debe contener al menos 1 caracter.',
			'name.max' => 'El nombre debe contener 50 caracteres como máximo.',
			'name.unique' => 'Esa categoría ya está en uso.',
		];
		$this->validate($request, $rules, $message);

		$category = new Category;
		$category->name = $request->name;
		$category->slug = str_slug($request->name);
		$category->save();

		notify()->flash('Tu Categoría se ha creado con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Ya puedes accesar a ella desde el panel de Categorías.',
		]);

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
		$rules = [
			'name' => ['required', 'min:5', 'max:50', 'unique:categories'],
		];
		$message = [
			'name.required' => 'El nombre es obligatorio.',
			'name.min' => 'El nombre debe contener al menos 5 caracteres.',
			'name.max' => 'El nombre debe contener 50 caracteres como máximo.',
			'name.unique' => 'Esa categoría ya está en uso.',
		];
		$this->validate($request, $rules, $message);
		$input = $request->all();
		$category = Category::findOrFail($id);
		$category->update($input);

		notify()->flash('Tu Categoría se modificó con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Ya puedes accesar a ella desde el panel de Categorías.',
		]);

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

		notify()->flash('La Categoría se ha eliminado con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Puedes verificar los cambios en el panel de Categorías.',
		]);

		return redirect('/categories');
	}
}
