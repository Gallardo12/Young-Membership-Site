@extends('layouts.app')

@section('content')

@include('partials.meta-dynamic')

	<div class="container">
		<br>
		<div class="divider"></div>
		<h2 class="center">{{ $service->title }}</h2>
		<p class="flow-text" align="center">
			@foreach ($service->category as $category)
				<a href="{{ action('CategoryController@show', [$category->slug]) }}">|{{ $category->name }}|</a>
			@endforeach
		</p>
		<div class="divider"></div>
		<div class="row">
			<div class="col s12 m5">
				<p align="center">
					@if ($service->photo)
						<img class="materialboxed responsive-img" src="/images/{{ $service->photo ? $service->photo->photo : '' }}" alt="{{ str_limit($service->title, 50) }}" />
					@endif
				</p>
			</div>
			<div class="col s12 m7">
				<p class="flow-text">
					<b>Ubicación: </b>{{ $service->location }}
				</p>
				<p class="flow-text">
					<b>Costo: </b>${{ $service->cost }} MXN
				</p>

			</div>
		</div>
		<div class="row">
			<div class="divider"></div>
			<h4 class="center">Descripción</h4>
			<p class="flow-text">{!! $service->description !!}</p>
			<div class="divider"></div>
			<p class="center flow-text">{{ $service->updated_at }}</p>
		</div>
		<div class="row">
			<div class="divider"></div>
			<p align="center">
				<a href="{{ action('ServiceController@edit', [$service->id]) }}" class="waves-effect waves-light btn-large">Editar</a>
			</p>
			<div class="divider"></div>
		</div>
	</div>

@endsection

