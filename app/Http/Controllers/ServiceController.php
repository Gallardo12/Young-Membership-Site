<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('both', ['only' => ['create', 'store', 'edit', 'update']]);
		$this->middleware('admin', ['only' => ['publish', 'destroy', 'bin', 'restore', 'destroyBlog']]);
	}

	public function index() {
		$services = Service::where('status', 1)->latest()->get();
		return view('services.index', compact('services'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create() {
		$category = Category::pluck('name', 'id');
		return view('services.create', compact('category'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$rules = [
			'title' => ['required', 'min:20', 'max:200', 'unique:services'],
			'description' => ['required', 'min:200'],
			'photo_id' => ['required', 'mimes:jpeg,jpg,png', 'max:5000'],
			'location' => ['required'],
			'category_id' => ['required'],
			'cost' => ['required', 'numeric'],
			'meta_desc' => ['required', 'min:10', 'max:300'],
		];
		$message = [
			'title.required' => 'El título es obligatorio.',
			'title.min' => 'El título debe contener al menos 20 caracteres.',
			'title.max' => 'El título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese título ya está en uso.',
			'description.required' => 'El contenido es obligatorio.',
			'description.min' => 'El contenido debe contener al menos 200 caracteres.',
			'photo_id.required' => 'La imagen es obligatoria.',
			'photo_id.mimes' => 'La imagen debe ser jepg, jpg o png.',
			'location.required' => 'La ubicación es obligatoria.',
			'category_id.required' => 'La(s) categoria(s) es/son obligatoria(s).',
			'cost.required' => 'El costo es obligatorio.',
			'cost.numeric' => 'El costo debe contener solo números.',
			'meta_desc.required' => 'La meta descripción es obligatoria.',
			'meta_desc.min' => 'La meta descripción debe contener al menos 10 caracteres.',
			'meta_desc.max' => 'La meta descripción debe contener 300 caracteres como máximo.',
		];
		$this->validate($request, $rules, $message);

		$input = $request->all();
		$input['slug'] = str_slug($request->title);
		$input['meta_title'] = $request->title;
		$input['user_id'] = Auth::user()->id;
		if ($file = $request->file('photo_id')) {
			$name = Carbon::now() . '.' . $file->getClientOriginalName();
			$file->move('images', $name);
			$photo = Photo::create(['photo' => $name, 'title' => $name]);
			$input['photo_id'] = $photo->id;
		}
		$service = Service::create($input);
		if ($categoryIds = $request->category_id) {
			$service->category()->sync($categoryIds);
		}

		notify()->flash('Tu servicio ha creado con éxito!!', 'success', [
			'timer' => 6000,
			'text' => 'Un administrador revisará y publicará tu servicio una vez que este validado.',
		]);

		return redirect('/services');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show($slug) {
		$service = Service::whereSlug($slug)->first();
		return view('services.show', compact('service'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function edit($id) {
		$category = Category::pluck('name', 'id');
		$service = Service::findOrFail($id);
		return view('services.edit', compact('service', 'category'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, $id) {
		$rules = [
			'title' => ['required', 'min:20', 'max:200'],
			'description' => ['required', 'min:200'],
			'photo_id' => ['mimes:jpeg,jpg,png', 'max:5000'],
			'location' => ['required'],
			'category_id' => ['required'],
			'cost' => ['required', 'numeric'],
			'meta_desc' => ['required', 'min:10', 'max:300'],
		];
		$message = [
			'title.required' => 'El título es obligatorio.',
			'title.min' => 'El título debe contener al menos 20 caracteres.',
			'title.max' => 'El título debe contener 200 caracteres como máximo.',
			'title.unique' => 'Ese título ya está en uso.',
			'description.required' => 'El contenido es obligatorio.',
			'description.min' => 'El contenido debe contener al menos 200 caracteres.',
			'photo_id.required' => 'La imagen es obligatoria.',
			'photo_id.mimes' => 'La imagen debe ser jepg, jpg o png.',
			'location.required' => 'La ubicación es obligatoria.',
			'category_id.required' => 'La(s) categoria(s) es/son obligatoria(s).',
			'cost.required' => 'El costo es obligatorio.',
			'cost.numeric' => 'El costo debe contener solo números.',
			'meta_desc.required' => 'La meta descripción es obligatoria.',
			'meta_desc.min' => 'La meta descripción debe contener al menos 10 caracteres.',
			'meta_desc.max' => 'La meta descripción debe contener 300 caracteres como máximo.',
		];
		$this->validate($request, $rules, $message);
		$input = $request->all();
		$service = Service::findOrFail($id);
		if ($file = $request->file('photo_id')) {
			if ($service->photo) {
				unlink('images/' . $service->photo->photo);
				$service->photo()->delete('photo');
			}
			$name = Carbon::now() . '.' . $file->getClientOriginalName();
			$file->move('images', $name);
			$photo = Photo::create(['photo' => $name, 'title' => $name]);
			$input['photo_id'] = $photo->id;

		}
		$service->update($input);
		if ($categoryIds = $request->category_id) {
			$service->category()->sync($categoryIds);
		}

		notify()->flash('Tu servicio se modificó con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Ya puedes accesar a el desde el panel de Servicios.',
		]);

		return redirect('/services')->withInput();
	}

	public function publish(Request $request, $id) {
		$input = $request->all();
		$service = Service::findOrFail($id);
		$service->update($input);

		notify()->flash('El status del Servicio ha sido cambiado con éxito!!', 'success', [
			'timer' => 3000,
			'text' => 'Se enviará un correo al Emprendedor.',
		]);

		return redirect('admin');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Request $request, $id) {
		$service = Service::findOrFail($id);
		$categoryIds = $request->category_id;
		$service->category()->detach($categoryIds);
		$service->delete($request->all());
		return redirect('/services/bin');
	}

	public function bin() {
		$deletedServices = Service::onlyTrashed()->get();
		return view('services.bin', compact('deletedServices'));
	}

	public function restore($id) {
		$restoredServices = Service::onlyTrashed()->findOrFail($id);
		$restoredServices->restore($restoredServices);
		return redirect('/services');
	}

	public function destroyService($id) {
		$destroyService = Service::onlyTrashed()->findOrFail($id);
		if ($destroyService->photo) {
			unlink('images/' . $destroyService->photo->photo);
			$destroyService->photo()->delete('photo');
		}
		$destroyService->forceDelete($destroyService);
		return back();
	}
}
