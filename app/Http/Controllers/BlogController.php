<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Photob;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
		// $this->middleware('entrepreneur')->except('index', 'show', 'edit', 'create', 'destroy');
		// $this->middleware('admin')->except('index', 'show', 'edit', 'create', 'destroy', 'bin');
	}

	public function index() {
		$blogs = Blog::latest()->get();
		return view('blog.index', compact('blogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		return view('blog.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'title' => ['required', 'min:20', 'max:200', 'unique:blogs'],
			'body' => ['required', 'min:200'],
			'photob_id' => ['required', 'mimes:jpeg,jpg,png', 'max:5000'],
		];
		$message = [
			'title.required' => 'El Título es obligatorio.',
			'title.min' => 'El Título debe contener al menos 20 caracteres.',
			'title.max' => 'El Título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese Título ya está en uso.',
			'body.required' => 'El Contenido es obligatorio.',
			'body.min' => 'El Contenido debe contener al menos 200 caracteres.',
			'photob_id.required' => 'Seleccionar una Imagen es obligatorio.',
			'photob_id.mimes' => 'La Imagen debe ser jepg, jpg o png.',
		];
		$this->validate($request, $rules, $message);

		$input = $request->all();
		if ($file = $request->file('photob_id')) {
			$name = Carbon::now() . '.' . $file->getClientOriginalName();
			$file->move('images', $name);
			$photo = Photob::create(['photob' => $name, 'title' => $name]);
			var_dump($photo);
			$input['photob_id'] = $photo->id;
		}
		Blog::create($input);
		return redirect('/blog');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$blog = Blog::findOrFail($id);
		return view('blog.show', compact('blog'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$blog = Blog::findOrFail($id);
		return view('blog.edit', compact('blog'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$rules = [
			'title' => ['required', 'min:20', 'max:200'],
			'body' => ['required', 'min:200'],
			'photob_id' => ['mimes:jpeg,jpg,png', 'max:5000'],
		];
		$message = [
			'title.required' => 'El Título es obligatorio.',
			'title.min' => 'El Título debe contener al menos 20 caracteres.',
			'title.max' => 'El Título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese Título ya está en uso.',
			'body.required' => 'El Contenido es obligatorio.',
			'body.min' => 'El Contenido debe contener al menos 200 caracteres.',
			'photob_id.required' => 'Seleccionar una Imagen es obligatorio.',
			'photob_id.mimes' => 'La Imagen debe ser jepg, jpg o png.',
		];
		$this->validate($request, $rules, $message);
		$input = $request->all();
		$blog = Blog::findOrFail($id);
		if ($file = $request->file('photob_id')) {
			if ($blog->photob) {
				unlink('images/' . $blog->photob->photob);
				$blog->photob()->delete('photob');
			}
			$name = Carbon::now() . '.' . $file->getClientOriginalName();
			$file->move('images', $name);
			$photo = Photob::create(['photob' => $name, 'title' => $name]);
			$input['photob_id'] = $photo->id;
		}
		$blog->update($input);
		return redirect('/blog');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		$blog = Blog::findOrFail($id);
		$blog->delete($request->all());
		return redirect('/blog/bin');
	}

	public function bin() {
		$deletedBlogs = Blog::onlyTrashed()->get();
		return view('blog.bin', compact('deletedBlogs'));
	}

	public function restore($id) {
		$restoredBlogs = Blog::onlyTrashed()->findOrFail($id);
		$restoredBlogs->restore($restoredBlogs);
		return redirect('/blog');
	}

	public function destroyBlog($id) {
		$destroyBlog = Blog::onlyTrashed()->findOrFail($id);
		if ($destroyBlog->photob) {
			unlink('images/' . $destroyBlog->photob->photob);
			$destroyBlog->photob()->delete('photob');
		}
		$destroyBlog->forceDelete($destroyBlog);
		return back();
	}
}
