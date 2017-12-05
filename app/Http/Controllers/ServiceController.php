<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServiceController extends Controller {
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */

	public function __construct() {
		$this->middleware('auth')->except('index', 'show');
		// $this->middleware('entrepreneur')->except('index', 'show', 'edit', 'create', 'destroy');
		// $this->middleware('admin')->except('index', 'show', 'edit', 'create', 'destroy', 'bin');
	}

	public function index() {
		$services = Service::latest()->get();
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
		$input = $request->all();
		$input['slug'] = str_slug($request->title);
		$input['meta_title'] = $request->title;
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
		return redirect('/services');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Service  $service
	 * @return \Illuminate\Http\Response
	 */
	public function show($id) {
		$service = Service::findOrFail($id);
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
		return redirect('/services');
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
