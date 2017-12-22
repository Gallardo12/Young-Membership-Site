<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Photob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('admin')->except('index', 'show');
	}

	public function index() {
		$blogs = Blog::latest()->paginate(3);
		return view('blog.index', compact('blogs'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		notify()->flash('Welcome back!', 'success', [
			'timer' => 3000,
			'text' => 'It\'s really great to see you again',
		]);
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
			'title.required' => 'El título es obligatorio.',
			'title.min' => 'El título debe contener al menos 20 caracteres.',
			'title.max' => 'El título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese título ya está en uso.',
			'body.required' => 'El contenido es obligatorio.',
			'body.min' => 'El contenido debe contener al menos 200 caracteres.',
			'photob_id.required' => 'Seleccionar una imagen es obligatorio.',
			'photob_id.mimes' => 'La imagen debe ser jepg, jpg o png.',
			'photob_id.max' => 'El tamaño de la imagen debe ser menor a 1GB.',
		];
		$this->validate($request, $rules, $message);

		$input = $request->all();
		$input['user_id'] = Auth::user()->id;
		if ($file = $request->file('photob_id')) {
			$name = Carbon::now() . '.' . $file->getClientOriginalName();
			$file->move('images', $name);
			$photo = Photob::create(['photob' => $name, 'title' => $name]);
			$input['photob_id'] = $photo->id;
		}
		Blog::create($input);

		// Session::flash('flash_message', 'La noticia se ha publicado con éxito!!!');
		notify()->flash('Tu noticia se ha publicado con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Ya puedes accesar a ella desde el panel de Noticias.',
		]);

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

		notify()->flash('Tu noticia se modificó con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Ya puedes accesar a ella desde el panel de Noticias.',
		]);

		return redirect('/blog')->withInput();
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
