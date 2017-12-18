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
					<i class="material-icons">account_circle</i>
					<b>Emprendedor: </b><a href="#">{{ $service->user->name }}</a>
				</p>
				<p class="flow-text">
					<i class="material-icons">monetization_on</i>
					<b>Costo: </b>${{ money_format('%.2n', $service->cost) }} MXN
				</p>
				<p class="flow-text">
					<i class="material-icons">location_on</i>
					<b>Ubicación: </b>{{ $service->location }}
				</p>
			</div>
		</div>
		<div class="row">
			<div class="divider"></div>
			<h4 class="center"><i class="material-icons">description</i>Descripción</h4>
			<p class="flow-text">{!! $service->description !!}</p>
			<div class="divider"></div>
			<p class="center flow-text">
				<i class="material-icons">date_range</i>
				<b>Publicado: </b><em>{{ $service->updated_at->diffForHumans() }}</em>
			</p>
		</div>
		@guest

		@else
			@if(Auth::user()->role_id == 1 || Auth::user()->id == $service->user_id)
				<div class="row">
					<div class="divider"></div>
						<p align="center">
							<a href="{{ action('ServiceController@edit', [$service->id]) }}" class="waves-effect waves-light btn-large">Editar</a>
						</p>
					<div class="divider"></div>
				</div>
			@endif
		@endguest
	</div>

@endsection

